<?php
/* Smarty version 3.1.39, created on 2025-03-10 16:05:20
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\account-balances.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67ce9d40a20287_90663189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a640b4c5bc51f2b00d839333c8bd9cfbaa1f8f9f' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\account-balances.tpl',
      1 => 1733131556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ce9d40a20287_90663189 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_170970955667ce9d40a171f4_26711711', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_170970955667ce9d40a171f4_26711711 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_170970955667ce9d40a171f4_26711711',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Financial Balances'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
</th>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                <td class="text-right"><span <?php if ($_smarty_tpl->tpl_vars['ds']->value['balance'] < 0) {?>class="text-red"<?php }?>><?php echo ib_money_format($_smarty_tpl->tpl_vars['ds']->value['balance'],$_smarty_tpl->tpl_vars['_c']->value);?>
</span> </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                        <tr>
                            <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
:</strong></td>
                            <td class="text-right"><strong><span <?php if ($_smarty_tpl->tpl_vars['tbal']->value < 0) {?>class="text-red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['tbal']->value;?>
</span></strong></td>
                        </tr>
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
