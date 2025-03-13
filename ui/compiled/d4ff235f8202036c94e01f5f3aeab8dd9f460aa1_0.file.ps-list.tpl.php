<?php
/* Smarty version 3.1.39, created on 2025-03-13 14:27:13
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\ps-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67d27ac1e10143_43750210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4ff235f8202036c94e01f5f3aeab8dd9f460aa1' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\ps-list.tpl',
      1 => 1741847232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67d27ac1e10143_43750210 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_125660521667d27ac1e06aa3_76924336', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_125660521667d27ac1e06aa3_76924336 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_125660521667d27ac1e06aa3_76924336',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Product List</h5>
                <div class="ibox-tools">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Product</a>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#transactionHistoryModal">
                        <i class="fa fa-history"></i> View Transaction History
                    </button>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stocks</th>
                            <th>Image</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody id="product_list">
                         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['sales_price'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['inventory'];?>
</td>
                                 <td>
                                    <!-- Add product image here -->
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width="50" height="50" />
                                </td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/edit/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="btn btn-xs btn-warning cedit" id="edit_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">Edit</a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/delete/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="btn btn-xs btn-danger cdelete" id="delete_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">Inactive</a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Transaction History Modal -->
<div class="modal fade" id="transactionHistoryModal" tabindex="-1" role="dialog" aria-labelledby="transactionHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 100%; width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionHistoryModalLabel">Transaction History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                          
                            <th>Action</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody id="transaction_logs">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transactions']->value, 'transaction');
$_smarty_tpl->tpl_vars['transaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['transaction']->value) {
$_smarty_tpl->tpl_vars['transaction']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['action'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['type'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['description'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['created_at'];?>
</td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<input type="hidden" id="_lan_are_you_sure" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">

<?php
}
}
/* {/block "content"} */
}
