<?php
/* Smarty version 3.1.39, created on 2025-03-10 15:36:07
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67ce96677c20c1_24477062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9439b3f1a084024e1b35fde1685bb2def0fc97f5' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\welcome.tpl',
      1 => 1733131567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ce96677c20c1_24477062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_178121860567ce96677bf5a0_67508776', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_178121860567ce96677bf5a0_67508776 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_178121860567ce96677bf5a0_67508776',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">

            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Welcome'];?>
!

        </div>



    </div>

<?php
}
}
/* {/block "content"} */
}
