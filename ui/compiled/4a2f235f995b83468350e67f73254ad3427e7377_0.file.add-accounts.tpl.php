<?php
/* Smarty version 3.1.39, created on 2025-03-26 11:05:36
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\add-accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67e36f005b19e8_46957493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a2f235f995b83468350e67f73254ad3427e7377' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\add-accounts.tpl',
      1 => 1742958331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e36f005b19e8_46957493 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_153713977767e36f005af353_25386962', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_153713977767e36f005af353_25386962 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_153713977767e36f005af353_25386962',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Account</h5>
            </div>
            <div class="ibox-content">
                <form id="addAccountForm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/add-accounts-post">
                    <div class="form-group">
                        <label>Account #</label>
                        <input type="number" name="account_number" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Asset Type</label>
                        <select name="asset_type" class="form-control" required>
                            <option value="Asset">Asset</option>
                            <option value="Liability">Liability</option>
                            <option value="Equity">Equity</option>
                            <option value="Expense">Expense</option>
                            <option value="Revenue">Revenue</option>
                        </select>
                    </div>

                 

                    <button type="submit" class="btn btn-primary">Add Account</button>
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
