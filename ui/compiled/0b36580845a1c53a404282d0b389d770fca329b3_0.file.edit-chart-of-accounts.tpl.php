<?php
/* Smarty version 3.1.39, created on 2025-03-13 18:48:40
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\edit-chart-of-accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67d2b8082db494_84573375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b36580845a1c53a404282d0b389d770fca329b3' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\edit-chart-of-accounts.tpl',
      1 => 1741862894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67d2b8082db494_84573375 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_156808497067d2b8082d4a19_73164723', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_156808497067d2b8082d4a19_73164723 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_156808497067d2b8082d4a19_73164723',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Account</h5>
            </div>
            <div class="ibox-content">
                <form id="editAccountForm">
                    <input type="hidden" id="edit_account_id" value="<?php echo $_smarty_tpl->tpl_vars['account']->value['id'];?>
">

                    <div class="form-group">
                        <label>Account #</label>
                        <input type="text" id="edit_account_number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['account']->value['account_number'];?>
">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" id="edit_description" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['account']->value['description'];?>
">
                    </div>

                    <div class="form-group">
                        <label>Asset Type</label>
                        <select id="edit_asset_type" class="form-control">
                            <option <?php if ($_smarty_tpl->tpl_vars['account']->value['asset_type'] == 'Asset') {?>selected<?php }?>>Asset</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['account']->value['asset_type'] == 'Liability') {?>selected<?php }?>>Liability</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['account']->value['asset_type'] == 'Equity') {?>selected<?php }?>>Equity</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['account']->value['asset_type'] == 'Expense') {?>selected<?php }?>>Expense</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['account']->value['asset_type'] == 'Revenue') {?>selected<?php }?>>Revenue</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Statement</label>
                        <input type="text" id="edit_statement" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['account']->value['statement'];?>
">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/chart-of-accounts" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
}
}
/* {/block "content"} */
}
