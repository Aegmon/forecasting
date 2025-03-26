<?php
/* Smarty version 3.1.39, created on 2025-03-26 11:06:24
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\sections\chart-of-accounts-table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67e36f30b57ea1_91671106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9c12e314c9b4727a5bda962804fbdfc798d921d' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\sections\\chart-of-accounts-table.tpl',
      1 => 1742958381,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e36f30b57ea1_91671106 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-bordered">
    <thead>
        <tr>
            <th>Account #</th>
            <th>Description</th>
            <th>Asset Type</th>
  
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accounts']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['account']->value['account_number'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['account']->value['description'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['account']->value['asset_type'];?>
</td>
          
                <td>
                    <button class="btn btn-xs btn-warning edit-account" data-id="<?php echo $_smarty_tpl->tpl_vars['account']->value['id'];?>
">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-xs btn-danger delete-account" data-id="<?php echo $_smarty_tpl->tpl_vars['account']->value['id'];?>
">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
