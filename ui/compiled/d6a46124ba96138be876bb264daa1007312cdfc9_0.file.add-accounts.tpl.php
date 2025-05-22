<?php
/* Smarty version 3.1.39, created on 2025-05-20 20:41:53
  from 'E:\Xampp\htdocs\forecasting\ui\theme\ibilling\add-accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_682c78918ec412_70363718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6a46124ba96138be876bb264daa1007312cdfc9' => 
    array (
      0 => 'E:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\add-accounts.tpl',
      1 => 1742958331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682c78918ec412_70363718 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1022338666682c78918e9fe8_89926624', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_1022338666682c78918e9fe8_89926624 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1022338666682c78918e9fe8_89926624',
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
