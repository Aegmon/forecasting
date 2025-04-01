<?php
/* Smarty version 3.1.39, created on 2025-04-01 21:49:18
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\reconciliation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67ebeede86bd64_56029268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40e211531e59259ebcd25b8c6e0a8c9d280c7923' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\reconciliation.tpl',
      1 => 1743515353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ebeede86bd64_56029268 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_142252309067ebeede8604a4_39547171', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_142252309067ebeede8604a4_39547171 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_142252309067ebeede8604a4_39547171',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Page'];?>
 <?php echo $_smarty_tpl->tpl_vars['paginator']->value['page'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['of'];?>
 <?php echo $_smarty_tpl->tpl_vars['paginator']->value['lastpage'];?>
. </h5>
                </div>
                <div class="ibox-content">
                
                    <div id="dpx"></div>

                 
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered sys_table">
                            <thead>
                                <tr>
                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                                    <th>Disbursement</th>
                                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr class="<?php if ($_smarty_tpl->tpl_vars['ds']->value['cr'] == '0.00') {?>warning<?php } else { ?>info<?php }?>">
                                    <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                    <td>Disbursement</td>
                                    <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
</td>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['archived'] == '0') {?>
                                            <button class="btn btn-success btn-xs reconcile-btn" data-id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_L']->value['OK'];?>
</button>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <strong>Total:</strong> <?php echo $_smarty_tpl->tpl_vars['total_credit']->value;?>

                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
