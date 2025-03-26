<?php
_auth();
$ui->assign('_title', $_L['Transactions'] . '- ' . $config['CompanyName']);
$ui->assign('_st', $_L['Transactions']);
$ui->assign('_application_menu', 'transactions');
$ui->assign('content_inner', inner_contents($config['c_cache']));
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$mdate = date('Y-m-d');
$user_id = $user->system_id;
//js var

$ui->assign(
    'jsvar',
    '
_L[\'Working\'] = \'' .
        $_L['Working'] .
        '\';
_L[\'Submit\'] = \'' .
        $_L['Submit'] .
        '\';
 '
);

Event::trigger('transactions');
//
switch ($action) {

    case 'reconciliation':
        Event::trigger('transactions/reconciliation/');
    
        $paginator = Paginator::bootstrap('sys_transactions');
        $d = ORM::for_table('sys_transactions')
            ->where('system_id', $user_id)
            ->offset($paginator['startpoint'])
            ->limit($paginator['limit'])
            ->order_by_desc('date')
            ->find_many();
    
        $total_debit = ORM::for_table('sys_transactions')
            ->where('system_id', $user_id)
            ->where('archived', 1)
            ->sum('dr');
    
        $total_credit = ORM::for_table('sys_transactions')
            ->where('system_id', $user_id)
            ->where('archived', 1)
            ->sum('cr');
    
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->assign('total_debit', $total_debit);
        $ui->assign('total_credit', $total_credit);
    
        $ui->display('reconciliation.tpl');
        break;
    
    case 'update-archived':
        $id = _post('id');
        $transaction = ORM::for_table('sys_transactions')->find_one($id);
        if ($transaction) {
            $transaction->archived = 1;
            $transaction->save();
            Event::trigger('transactions/reconciliation/');
            header("Location: /forecasting/?ng=transactions/reconciliation");
            exit;
        } else {
            echo "<script>alert('Error updating transaction.'); window.location.href = '/forecasting/?ng=transactions/reconciliation';</script>";
        }
        exit;
        break;
    





    case 'add-accounts':
        $ui->display('add-accounts.tpl');
        break;

        case 'add-accounts-post':
            Event::trigger('transactions/add-accounts-post/');
        
            // Sanitize inputs
            $account_number = filter_var(_post('account_number'), FILTER_SANITIZE_STRING);
            $description = filter_var(_post('description'), FILTER_SANITIZE_STRING);
            $asset_type = filter_var(_post('asset_type'), FILTER_SANITIZE_STRING);
       
        
            // Insert into database
            $account = ORM::for_table('chartsaccount')->create();
            $account->account_number = $account_number;
            $account->description = $description;
            $account->asset_type = $asset_type;
    
        
            // Save and return response
            if ($account->save()) {
                Event::trigger('transactions/chart-of-accounts/');
        
                // Fetch all accounts
                $accounts = ORM::for_table('chartsaccount')->find_many();
                
                // Fetch categorized accounts
                $assets = ORM::for_table('chartsaccount')->where('asset_type', 'Asset')->find_many();
                $liabilities = ORM::for_table('chartsaccount')->where('asset_type', 'Liability')->find_many();
                $equities = ORM::for_table('chartsaccount')->where('asset_type', 'Equity')->find_many();
                $expenses = ORM::for_table('chartsaccount')->where('asset_type', 'Expense')->find_many();
                $revenues = ORM::for_table('chartsaccount')->where('asset_type', 'Revenue')->find_many();
            
                // Assign data to template
                $ui->assign('accounts', $accounts);
                $ui->assign('assets', $assets);
                $ui->assign('liabilities', $liabilities);
                $ui->assign('equities', $equities);
                $ui->assign('expenses', $expenses);
                $ui->assign('revenues', $revenues);
            
                $ui->assign('xfooter', Asset::js(['numeric']));
                $ui->assign('xjq', '
                $(document).ready(function () {
            $(".edit-account").click(function () {
                var accountId = $(this).data("id");
                window.location.href = "/forecasting/?ng=transactions/edit-chart-of-accounts/" + accountId;
            });
        
            $(".delete-account").click(function () {
                var accountId = $(this).data("id");
                var baseUrl = window.location.origin + "/forecasting/?ng=transactions/";
        
                if (confirm("Are you sure you want to delete this account?")) {
                    $.post(baseUrl + "delete-chart-of-accounts/" + accountId, function (response) {
                        if (response.status === "success") {
                            location.reload();
                        } else {
                            alert("Delete failed: " + response.message);
                        }
                    }, "json").fail(function () {
                        alert("Error deleting account.");
                    });
                }
            });
        });
        
            ');
            
            
                $ui->display('chart-of-accounts.tpl');
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to add account']);
            }
            exit;
            break;
        

    case 'chart-of-accounts':
        Event::trigger('transactions/chart-of-accounts/');
        
        // Fetch all accounts
        $accounts = ORM::for_table('chartsaccount')->find_many();
        
        // Fetch categorized accounts
        $assets = ORM::for_table('chartsaccount')->where('asset_type', 'Asset')->find_many();
        $liabilities = ORM::for_table('chartsaccount')->where('asset_type', 'Liability')->find_many();
        $equities = ORM::for_table('chartsaccount')->where('asset_type', 'Equity')->find_many();
        $expenses = ORM::for_table('chartsaccount')->where('asset_type', 'Expense')->find_many();
        $revenues = ORM::for_table('chartsaccount')->where('asset_type', 'Revenue')->find_many();
    
        // Assign data to template
        $ui->assign('accounts', $accounts);
        $ui->assign('assets', $assets);
        $ui->assign('liabilities', $liabilities);
        $ui->assign('equities', $equities);
        $ui->assign('expenses', $expenses);
        $ui->assign('revenues', $revenues);
    
        $ui->assign('xfooter', Asset::js(['numeric']));
        $ui->assign('xjq', '
        $(document).ready(function () {
    $(".edit-account").click(function () {
        var accountId = $(this).data("id");
        window.location.href = "/forecasting/?ng=transactions/edit-chart-of-accounts/" + accountId;
    });

    $(".delete-account").click(function () {
        var accountId = $(this).data("id");
        var baseUrl = window.location.origin + "/forecasting/?ng=transactions/";

        if (confirm("Are you sure you want to delete this account?")) {
            $.post(baseUrl + "delete-chart-of-accounts/" + accountId, function (response) {
                if (response.status === "success") {
                    location.reload();
                } else {
                    alert("Delete failed: " + response.message);
                }
            }, "json").fail(function () {
                alert("Error deleting account.");
            });
        }
    });
});

    ');
    
    
        $ui->display('chart-of-accounts.tpl');
        break;
        case 'edit-chart-of-accounts':
            Event::trigger('transactions/edit-chart-of-accounts/');
        
            $id = route(2); // Get the account ID from the URL
        
            $account = ORM::for_table('chartsaccount')->find_one($id);
        
            if (!$account) {
                die("Account not found!");
            }
        
            $ui->assign('account', $account);
            $ui->assign('xjq', '
      $(document).ready(function () {
    $("#editAccountForm").submit(function (e) {
        e.preventDefault(); // Prevent default form submission
        
        var formData = {
            id: $("#edit_account_id").val(),
            account_number: $("#edit_account_number").val(),
            description: $("#edit_description").val(),
            asset_type: $("#edit_asset_type").val(),
            statement: $("#edit_statement").val()
        };

        $.post("/forecasting/?ng=transactions/edit-chart-of-accounts-post", formData, function (response) {
            if (response.status === "success") {
                alert("Account updated successfully!");
                window.location.href = "/forecasting/?ng=transactions/chart-of-accounts"; // Redirect to list
            } else {
                alert("Error: " + response.message);
            }
        }, "json").fail(function () {
            alert("An error occurred while updating the account.");
        });
    });
});

    
        ');
            $ui->display('edit-chart-of-accounts.tpl');
            break;
        
            case 'edit-chart-of-accounts-post':
                Event::trigger('transactions/edit-chart-of-accounts-post/');
            
                $id = _post('id');
                $account = ORM::for_table('chartsaccount')->find_one($id);
            
                if (!$account) {
                    echo json_encode(['status' => 'error', 'message' => 'Account not found']);
                    exit;
                }
            
                // Sanitize inputs
                $account->account_number = filter_var(_post('account_number'), FILTER_SANITIZE_STRING);
                $account->description = filter_var(_post('description'), FILTER_SANITIZE_STRING);
                $account->asset_type = filter_var(_post('asset_type'), FILTER_SANITIZE_STRING);
                $account->statement = filter_var(_post('statement'), FILTER_SANITIZE_STRING);
            
                // Save and return response
                if ($account->save()) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update account']);
                }
                exit;
                break;
        
        
        
        case 'delete-chart-of-accounts':
            Event::trigger('transactions/delete-chart-of-accounts/');
        
            $id = route(2);
            $account = ORM::for_table('chartsaccount')->find_one($id);
        
            if ($account) {
                if ($account->delete()) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to delete account.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Account not found.']);
            }
            exit;
            break;
        
    case 'deposit':
        Event::trigger('transactions/deposit/');

          
            $d = ORM::for_table('sys_accounts')
             ->where('system_id', $user_id)
             ->find_many();
        $p = ORM::for_table('crm_accounts')->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $cats = ORM::for_table('sys_cats')
            ->where('type', 'Income')
            ->order_by_asc('sorder')
            ->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);

        $tags = Tags::get_all('Income');
        $ui->assign('tags', $tags);

        $ui->assign(
            'xheader',
            Asset::css([
                'dropzone/dropzone',
                'modal',
                's2/css/select2.min',
                'dp/dist/datepicker.min',
            ])
        );

        $ui->assign(
            'xfooter',
            Asset::js([
                'modal',
                'dropzone/dropzone',
                's2/js/select2.min',
                's2/js/i18n/' . lan(),
                'dp/dist/datepicker.min',
                'dp/i18n/' . $config['language'],
                'numeric',
                'deposit',
            ])
        );

        $ui->assign(
            'xjq',
            '
 $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' .
                $config['currency_code'] .
                ' \',
    dGroup: ' .
                $config['thousand_separator_placement'] .
                ',
    aPad: ' .
                $config['currency_decimal_digits'] .
                ',
    pSign: \'' .
                $config['currency_symbol_position'] .
                '\',
    aDec: \'' .
                $config['dec_point'] .
                '\',
    aSep: \'' .
                $config['thousands_sep'] .
                '\'

    });

 '
        );
        //find latest income
        $tr = ORM::for_table('sys_transactions')
            ->where('type', 'Income')
               ->where('system_id', $user_id)
            ->order_by_desc('id')
            ->limit('20')
            ->find_many();
        $ui->assign('tr', $tr);
        $ui->display('deposit.tpl');

        break;
  
    case 'deposit-post':
        Event::trigger('transactions/deposit-post/');
        $system_id = $user_id;
        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        $amount = Finance::amount_fix($amount);
        $payerid = _post('payer');
        $ref = _post('ref');
        $pmethod = _post('pmethod');
        $cat = _post('cats');
        $tags = $_POST['tags'];

        /* @since Build 4560. added support file attachments */

        $attachments = _post('attachments');

        if ($payerid == '') {
            $payerid = '0';
        }
        $description = _post('description');
        $msg = '';
        if ($description == '') {
            $msg .= $_L['description_error'] . '<br>';
        }

        if (Validator::Length($account, 100, 1) == false) {
            $msg .= $_L['Choose an Account'] . ' ' . '<br>';
        }

        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

        if ($msg == '') {
            Tags::save($tags, 'Income');


            $a = ORM::for_table('sys_accounts')
             ->where('system_id', $user_id)
                ->where('account', $account)
                ->find_one();
            $cbal = $a['balance'];
            $nbal = $cbal + $amount;
            $a->balance = $nbal;
            $a->save();
            $d = ORM::for_table('sys_transactions')->create();
            $d->system_id=$user_id;
            $d->account = $account;
            $d->type = 'Income';
            $d->payerid = $payerid;
            $d->tags = Arr::arr_to_str($tags);
            $d->amount = $amount;
            $d->category = $cat;
            $d->method = $pmethod;
            $d->ref = $ref;

            $d->description = $description;
            // Build 4560
            $d->attachments = $attachments;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $nbal;

            //others
            $d->payer = '';
            $d->payee = '';
            $d->payeeid = '0';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;
            $d->aid = 0;
            $d->updated_at = date('Y-m-d H:i:s');
            //

            $d->save();
            $tid = $d->id();
            _log(
                'New Deposit: ' .
                    $description .
                    ' [TrID: ' .
                    $tid .
                    ' | Amount: ' .
                    $amount .
                    ']',
                'Admin',
                $user['id']
            );
            _msglog('s', $_L['Transaction Added Successfully']);
            echo $tid;
        } else {
            echo $msg;
        }
        break;

    case 'expense':
        Event::trigger('transactions/expense/');

        
            $d = ORM::for_table('sys_accounts')
             ->where('system_id', $user_id)->find_many();
        $p = ORM::for_table('crm_accounts')->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $tags = Tags::get_all('Expense');
        $ui->assign('tags', $tags);
        $cats = ORM::for_table('sys_cats')
            ->where('type', 'Expense')
            ->order_by_asc('sorder')
            ->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);

        $ui->assign(
            'xheader',
            Asset::css([
                'dropzone/dropzone',
                'modal',
                's2/css/select2.min',
                'dp/dist/datepicker.min',
            ])
        );

        $ui->assign(
            'xfooter',
            Asset::js([
                'modal',
                'dropzone/dropzone',
                's2/js/select2.min',
                's2/js/i18n/' . lan(),
                'dp/dist/datepicker.min',
                'dp/i18n/' . $config['language'],
                'numeric',
                'expense',
            ])
        );

        $ui->assign(
            'xjq',
            '

 $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' .
                $config['currency_code'] .
                ' \',
    dGroup: ' .
                $config['thousand_separator_placement'] .
                ',
    aPad: ' .
                $config['currency_decimal_digits'] .
                ',
    pSign: \'' .
                $config['currency_symbol_position'] .
                '\',
    aDec: \'' .
                $config['dec_point'] .
                '\',
    aSep: \'' .
                $config['thousands_sep'] .
                '\'

    });

 '
        );
        //find latest income
        $tr = ORM::for_table('sys_transactions')
              ->where('system_id', $user_id)
            ->where('type', 'Expense')
            ->order_by_desc('id')
            ->limit('20')
            ->find_many();
        $ui->assign('tr', $tr);

        $ui->display('expense.tpl');

        break;

    case 'expense-post':
        Event::trigger('transactions/expense-post/');

        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        $amount = Finance::amount_fix($amount);
        $payee = _post('payee');
        $ref = _post('ref');
        $pmethod = _post('pmethod');
        $cat = _post('cats');
        $tags = $_POST['tags'];

        $attachments = _post('attachments');

        if (!is_numeric($payee)) {
            $payee = '0';
        }

        $description = _post('description');
        $msg = '';
        if ($description == '') {
            $msg .= $_L['description_error'] . '<br>';
        }

        if (Validator::Length($account, 100, 1) == false) {
            $msg .= $_L['Choose an Account'] . ' ' . '<br>';
        }

        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

        if ($msg == '') {
            Tags::save($tags, 'Expense');

        
            $a = ORM::for_table('sys_accounts')
             ->where('system_id', $user_id)
                ->where('account', $account)
                ->find_one();
            $cbal = $a['balance'];
            $nbal = $cbal - $amount;
            $a->balance = $nbal;
            $a->save();
            $d = ORM::for_table('sys_transactions')->create();
            $d-> system_id = $user_id;
            $d->account = $account;
            $d->type = 'Expense';
            $d->payeeid = $payee;
            $d->tags = Arr::arr_to_str($tags);
            $d->amount = $amount;
            $d->category = $cat;
            $d->method = $pmethod;
            $d->ref = $ref;

            $d->description = $description;
            // Build 4560
            $d->attachments = $attachments;
            $d->date = $date;
            $d->dr = $amount;
            $d->cr = '0.00';
            $d->bal = $nbal;
            //others
            $d->payer = '';
            $d->payee = '';
            $d->payerid = '0';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;

            $d->aid = 0;
            $d->updated_at = date('Y-m-d H:i:s');

            $d->save();
            $tid = $d->id();
            _log(
                'New Expense: ' .
                    $description .
                    ' [TrID: ' .
                    $tid .
                    ' | Amount: ' .
                    $amount .
                    ']',
                'Admin',
                $user['id']
            );
            _msglog('s', $_L['Transaction Added Successfully']);
            echo $tid;
        } else {
            echo $msg;
        }
        break;

    case 'transfer':
        Event::trigger('transactions/transfer/');
            $d = ORM::for_table('sys_accounts')
             ->where('system_id', $user_id)
       ->find_many();
        $ui->assign('p', $d);
        $ui->assign('d', $d);

        $pms = ORM::for_table('sys_pmethods')->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);
        $tags = Tags::get_all('Transfer');
        $ui->assign('tags', $tags);
        $ui->assign(
            'xheader',
            Asset::css(['s2/css/select2.min', 'dp/dist/datepicker.min'])
        );

        $ui->assign(
            'xfooter',
            Asset::js([
                's2/js/select2.min',
                's2/js/i18n/' . lan(),
                'dp/dist/datepicker.min',
                'dp/i18n/' . $config['language'],
                'numeric',
                'transfer',
            ])
        );

        $ui->assign(
            'xjq',
            '

 $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' .
                $config['currency_code'] .
                ' \',
    dGroup: ' .
                $config['thousand_separator_placement'] .
                ',
    aPad: ' .
                $config['currency_decimal_digits'] .
                ',
    pSign: \'' .
                $config['currency_symbol_position'] .
                '\',
    aDec: \'' .
                $config['dec_point'] .
                '\',
    aSep: \'' .
                $config['thousands_sep'] .
                '\'

    });

 '
        );
        //find latest income
        $tr = ORM::for_table('sys_transactions')
            ->where('system_id', $user_id)
            ->where('type', 'Transfer')
            ->order_by_desc('id')
            ->limit('20')
            ->find_many();
        $ui->assign('tr', $tr);
        $ui->display('transfer.tpl');

        break;

    case 'transfer-post':
        Event::trigger('transactions/transfer-post/');

        $faccount = _post('faccount');
        $taccount = _post('taccount');
        $date = _post('date');
        $amount = _post('amount');
        $amount = Finance::amount_fix($amount);
        $pmethod = _post('pmethod');
        $ref = _post('ref');

        $description = _post('description');
        $msg = '';
        if (Validator::Length($faccount, 100, 2) == false) {
            $msg .= $_L['Choose an Account'] . ' ' . '<br>';
        }

        if (Validator::Length($taccount, 100, 2) == false) {
            $msg .= $_L['Choose the Traget Account'] . ' ' . '<br>';
        }

        if ($description == '') {
            $msg .= $_L['description_error'] . '<br>';
        }

        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

        //check if from account & target account is same

        if ($faccount == $taccount) {
            $msg .= $_L['same_account_error'] . '<br>';
        }

        $tags = $_POST['tags'];

        Tags::save($tags, 'Transfer');

        if ($msg == '') {
            
        
            $a = ORM::for_table('sys_accounts')
             ->where('system_id', $user_id)
                ->where('account', $faccount)
                ->find_one();
            $cbal = $a['balance'];
            $nbal = $cbal - $amount;
            $a->balance = $nbal;
            $a->save();
         
            $a = ORM::for_table('sys_accounts')
             ->where('system_id', $user_id)
                ->where('account', $taccount)
                ->find_one();
            $cbal = $a['balance'];
            $tnbal = $cbal + $amount;
            $a->balance = $tnbal;
            $a->save();
            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $faccount;
            $d->type = 'Transfer';

            $d->amount = $amount;

            $d->method = $pmethod;
            $d->ref = $ref;
            $d->tags = Arr::arr_to_str($tags);

            $d->description = $description;
            $d->date = $date;
            $d->dr = $amount;
            $d->cr = '0.00';
            $d->bal = $nbal;

            //others
            $d->payer = '';
            $d->payee = '';
            $d->payerid = '0';
            $d->payeeid = '0';
            $d->category = '';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;
            $d->aid = 0;
            $d->updated_at = date('Y-m-d H:i:s');
            //

            $d->save();
            //transaction for target account
            $d = ORM::for_table('sys_transactions')->create();
            $d->system_id = $user_id;
            $d->account = $taccount;
            $d->type = 'Transfer';

            $d->amount = $amount;

            $d->method = $pmethod;
            $d->ref = $ref;
            $d->tags = Arr::arr_to_str($tags);
            $d->description = $description;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $tnbal;

            //others
            $d->payer = '';
            $d->payee = '';
            $d->payerid = '0';
            $d->payeeid = '0';
            $d->category = '';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;
            $d->aid = 0;
            $d->updated_at = date('Y-m-d H:i:s');
            //

            $d->save();
            _msglog('s', $_L['Transaction Added Successfully']);
            echo '1';
        } else {
            echo $msg;
        }
        break;

    case 'list':
        Event::trigger('transactions/list/');
   
        $paginator = Paginator::bootstrap('sys_transactions');
        $d = ORM::for_table('sys_transactions')
             ->where ('system_id',$user_id)
            ->offset($paginator['startpoint'])
            ->limit($paginator['limit'])
            ->order_by_desc('date')
            ->where('system_id', $user_id)
            ->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);

        $ui->assign(
            '_st',
            $_L['Transactions'] .
                '<div class="btn-group pull-right" style="padding-right: 10px;">
  <a class="btn btn-success btn-xs" href="' .
                U .
                'transactions/export_csv/' .
                '" style="box-shadow: none;"><i class="fa fa-download"></i></a>
</div>'
        );

        $ui->assign('xfooter', Asset::js(['numeric']));

        $ui->assign(
            'xjq',
            '

 $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' .
                $config['currency_code'] .
                ' \',
    dGroup: ' .
                $config['thousand_separator_placement'] .
                ',
    aPad: ' .
                $config['currency_decimal_digits'] .
                ',
    pSign: \'' .
                $config['currency_symbol_position'] .
                '\',
    aDec: \'' .
                $config['dec_point'] .
                '\',
    aSep: \'' .
                $config['thousands_sep'] .
                '\'

    });

 '
        );

        $ui->display('transactions.tpl');
        break;

    case 'a':
        Event::trigger('transactions/a/');
   
        $d = ORM::for_table('sys_accounts')
            ->where('system_id', $user_id)
        ->find_many();
        // $p = ORM::for_table('sys_payers')->find_many();
        $p = ORM::for_table('crm_accounts')->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $cats = ORM::for_table('sys_cats')
            ->where('type', 'Income')
            ->order_by_asc('sorder')
            ->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->find_many();
        $ui->assign('pms', $pms);
        $ui->assign(
            'xheader',
            Asset::css([
                's2/css/select2.min',
                'dp/dist/datepicker.min',
                'dt/media/css/jquery.dataTables.min',
                'modal',
                'css/dta',
            ])
        );

        $ui->assign(
            'xfooter',
            Asset::js([
                's2/js/select2.min',
                's2/js/i18n/' . lan(),
                'dp/dist/datepicker.min',
                'dp/i18n/' . $config['language'],
                'numeric',
                'modal',
                'dt/media/js/jquery.dataTables.min',
                'js/dta',
                'js/tra',
            ])
        );

        $ui->assign(
            'xjq',
            '


 '
        );

        $ui->display('tra.tpl');

        break;

    case 'list-income':
        Event::trigger('transactions/list-income/');

        $ui->assign('_application_menu', 'reports');
        $paginator = Paginator::bootstrap('sys_transactions', 'type', 'Income');
        $d = ORM::for_table('sys_transactions')
          ->where ('system_id',$user_id)
            ->where('type', 'Income')
            ->offset($paginator['startpoint'])
            ->limit($paginator['limit'])
            ->order_by_desc('date')
            ->find_many();
        $ui->assign('d', $d);

        $ui->assign('xfooter', Asset::js(['numeric']));
        $ui->assign(
            'xjq',
            '

         $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' .
                $config['currency_code'] .
                ' \',
    dGroup: ' .
                $config['thousand_separator_placement'] .
                ',
    aPad: ' .
                $config['currency_decimal_digits'] .
                ',
    pSign: \'' .
                $config['currency_symbol_position'] .
                '\',
    aDec: \'' .
                $config['dec_point'] .
                '\',
    aSep: \'' .
                $config['thousands_sep'] .
                '\'

    });

        '
        );
        $ui->assign('paginator', $paginator);
        $ui->display('transactions.tpl');
        break;

    case 'list-expense':
        Event::trigger('transactions/list-expense/');

        $ui->assign('_application_menu', 'reports');
        $paginator = Paginator::bootstrap(
            'sys_transactions',
            'type',
            'Expense'
        );
        $d = ORM::for_table('sys_transactions')
          ->where ('system_id',$user_id)
            ->where('type', 'Expense')
            ->offset($paginator['startpoint'])
            ->limit($paginator['limit'])
            ->order_by_desc('date')
            ->find_many();
        $ui->assign('d', $d);

        $ui->assign(
            'xjq',
            '

         $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' .
                $config['currency_code'] .
                ' \',
    dGroup: ' .
                $config['thousand_separator_placement'] .
                ',
    aPad: ' .
                $config['currency_decimal_digits'] .
                ',
    pSign: \'' .
                $config['currency_symbol_position'] .
                '\',
    aDec: \'' .
                $config['dec_point'] .
                '\',
    aSep: \'' .
                $config['thousands_sep'] .
                '\'

    });

        '
        );

        $ui->assign('paginator', $paginator);
        $ui->display('transactions.tpl');
        break;

    case 'manage':
        Event::trigger('transactions/manage/');

        $id = $routes['2'];
        $t = ORM::for_table('sys_transactions')
          ->where ('system_id',$user_id)
        ->find_one($id);
        if ($t) {
            $p = ORM::for_table('crm_accounts')->find_many();
            $ui->assign('p', $p);
            $ui->assign('t', $t);
            $d = ORM::for_table('sys_accounts')
              ->where ('system_id',$user_id)
            ->find_many();
            $ui->assign('d', $d);
            $icat = '1';
            if ($t['type'] == 'Income') {
                $cats = ORM::for_table('sys_cats')
                    ->where('type', 'Income')
                    ->find_many();
                $tags = Tags::get_all('Income');
            } elseif ($t['type'] == 'Expense') {
                $cats = ORM::for_table('sys_cats')
                    ->where('type', 'Expense')
                    ->find_many();
                $tags = Tags::get_all('Expense');
            } else {
                $cats = '0';
                $icat = '0';
                $tags = Tags::get_all('Transfer');
            }

            $ui->assign('tags', $tags);
            $dtags = explode(',', $t['tags']);
            $ui->assign('dtags', $dtags);
            $ui->assign('icat', $icat);
            $ui->assign('cats', $cats);
            $pms = ORM::for_table('sys_pmethods')->find_many();
            $ui->assign('pms', $pms);

            $ui->assign('mdate', $mdate);
            $ui->assign(
                'xheader',
                Asset::css(['s2/css/select2.min', 'dp/dist/datepicker.min'])
            );
            $ui->assign(
                'xfooter',
                Asset::js([
                    's2/js/select2.min',
                    's2/js/i18n/' . lan(),
                    'dp/dist/datepicker.min',
                    'dp/i18n/' . $config['language'],
                    'numeric',
                    'tr-manage',
                ])
            );
            $ui->display('manage-transaction.tpl');
        } else {
            r2(U . 'transactions/list', 'e', $_L['Transaction_Not_Found']);
        }

        break;
    case 'edit-post':
        Event::trigger('transactions/edit-post/');

        $id = _post('id');
        $d = ORM::for_table('sys_transactions')
           ->where ('system_id',$user_id)
        ->find_one($id);
        if ($d) {
            $cat = _post('cats');
            $pmethod = _post('pmethod');
            $ref = _post('ref');
            $date = _post('date');
            $payer = _post('payer');
            $payee = _post('payee');
            $description = _post('description');
            $msg = '';
            if ($description == '') {
                $msg .= $_L['description_error'] . '<br>';
            }

            if (!is_numeric($payer)) {
                $payer = '0';
            }

            if (!is_numeric($payee)) {
                $payee = '0';
            }

            $tags = $_POST['tags'];

            if ($msg == '') {
                //find the current balance for this account

                Tags::save($tags, $d['type']);

                $d->category = $cat;
                $d->payerid = $payer;
                $d->payeeid = $payee;
                $d->method = $pmethod;
                $d->ref = $ref;
                $d->tags = Arr::arr_to_str($tags);
                $d->description = $description;
                $d->date = $date;

                $d->save();
                _msglog('s', $_L['edit_successful']);
                echo $d->id();
            } else {
                echo $msg;
            }
        } else {
            echo 'Transaction Not Found';
        }

        break;
    case 'delete-post':
        Event::trigger('transactions/delete-post/');

        if (!has_access($user->roleid, 'transactions', 'delete')) {
            permissionDenied();
        }

        $id = _post('id');
        if (Transaction::remove($id)) {
            r2(
                U . 'transactions/list',
                's',
                $_L['transaction_delete_successful']
            );
        } else {
            r2(U . 'transactions/list', 'e', $_L['an_error_occured']);
        }
        break;

    case 'post':
        break;

    case 's':
        Event::trigger('transactions/s/');
        $d = ORM::for_table('sys_accounts')
           ->where ('system_id',$user_id)
        ->find_many();
        // $p = ORM::for_table('sys_payers')->find_many();
        $c = ORM::for_table('crm_accounts')->find_many();
        $ui->assign('c', $c);
        $ui->assign('d', $d);
        $cats = ORM::for_table('sys_cats')
            ->where('type', 'Income')
            ->order_by_asc('sorder')
            ->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->find_many();
        $ui->assign('pms', $pms);
        $mdate = date('Y-m-d');
        $fdate = date('Y-m-d', strtotime('today - 30 days'));
        $ui->assign('fdate', $fdate);
        $ui->assign('tdate', $mdate);
        $ui->assign(
            'xheader',
            Asset::css([
                's2/css/select2.min',
                'dp/dist/datepicker.min',
                'modal',
            ])
        );
        $ui->assign(
            'xfooter',
            Asset::js([
                's2/js/select2.min',
                's2/js/i18n/' . lan(),
                'dp/dist/datepicker.min',
                'dp/i18n/' . $config['language'],
                'numeric',
                'modal',
                'js/tra',
            ])
        );

        $ui->display('trs.tpl');

        break;

    case 'export_csv':
        Event::trigger('transactions/export_csv/');

        $fileName = 'transactions_' . time() . '.csv';

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$fileName}");
        header("Expires: 0");
        header("Pragma: public");

        $fh = @fopen('php://output', 'w');

        $headerDisplayed = false;

        $results = db_find_array('sys_transactions');

        foreach ($results as $data) {
            // Add a header row if it hasn't been added yet
            if (!$headerDisplayed) {
                // Use the keys from $data as the titles
                fputcsv($fh, array_keys($data));
                $headerDisplayed = true;
            }

            // Put the data into the stream
            fputcsv($fh, $data);
        }
        // Close the file
        fclose($fh);

        break;

    case 'handle_attachment':
        $uploader = new Uploader();
        $uploader->setDir('application/storage/transactions/');
        $uploader->sameName(false);
        $uploader->setExtensions(['jpg', 'jpeg', 'png', 'gif', 'pdf']); //allowed extensions list//
        if ($uploader->uploadFile('file')) {
            //txtFile is the filebrowse element name //
            $uploaded = $uploader->getUploadName(); //get uploaded file name, renames on upload//

            $file = $uploaded;
            $msg = 'Uploaded Successfully';
            $success = 'Yes';
        } else {
            //upload failed
            $file = '';
            $msg = $uploader->getMessage();
            $success = 'No';
        }

        $a = [
            'success' => $success,
            'msg' => $msg,
            'file' => $file,
        ];

        header('Content-Type: application/json');

        echo json_encode($a);

        break;

    default:
        echo 'action not defined';
}
