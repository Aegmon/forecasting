<?php
/* Smarty version 3.1.39, created on 2024-11-19 19:55:10
  from '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/ps-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_673c7c9e140849_87021339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '255811e293d0bd244959fe8363b3b93ce04e9559' => 
    array (
      0 => '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/ps-list.tpl',
      1 => 1732017307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673c7c9e140849_87021339 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_301097693673c7c9e13e1a2_67695497', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_301097693673c7c9e13e1a2_67695497 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_301097693673c7c9e13e1a2_67695497',
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
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
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
                                    <td>
                                        <a href="#" class="btn btn-xs btn-warning cedit" id="edit_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">Edit</a>
                                        <a href="#" class="btn btn-xs btn-danger cdelete" id="delete_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">Delete</a>
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
 


 
<?php
}
}
/* {/block "content"} */
}
