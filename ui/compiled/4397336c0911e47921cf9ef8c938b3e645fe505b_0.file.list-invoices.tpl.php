<?php
/* Smarty version 3.1.39, created on 2025-04-01 20:09:40
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\list-invoices.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67ebd784d258d5_98049214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4397336c0911e47921cf9ef8c938b3e645fe505b' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\list-invoices.tpl',
      1 => 1743509378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ebd784d258d5_98049214 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_40955383867ebd784d16997_61532720', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_40955383867ebd784d16997_61532720 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_40955383867ebd784d16997_61532720',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
</h5>
                <div class="ibox-tools">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Invoice'];?>
</a>
                </div>
            </div>
            <div class="ibox-content">
                
                <!-- 🚨 Insufficient Stock Banner -->
                <?php if ($_smarty_tpl->tpl_vars['validation_message']->value) {?>
                    <div class="alert alert-danger">
                        <strong>⚠️ Stock Issue:</strong> <?php echo $_smarty_tpl->tpl_vars['validation_message']->value;?>

                    </div>
                <?php }?>

                <!-- 🔍 Search Bar -->
                <input type="text" id="invoice_search" class="form-control" placeholder="🔍 Search Invoices..." style="margin-bottom: 15px; width: 50%;">

                <!-- 📝 Invoice Table -->
                <table class="table table-bordered table-hover sys_table" id="invoice_table">
                    <thead>
                        <tr>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>
                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                            <tr>
                                <td class="searchable"><?php echo $_smarty_tpl->tpl_vars['ds']->value['total'];?>
</td>
                                <td class="searchable"><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                                <td class="searchable">
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Unpaid') {?>
                                        <span class="label label-danger"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Paid') {?>
                                        <span class="label label-success"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Partially Paid') {?>
                                        <span class="label label-info"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                    <?php } else { ?>
                                        <?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>

                                    <?php }?>
                                </td>
                                <td class="searchable">
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['r'] == '0') {?>
                                        <span class="label label-success"><i class="fa fa-dot-circle-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Onetime'];?>
</span>
                                    <?php } else { ?>
                                        <span class="label label-success"><i class="fa fa-repeat"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Recurring'];?>
</span>
                                    <?php }?>
                                </td>
                                <td class="text-right">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-file-text-o"></i></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="iid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i></a>
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
