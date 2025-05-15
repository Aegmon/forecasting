<?php
/* Smarty version 3.1.39, created on 2025-05-15 21:40:18
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\chart-of-accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6825eec27265c2_95489786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbf4ac53e11cc320895b6054951ce5b89640b8de' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\chart-of-accounts.tpl',
      1 => 1747316412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6825eec27265c2_95489786 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1679690476825eec2713bd6_90135233', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_1679690476825eec2713bd6_90135233 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1679690476825eec2713bd6_90135233',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Import & Reconcile Transactions</h5>
            </div>
            <div class="ibox-content">

                <!-- Import CSV Form -->
                <form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/import_csv/" method="post" enctype="multipart/form-data" class="form-inline mb-3">
                    <div class="form-group mr-2">
                        <input type="file" name="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Import & Reconcile CSV</button>
                </form>

                <?php if ((isset($_smarty_tpl->tpl_vars['excel_transactions']->value)) && (isset($_smarty_tpl->tpl_vars['db_transactions']->value))) {?>
                <div class="row mt-4">

                    <!-- Excel Transactions -->
                    <div class="col-md-5">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Excel Transactions</h5>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-sm table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['excel_transactions']->value, 'ex');
$_smarty_tpl->tpl_vars['ex']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ex']->value) {
$_smarty_tpl->tpl_vars['ex']->do_else = false;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['ex']->value['id'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['ex']->value['date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['ex']->value['account'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['ex']->value['amount'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['ex']->value['description'];?>
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

                    <!-- Match Buttons -->
                    <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
                        <div class="ibox float-e-margins w-100">
                            <div class="ibox-title text-center">
                                <h5>Match Actions</h5>
                            </div>
                            <div class="ibox-content text-center">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['excel_transactions']->value, 'ex');
$_smarty_tpl->tpl_vars['ex']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ex']->value) {
$_smarty_tpl->tpl_vars['ex']->do_else = false;
?>
                                    <?php $_smarty_tpl->_assignInScope('db_item', (($tmp = @$_smarty_tpl->tpl_vars['db_transactions']->value[$_smarty_tpl->tpl_vars['ex']->value['id']])===null||$tmp==='' ? null : $tmp));?>
                                    <?php if ($_smarty_tpl->tpl_vars['db_item']->value) {?>
                                        <button class="btn btn-primary mb-2 match-btn" data-id="<?php echo $_smarty_tpl->tpl_vars['ex']->value['id'];?>
">Match ID <?php echo $_smarty_tpl->tpl_vars['ex']->value['id'];?>
</button>
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>
                    </div>

                    <!-- Database Transactions -->
                    <div class="col-md-5">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Database Transactions</h5>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-sm table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['db_transactions']->value, 'db');
$_smarty_tpl->tpl_vars['db']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['db']->value) {
$_smarty_tpl->tpl_vars['db']->do_else = false;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['db']->value['id'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['db']->value['date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['db']->value['account'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['db']->value['amount'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['db']->value['description'];?>
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
                <?php }?>

            </div>
        </div>
    </div>
</div>

<?php
}
}
/* {/block "content"} */
}
