<?php
/* Smarty version 3.1.39, created on 2025-03-13 18:18:27
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\chart-of-account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67d2b0f3e022d1_45037534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '118e135a07f3e8c552e3517b1d235701c048b5a3' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\chart-of-account.tpl',
      1 => 1741861106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67d2b0f3e022d1_45037534 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_149474825367d2b0f3df8365_46847106', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_149474825367d2b0f3df8365_46847106 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_149474825367d2b0f3df8365_46847106',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Chart of Accounts</h5>
            </div>
            <div class="ibox-content">

                <!-- Tabs for Asset Types -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-asset" data-toggle="tab">Assets</a></li>
                    <li><a href="#tab-liability" data-toggle="tab">Liabilities</a></li>
                    <li><a href="#tab-equity" data-toggle="tab">Equity</a></li>
                    <li><a href="#tab-expense" data-toggle="tab">Expenses</a></li>
                    <li><a href="#tab-revenue" data-toggle="tab">Revenue</a></li>
                </ul>

                <div class="tab-content">
                    <!-- Assets -->
                    <div class="tab-pane active" id="tab-asset">
                        <table class="table table-bordered">
                            <thead><tr><th>Name</th><th>Balance</th></tr></thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assets']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
                                    <tr><td><?php echo $_smarty_tpl->tpl_vars['account']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['account']->value['balance'];?>
</td></tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Liabilities -->
                    <div class="tab-pane" id="tab-liability">
                        <table class="table table-bordered">
                            <thead><tr><th>Name</th><th>Balance</th></tr></thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['liabilities']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
                                    <tr><td><?php echo $_smarty_tpl->tpl_vars['account']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['account']->value['balance'];?>
</td></tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Equity -->
                    <div class="tab-pane" id="tab-equity">
                        <table class="table table-bordered">
                            <thead><tr><th>Name</th><th>Balance</th></tr></thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equities']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
                                    <tr><td><?php echo $_smarty_tpl->tpl_vars['account']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['account']->value['balance'];?>
</td></tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Expenses -->
                    <div class="tab-pane" id="tab-expense">
                        <table class="table table-bordered">
                            <thead><tr><th>Name</th><th>Balance</th></tr></thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['expenses']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
                                    <tr><td><?php echo $_smarty_tpl->tpl_vars['account']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['account']->value['balance'];?>
</td></tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Revenue -->
                    <div class="tab-pane" id="tab-revenue">
                        <table class="table table-bordered">
                            <thead><tr><th>Name</th><th>Balance</th></tr></thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['revenues']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
                                    <tr><td><?php echo $_smarty_tpl->tpl_vars['account']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['account']->value['balance'];?>
</td></tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>

                </div> <!-- Tab Content End -->

            </div>
        </div>
    </div>
</div>

<?php
}
}
/* {/block "content"} */
}
