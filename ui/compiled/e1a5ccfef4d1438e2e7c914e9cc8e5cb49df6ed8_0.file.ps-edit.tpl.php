<?php
/* Smarty version 3.1.39, created on 2024-12-02 17:56:59
  from 'C:\xampp\htdocs\forecasting\ui\theme\ibilling\ps-edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_674d846b73cd02_51362665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1a5ccfef4d1438e2e7c914e9cc8e5cb49df6ed8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\ps-edit.tpl',
      1 => 1733131564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674d846b73cd02_51362665 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1864793359674d846b726765_86009485', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_1864793359674d846b726765_86009485 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1864793359674d846b726765_86009485',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="widget-1 col-md-6 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</h3>
                </div>
                <div class="panel-body">
                    <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/edit-post">
                        <div class="form-group">
                            <label for="name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->name;?>
">
                        </div>
                        <div class="form-group">
                            <label for="item_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item Number'];?>
</label>
                            <input type="text" class="form-control" id="item_number" name="item_number" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->item_number;?>
">
                                     <input type="hidden" name="id" value="' . $d['id'] .  '">
                        </div>
                            <div class="form-group">
                            <label for="price"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->sales_price;?>
">
                                     <input type="hidden" name="id" value="' . $d['id'] . '">
                        </div>

                        
                            <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->inventory;?>
">
                                     <input type="hidden" name="id" value="' . $d['id'] . '">
                        </div>
            
            

                        <div class="form-group">
                         <label for="description"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
                         <textarea id="description" name="description" class="form-control" rows="3"><?php echo $_smarty_tpl->tpl_vars['d']->value->description;?>
</textarea>

                        </div>

                  
                   



                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                    </form>
                </div>
            </div>
        </div> <!-- Widget-1 end-->

        <!-- Widget-2 end-->
    </div>


<?php
}
}
/* {/block "content"} */
}
