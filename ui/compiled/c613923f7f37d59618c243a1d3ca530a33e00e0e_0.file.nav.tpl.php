<?php
/* Smarty version 3.1.39, created on 2025-05-20 20:39:05
  from 'E:\Xampp\htdocs\forecasting\ui\theme\ibilling\sections\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_682c77e949aae6_60063338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c613923f7f37d59618c243a1d3ca530a33e00e0e' => 
    array (
      0 => 'E:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\sections\\nav.tpl',
      1 => 1746265461,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682c77e949aae6_60063338 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="nav" id="side-menu">

    <li class="nav-header">
        <div class="dropdown profile-element"> <span>

                <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == 'gravatar') {?>
                    <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['username']));?>
?s=64" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png"  class="img-circle" style="max-width: 64px;" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-circle" style="max-width: 64px;" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                <?php }?>
                             </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
</strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['My Account'];?>
 <b class="caret"></b></span> </span> </a>
            <ul class="dropdown-menu animated fadeIn m-t-xs">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change Password'];?>
</a></li>

                <li class="divider"></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</a></li>
            </ul>
        </div>
    </li>

    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[0];?>


    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'reports')) {?>
        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'dashboard') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;
echo $_smarty_tpl->tpl_vars['_c']->value['redirect_url'];?>
/"><i class="fa fa-tachometer"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dashboard'];?>
</span></a></li>
    <?php }?>




    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[1];?>









       <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[2];?>

    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'transactions')) {?>
        <?php if ($_smarty_tpl->tpl_vars['_c']->value['accounting'] == '1') {?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'transactions') {?>active<?php }?>">
                <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Bank Reconciliation</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/chart-of-accounts/">Chart of Accounts</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/deposit/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Deposit'];?>
</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/expense/">Disbursement </a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/reconciliation/">Reconciliation </a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list/">All Transactions</a></li>
                </ul>
            </li>
        <?php }?>
    <?php }?>





    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[3];?>





        <?php if (($_smarty_tpl->tpl_vars['_c']->value['invoicing'] == '1') || ($_smarty_tpl->tpl_vars['_c']->value['quotes'] == '1')) {?>



            <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'invoices') {?>active<?php }?>">
                <a href="#"><i class="icon-credit-card-1"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales'];?>
</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['invoicing'] == '1') {?>
                             <?php if ($_smarty_tpl->tpl_vars['user']->value->roleid != '1') {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
</a></li>
                        <?php }?>
                    

                    <?php if ($_smarty_tpl->tpl_vars['user']->value->roleid != '0') {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Invoice'];?>
</a></li>
                    <?php }?>

             
        
                    <?php }?>

                   
                
                </ul>
            </li>

        <?php }?>


    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'calendar')) {?>
        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'calendar') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
calendar/events/"><i class="fa fa-calendar"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Calendar'];?>
</span></a></li>
    <?php }?>



    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[4];?>


    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'bank_n_cash')) {?>
        <?php if ($_smarty_tpl->tpl_vars['_c']->value['accounting'] == '1') {?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'accounts') {?>active<?php }?>">
                <a href="#"><i class="fa fa-university"></i> <span class="nav-label">Book of Accounts</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/add/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Account'];?>
</a></li>

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/ledger/">General Ledger</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/journal/">General Journal</a></li>
           
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
generate/balance-sheet/">Trial Balance</a></li>

                </ul>
            </li>
        <?php }?>

    <?php }?>


    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[5];?>


    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'products_n_services')) {?>

    <?php if (($_smarty_tpl->tpl_vars['_c']->value['invoicing'] == '1') || ($_smarty_tpl->tpl_vars['_c']->value['quotes'] == '1')) {?>
        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'ps') {?>active<?php }?>">
            <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">Inventory</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Products'];?>
</a></li>
               
 


            </ul>
        </li>
    <?php }?>

    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[6];?>

    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'reports')) {?>
            <?php if ($_smarty_tpl->tpl_vars['_c']->value['accounting'] == '1') {?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'reports') {?>active<?php }?>">
            <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Cash Flow</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/statement/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account Statement'];?>
</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/inflow/">Cash Inflow</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/outflow/">Cash Outflow</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/income-vs-expense/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Vs Expense'];?>
</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/by-date/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reports by Date'];?>
</a></li>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_menu_admin']->value['reports'], 'sm_report');
$_smarty_tpl->tpl_vars['sm_report']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sm_report']->value) {
$_smarty_tpl->tpl_vars['sm_report']->do_else = false;
?>
                    <?php echo $_smarty_tpl->tpl_vars['sm_report']->value;?>

                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            </li>
        <?php }?>
    <?php }?>
    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'settings')) {?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'settings') {?>active<?php }?>" id="li_settings">
            <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
 </span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Staff'];?>
</a></li>
               
            </ul>
            </li>
    <?php }?>



</ul>
<?php }
}
