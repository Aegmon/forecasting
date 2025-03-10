<?php
/* Smarty version 3.1.39, created on 2024-09-22 11:09:01
  from 'C:\xampp\htdocs\ibilling\ui\theme\ibilling\sections\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_66ef8a4d6066f1_49484815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4478d2542887ed668cbc9760fdbe9029b1b68ee5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ibilling\\ui\\theme\\ibilling\\sections\\header.tpl',
      1 => 1724829008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66ef8a4d6066f1_49484815 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tplheader']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
if ($_smarty_tpl->tpl_vars['content_inner']->value != '') {?>
    <?php echo $_smarty_tpl->tpl_vars['content_inner']->value;?>

<?php }
}
}
