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
           ->where_any_is([
            ['trash' => 0],
            ['trash' => null] // In case the column is NULL for older records
        ])
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
<input type="text" id="searchBar" class="form-control" placeholder="Search for a product..." onkeyup="searchItems()">
        <br>
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

       

          <th width="15%">' .
            $_L['Price'] .
            '</th>
                 <th width="10%">' .
            $_L['Inventory'] .
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

       

          <td class="price">' .
                $price .
                '</td>
                     <td>' .
                $ds['inventory'] .
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
</div>
<script>
function searchItems() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchBar");
    filter = input.value.toUpperCase();
    table = document.getElementById("items_table");
    tr = table.getElementsByTagName("tr");
    
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; // Index 2 is Item Name
        if (td) {
            txtValue = td.textContent || td.innerText;
            tr[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
        }
    }
}
</script>';
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

        $count = ORM::for_table('sys_items')
    ->where('system_id', $user_id)
    ->count();

$nxt = $count + 1; // This should now return the correct next number
$ui->assign('nxt', $nxt);
$ui->display('add-ps.tpl');



     

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

        $count = ORM::for_table('sys_items')
        ->where('system_id', $user_id)
        ->count();
         $nxt = $count + 1;
        $ui->assign('nxt', $nxt);
        $ui->display('add-ps.tpl');

        break;

        case 'add-post':
            error_log('🟢 add-post case triggered');
        
            $name = trim(_post('name'));
            $sales_price = Finance::amount_fix(_post('sales_price'));
            $stock = _post('stock');
            $item_number = _post('item_number');
            $description = _post('description');
            $type = _post('type');
            $msg = '';
        
            ini_set('log_errors', 1);
            ini_set('error_log', 'php_errors.log');
        
            error_log("🔍 Received Data: Name: $name, Sales Price: $sales_price, Stock: $stock, Item Number: $item_number, Type: $type");
        
            // Prevent duplicate insert by checking existing product
            $existing = ORM::for_table('sys_items')->where('name', $name)->find_one();
            if ($existing) {
                error_log("⚠️ Duplicate product detected: $name");
                echo '✅ Success: Product Added!';
                exit;
            }
        
            // Validate Inputs
            if (empty($name)) {
                $msg .= '❌ Item Name is required <br>';
                error_log('❌ Error: Item Name is missing');
            }
            if (empty($stock) || $stock <= 0) {
                $msg .= '❌ Please input stock value 1 or more <br>';
                error_log('❌ Error: Stock value is invalid');
            }
            if (!is_numeric($sales_price)) {
                $sales_price = '0.00';
                error_log('⚠️ Warning: Sales price is not numeric, defaulting to 0.00');
            }
        
            // Handle Image Upload
            $image_path = '';
            $target_dir = 'img/';
        
            if (!is_dir($target_dir)) {
                if (!mkdir($target_dir, 0777, true)) {
                    $msg .= '❌ Failed to create upload directory!<br>';
                    error_log('❌ Error: Failed to create upload directory.');
                } else {
                    error_log('✅ Upload directory created.');
                }
            }
        
            if (!is_writable($target_dir)) {
                $msg .= '❌ Upload directory is not writable!<br>';
                error_log('❌ Error: Upload directory is not writable.');
            }
        
            if (!empty($_FILES['image']['name'])) {
                $image_name = time() . '_' . basename($_FILES['image']['name']);
                $target_file = $target_dir . $image_name;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        
                if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
                    $msg .= '❌ Image size exceeds 5MB limit.<br>';
                } elseif (!in_array($imageFileType, $allowed_types)) {
                    $msg .= '❌ Invalid image format. Only JPG, JPEG, PNG & GIF allowed.<br>';
                } else {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                        $image_path = $target_file;
                    } else {
                        $msg .= '❌ Error uploading the image.<br>';
                    }
                }
            }
        
            // Database Insertion
            if ($msg == '') {
                error_log('🟢 Saving item to database...');
        
                $d = ORM::for_table('sys_items')->create();
                $d->system_id = $user_id ?? 0;
                $d->name = $name;
                $d->sales_price = $sales_price;
                $d->inventory = $stock;
                $d->item_number = $item_number;
                $d->description = $description;
                $d->type = $type;
                if ($image_path) {
                    $d->image = $image_path;
                }
        
                if ($d->save()) {
                    error_log('✅ Item added successfully with ID: ' . $d->id());
                    $log = ORM::for_table('transaction_logs')->create();
                    $log->action = 'Add';
                    $log->created_at = date('Y-m-d H:i:s');
                    $log->type = 'Product';
                    $log->description = "User added a new product: $name";
                    $log->system_id = $user_id ?? 0;
                    $log->save();
                    header("Location: {$_url}ps/p-list");
                    exit;
                } else {
                    error_log('❌ Error: Database save failed.');
                    echo 'Database error: Unable to save item';
                }
            } else {
                error_log('❌ Form validation failed: ' . $msg);
                echo $msg;
            }
            break;
        
        
        

            case 'p-list':
                // Fetch active products (excluding trashed ones)
                $products = ORM::for_table('sys_items')
                    ->where('system_id', $user_id)
                    ->where_any_is([
                        ['trash' => 0],
                        ['trash' => null] // In case the column is NULL for older records
                    ])
                    ->find_many();
            
                // Fetch inactive products (trashed ones)
                $inactive_products = ORM::for_table('sys_items')
                    ->where('system_id', $user_id)
                    ->where('trash', 1)
                    ->find_many();
            
                // Fetch all transaction logs for the user
                $transactions = ORM::for_table('transaction_logs')
                    ->where('system_id', $user_id)
                    ->order_by_desc('created_at')
                    ->find_many();
            
                // Assign data to template
                $ui->assign('d', $products);
                $ui->assign('inactive_products', $inactive_products); // Assign inactive products
                $ui->assign('transactions', $transactions); // Assign transaction logs
                $ui->assign('type', 'Product');
            
                // Include additional scripts and styles
                $ui->assign('xheader', '<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>');
                $ui->assign('xfooter', '
                    <script type="text/javascript">
                        var user_id = ' . json_encode($user_id) . ';
                    </script>
                    <script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
                    <script type="text/javascript" src="' . $_theme . '/lib/ps-list.js"></script>
                    
                    '
                );
            
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
        
            $id = str_replace('did', '', $routes['2']); // Extract ID
        
            if ($_app_stage == 'Demo') {
                r2(U . 'ps/p-list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
            }
        
            $d = ORM::for_table('sys_items')
                ->where('system_id', $user_id)
                ->find_one($id);
        
            if ($d) {
                $d->set('trash', 1); // Mark as deleted
                $d->save(); // Save the update
                r2(U . 'ps/p-list', 's', "Product Inactive");
            }
        
            break;
        
            case 'activate':
                if (!has_access($user->roleid, 'products_n_services', 'delete')) {
                    permissionDenied();
                }
            
                $id = str_replace('did', '', $routes['2']); // Extract ID
            
                if ($_app_stage == 'Demo') {
                    r2(U . 'ps/p-list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
                }
            
                $d = ORM::for_table('sys_items')
                    ->where('system_id', $user_id)
                    ->find_one($id);
            
                if ($d) {
                    $d->set('trash', 0); // Mark as deleted
                    $d->save(); // Save the update
                    r2(U . 'ps/p-list', 's', "Product Activated");
                }
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
