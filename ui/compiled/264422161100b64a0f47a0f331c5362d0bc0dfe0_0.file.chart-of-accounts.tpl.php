<?php
/* Smarty version 3.1.39, created on 2025-05-20 20:41:43
  from 'E:\Xampp\htdocs\forecasting\ui\theme\ibilling\chart-of-accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_682c7887945b14_94939761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '264422161100b64a0f47a0f331c5362d0bc0dfe0' => 
    array (
      0 => 'E:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\chart-of-accounts.tpl',
      1 => 1747744901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/chart-of-accounts-table.tpl' => 6,
  ),
),false)) {
function content_682c7887945b14_94939761 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1544249190682c788793f772_98469025', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_1544249190682c788793f772_98469025 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1544249190682c788793f772_98469025',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Chart of Accounts</h5>
                <div class="ibox-tools">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/add-accounts/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Accounts</a>
                </div>
            </div>
            <div class="ibox-content">

                <!-- Tabs for Account Types -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-all" data-toggle="tab">All</a></li>
                    <li><a href="#tab-asset" data-toggle="tab">Assets</a></li>
                    <li><a href="#tab-liability" data-toggle="tab">Liabilities</a></li>
                    <li><a href="#tab-equity" data-toggle="tab">Equity</a></li>
                    <li><a href="#tab-expense" data-toggle="tab">Expenses</a></li>
                    <li><a href="#tab-revenue" data-toggle="tab">Revenue</a></li>
                </ul>

                <div class="tab-content">
                    <!-- All Accounts (Default Tab) -->
                    <div class="tab-pane active" id="tab-all">
                        <?php $_smarty_tpl->_subTemplateRender("file:sections/chart-of-accounts-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('accounts'=>$_smarty_tpl->tpl_vars['accounts']->value), 0, false);
?>
                    </div>

                    <!-- Assets -->
                    <div class="tab-pane" id="tab-asset">
                        <?php $_smarty_tpl->_subTemplateRender("file:sections/chart-of-accounts-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('accounts'=>$_smarty_tpl->tpl_vars['assets']->value), 0, true);
?>
                    </div>

                    <!-- Liabilities -->
                    <div class="tab-pane" id="tab-liability">
                        <?php $_smarty_tpl->_subTemplateRender("file:sections/chart-of-accounts-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('accounts'=>$_smarty_tpl->tpl_vars['liabilities']->value), 0, true);
?>
                    </div>

                    <!-- Equity -->
                    <div class="tab-pane" id="tab-equity">
                        <?php $_smarty_tpl->_subTemplateRender("file:sections/chart-of-accounts-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('accounts'=>$_smarty_tpl->tpl_vars['equities']->value), 0, true);
?>
                    </div>

                    <!-- Expenses -->
                    <div class="tab-pane" id="tab-expense">
                        <?php $_smarty_tpl->_subTemplateRender("file:sections/chart-of-accounts-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('accounts'=>$_smarty_tpl->tpl_vars['expenses']->value), 0, true);
?>
                    </div>

                    <!-- Revenue -->
                    <div class="tab-pane" id="tab-revenue">
                        <?php $_smarty_tpl->_subTemplateRender("file:sections/chart-of-accounts-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('accounts'=>$_smarty_tpl->tpl_vars['revenues']->value), 0, true);
?>
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
