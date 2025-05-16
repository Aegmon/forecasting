<?php
/* Smarty version 3.1.39, created on 2025-05-16 11:14:02
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\reports.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6826ad7af17971_30979839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c4546fca718e1729f7e8347d8086e1378ae4c1b' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\reports.tpl',
      1 => 1747365240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6826ad7af17971_30979839 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15342007136826ad7aef6943_65306027', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_15342007136826ad7aef6943_65306027 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15342007136826ad7aef6943_65306027',
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

                <!-- Filter Form -->
                <div class="row">
                    <div class="col-md-5">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['start_date']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                    </div>
                    <div class="col-md-5">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['end_date']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                    </div>
                    <div class="col-md-2" style="margin-top: 25px;">
                        <button id="filterBtn" class="btn btn-primary">Filter</button>
                    </div>
                </div>

                <br>

             
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="alert alert-info">
                            <strong>Actual Balance:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['actual_balance']->value,2);?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-warning">
                            <strong>Book Balance (Reconciled):</strong> <?php echo number_format($_smarty_tpl->tpl_vars['book_balance']->value,2);?>

                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered sys_table">
                        <thead>
                           <tr>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                        <th>Status</th> 
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
                                <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                <td class="text-right">
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['type'] == 'Expense') {?>
                                        <span class="text-danger">-<?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</span>
                                    <?php } else { ?>
                                        <span class="text-success"><?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</span>
                                    <?php }?>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
</td>
                                <td>
                                    <?php if ((isset($_smarty_tpl->tpl_vars['ds']->value['archived'])) && $_smarty_tpl->tpl_vars['ds']->value['archived'] == 1) {?>
                                        <span class="badge badge-success">Reconciled</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Unreconciled</span>
                                    <?php }?>
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

        <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>

<?php
}
}
/* {/block "content"} */
}
