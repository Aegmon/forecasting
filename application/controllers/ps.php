<?php
_auth();
$ui->assign('_application_menu', 'ps');
$ui->assign(
    '_title',
    $_L['Products n Services'] . '- ' . $config['CompanyName']
);
$ui->assign('_st', $_L['Products n Services']);

$action = $routes['1'];
$user = User::_info();
$user_id = $user->system_id;
$ui->assign('user', $user);
switch ($action) {
    case 'modal-list':
        $d = ORM::for_table('sys_items')
           ->where('system_id', $user_id)
            ->order_by_asc('name')
            ->find_many();

        echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>' .
            $_L['Products n Services'] .
            '</h3>
</div>
<div class="modal-body">

<table class="table table-striped" id="items_table">
      <thead>
        <tr>
          <th width="10%">#</th>
          <th width="20%">' .
            $_L['Item Code'] .
            '</th>
          <th width="45%">' .
            $_L['Item Name'] .
            '</th>

            <th width="10%">' .
            $_L['Inventory'] .
            '</th>

          <th width="15%">' .
            $_L['Price'] .
            '</th>
        </tr>
      </thead>
      <tbody>
       ';

        foreach ($d as $ds) {
            $price = number_format(
                $ds['sales_price'],
                2,
                $config['dec_point'],
                $config['thousands_sep']
            );
            echo ' <tr>
          <td><input type="checkbox" class="si"></td>
          <td>' .
                $ds['item_number'] .
                '</td>
          <td>' .
                $ds['name'] .
                '</td>

            <td>' .
                $ds['inventory'] .
                '</td>

          <td class="price">' .
                $price .
                '</td>
        </tr>';
        }

        echo '

      </tbody>
    </table>

</div>
<div class="modal-footer">

	<button type="button" data-dismiss="modal" class="btn">' .
            $_L['Close'] .
            '</button>
	<button class="btn btn-primary update">' .
            $_L['Select'] .
            '</button>
</div>';

        break;

    case 'p-new':
        $ui->assign('type', 'Product');
        $ui->assign('xfooter', Asset::js(['numeric', 'jslib/add-ps']));
        $ui->assign(
            'xjq',
            '
 $(\'.amount\').autoNumeric(\'init\');
 '
        );

        $max = ORM::for_table('sys_items')
                ->where('system_id', $user_id) 
                ->max('id');
        $nxt = $max + 1;
        $ui->assign('nxt', $nxt);


         // Log the transaction
        $log = ORM::for_table('transaction_logs')->create();
        $log->system_id = $user_id;
        $log->action = 'Add';
        $log->type = 'Product';
        $log->description = 'User added a new product with ID: ' . $nxt;
        $log->created_at = date('Y-m-d H:i:s'); // Assuming a `created_at` column for timestamp 
        $log->save();

        $ui->display('add-ps.tpl');

        break;

    case 's-new':
        $ui->assign('type', 'Service');
        $ui->assign('xfooter', Asset::js(['numeric', 'jslib/add-ps']));

        $ui->assign(
            'xjq',
            '
 $(\'.amount\').autoNumeric(\'init\');
 '
        );

        $max = ORM::for_table('sys_items')
                ->where('system_id', $user_id) 
        ->max('id');
        $nxt = $max + 1;
        $ui->assign('nxt', $nxt);
        $ui->display('add-ps.tpl');

        break;

    case 'add-post':
        $name = _post('name');
        $sales_price = _post('sales_price');
        $sales_price = Finance::amount_fix($sales_price);
             $stock = _post('stock');
        $item_number = _post('item_number');
   
        $description = _post('description');
        $type = _post('type');

        $msg = '';

        if ($name == '') {
            $msg .= 'Item Name is required <br>';
        }
        if (($stock == '') || ($stock <= 0)) {
            $msg .= 'Please input stock value 1 or more <br>';
        }
        if (!is_numeric($sales_price)) {
            $sales_price = '0.00';
        }

        if ($msg == '') {
            $d = ORM::for_table('sys_items')->create();
            $d->system_id = $user_id;
            $d->name = $name;
            $d->sales_price = $sales_price;
            $d->inventory = $stock;
            $d->item_number = $item_number;
      
            $d->description = $description;
            $d->type = $type;
            //others
            $d->unit = '';
            $d->e = '';
            $d->save();

            _msglog('s', $_L['Item Added Successfully']);

            echo $d->id();
        } else {
            echo $msg;
        }
        break;

case 'p-list':
    $products = ORM::for_table('sys_items')
            ->where('system_id', $user_id)
            ->find_many();

    $ui->assign('d', $products);
    $ui->assign('type', 'Product');
    $ui->assign('xheader', '<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>');
    $ui->assign('xfooter', '<script type="text/javascript">
                                var user_id = ' . json_encode($user_id) . ';
                            </script>
                            <script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
                            <script type="text/javascript" src="' . $_theme . '/lib/ps-list.js"></script>');
    $ui->display('ps-list.tpl');
    break;






    case 'edit-post':
        $msg = '';
        $id = _post('id');
        $price = _post('price');
        $stock = _post('stock');
        $price = Finance::amount_fix($price);
        $name = _post('name');
        $item_number = _post('item_number');
        $description = _post('description');
        if ($name == '') {
            $msg .= 'Name is Required <br>';
        }
        if (!is_numeric($price)) {
            $msg .= 'Invalid Sales Price <br>';
        }

        if ($msg == '') {
            $d = ORM::for_table('sys_items')
                  ->where('system_id', $user_id)
            ->find_one($id);
            if ($d) {
                $d->name = $name;
                $d->item_number = $item_number;
                $d->inventory = $stock;
                $d->sales_price = $price;
                $d->description = $description;
                $d->save();
                r2(U . 'ps/p-list', 's', $_L['account_updated_successfully']);
            } else {
                echo 'Not Found';
            }
        } else {
            echo $msg;
        }

        break;

    case 'delete':
        if (!has_access($user->roleid, 'products_n_services', 'delete')) {
            permissionDenied();
        }

        $id = $routes['2'];
        $id = str_replace('did', '', $id);
        if ($_app_stage == 'Demo') {
            r2(
                U . 'ps/p-list',
                'e',
                'Sorry! Deleting Account is disabled in the demo mode.'
            );
        }
        $d = ORM::for_table('sys_items')
              ->where('system_id', $user_id)
        ->find_one($id);
        if ($d) {
            $d->delete();
            r2(U . 'ps/p-list', 's', $_L['account_delete_successful']);
        }

        break;

    case 'edit':
              $id = $routes['2'];
              $d = ORM::for_table('sys_items')
              ->where('system_id', $user_id)
        ->find_one($id);
        if ($d) {
            $ui->assign('d', $d);
            $ui->display('ps-edit.tpl');
        } else {
            r2(U . 'ps/p-list', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'json_get':
        header('Content-Type: application/json');

        $pid = route(2);

        $d = ORM::for_table('sys_items')
              ->where('system_id', $user_id)
        ->find_one($pid);

        if ($d) {
            $i = [];
            $i['sales_price'] = $d->sales_price;

            echo json_encode($i);
        }

        break;

    default:
        echo 'action not defined';
}
