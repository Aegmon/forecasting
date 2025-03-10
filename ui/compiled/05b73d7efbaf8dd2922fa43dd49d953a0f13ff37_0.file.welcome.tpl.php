<?php
/* Smarty version 3.1.39, created on 2024-12-04 14:57:05
  from 'C:\xampp\htdocs\forecasting\ui\theme\ibilling\welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_674ffd41f203d9_72269103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05b73d7efbaf8dd2922fa43dd49d953a0f13ff37' => 
    array (
      0 => 'C:\\xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\welcome.tpl',
      1 => 1733131567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674ffd41f203d9_72269103 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_835087622674ffd41f18648_19155116', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_835087622674ffd41f18648_19155116 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_835087622674ffd41f18648_19155116',
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
