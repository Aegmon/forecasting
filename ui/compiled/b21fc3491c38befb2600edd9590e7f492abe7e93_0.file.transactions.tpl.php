<?php
/* Smarty version 3.1.39, created on 2024-11-19 13:56:32
  from '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/transactions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_673c28902ae522_44938119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b21fc3491c38befb2600edd9590e7f492abe7e93' => 
    array (
      0 => '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/transactions.tpl',
      1 => 1731995753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673c28902ae522_44938119 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_94585600673c28902a7009_60800467', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_94585600673c28902a7009_60800467 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_94585600673c28902a7009_60800467',
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
                    <div class="table-responsive">
                        <table class="table table-bordered sys_table">
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>

                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>

                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dr'];?>
</th>
                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cr'];?>
</th>
                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr class="<?php if ($_smarty_tpl->tpl_vars['ds']->value['cr'] == '0.00') {?>warning <?php } else { ?>info<?php }?>">
                                    <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                                                        
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['type'] == 'Income') {?>
                                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Income'];?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['type'] == 'Expense') {?>
                                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Expense'];?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['type'] == 'Transfer') {?>
                                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Transfer'];?>

                                        <?php } else { ?>
                                            <?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>

                                        <?php }?>
                                    </td>

                                    <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
</td>
                                    <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['dr'];?>
</td>
                                    <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['cr'];?>
</td>
                                    <td class="text-right"><span class="amount<?php if ($_smarty_tpl->tpl_vars['ds']->value['bal'] < 0) {?> text-red<?php }?>" ><?php echo $_smarty_tpl->tpl_vars['ds']->value['bal'];?>
</span></td>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/manage/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</a></td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                        </table>
                    </div>


                </div>
            </div>
            <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

        </div>

        <!-- Widget-1 end-->

        <!-- Widget-2 end-->
    </div> <!-- Row end-->


    <!-- Row end-->


    <!-- Row end-->

<?php
}
}
/* {/block "content"} */
}
