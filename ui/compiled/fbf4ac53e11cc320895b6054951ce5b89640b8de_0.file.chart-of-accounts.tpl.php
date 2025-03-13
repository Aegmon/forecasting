<?php
/* Smarty version 3.1.39, created on 2025-03-13 18:46:19
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\chart-of-accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67d2b77b6afe04_53914171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbf4ac53e11cc320895b6054951ce5b89640b8de' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\chart-of-accounts.tpl',
      1 => 1741862735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/chart-of-accounts-table.tpl' => 6,
  ),
),false)) {
function content_67d2b77b6afe04_53914171 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_82128634867d2b77b6a9954_01047641', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_82128634867d2b77b6a9954_01047641 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_82128634867d2b77b6a9954_01047641',
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

<!-- Edit Account Modal -->
<div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 100%; width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccountModalLabel">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAccountForm">
                    <input type="hidden" id="edit_account_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account #</label>
                                <input type="text" id="edit_account_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" id="edit_description" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Type</label>
                                <select id="edit_asset_type" class="form-control">
                                    <option>Asset</option>
                                    <option>Liability</option>
                                    <option>Equity</option>
                                    <option>Expense</option>
                                    <option>Revenue</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Statement</label>
                                <input type="text" id="edit_statement" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveEditAccount">Save Changes</button>
            </div>
        </div>
    </div>
</div>



<?php
}
}
/* {/block "content"} */
}
