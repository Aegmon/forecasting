<?php
/* Smarty version 3.1.39, created on 2025-05-20 20:51:58
  from 'E:\Xampp\htdocs\forecasting\ui\theme\ibilling\account-add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_682c7aee195681_11556868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6fcc96a31f61029dc12144804ed86c1753b2e8d' => 
    array (
      0 => 'E:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\account-add.tpl',
      1 => 1744800198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682c7aee195681_11556868 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_842300846682c7aee191eb7_40150670', "content");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_842300846682c7aee191eb7_40150670 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_842300846682c7aee191eb7_40150670',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add_New_Account'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/add-post">
                        <div class="form-group">
                            <label for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account Title'];?>
*</label>
                            <input type="text" class="form-control" id="account" name="account">

                        </div>
                        <div class="form-group">
                            <label for="description"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                     
              <input type="hidden" class="form-control" id="balance"  name="balance" value="0">

                   

                                   <input type="hidden" class="form-control" id="account_number" name="account_number" value="Accounts">
                            <input type="hidden" class="form-control" id="contact_person" name="contact_person">
                

                   
                            <input type="hidden" class="form-control" id="contact_phone" name="contact_phone">
                 

             
                            <input type="hidden" class="form-control" id="ib_url" name="ib_url">
                  



                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
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
