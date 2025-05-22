<?php
/* Smarty version 3.1.39, created on 2025-05-21 23:21:46
  from 'E:\Xampp\htdocs\forecasting\ui\theme\ibilling\reconciliation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_682def8aefa8e1_53547354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd316e5a7412c72da36bbd4a96028bb6370d06f61' => 
    array (
      0 => 'E:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\reconciliation.tpl',
      1 => 1747839621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682def8aefa8e1_53547354 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_633197802682def8aee4016_07026632', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1258134560682def8aef9cb2_52083007', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_633197802682def8aee4016_07026632 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_633197802682def8aee4016_07026632',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row mt-4">
    <div class="col-md-12">
        <!-- Import CSV Form -->
        <form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/import_csv/" method="post" enctype="multipart/form-data" class="mb-3">
            <div class="row">
                <!-- Left: File input and Import button -->
                <div class="col-md-4 d-flex form-inline">
                    <input type="file" name="csv_file" class="form-control" required>
                    <button type="submit" class="btn btn-success">Import</button>
                </div>

                <!-- Middle: Expense and Deposit buttons -->
                <div class="col-md-4 d-flex justify-content-center gap-2 mt-2 mt-md-0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/rdeposit/" class="btn btn-primary">Deposit</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/rexpense/" class="btn btn-primary">Expense</a>
                </div>

                <!-- Right: Bank and Account buttons + Book Account dropdown -->
                <div class="col-md-4 d-flex justify-content-end gap-2 mt-2 mt-md-0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list/" class="btn btn-primary">Bank Statement</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/reconlist/" class="btn btn-primary">Account Transaction</a>

                    <!-- Book Account Dropdown -->
                   
                </div>

            </div>
        </form>
        <br>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/select_bookaccount" class="d-inline">
                        <select name="bookaccount" class="form-select" onchange="this.form.submit()">
                            <option value="">All Book Accounts</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bookaccounts']->value, 'ba');
$_smarty_tpl->tpl_vars['ba']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ba']->value) {
$_smarty_tpl->tpl_vars['ba']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['ba']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['selected_bookaccount']->value == $_smarty_tpl->tpl_vars['ba']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ba']->value;?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </form>
        <br>

        <!-- Reconciliation Report Button -->
        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/reports/" class="btn btn-primary">Reconciliation Report</a>
    </div>
</div>

<br>
<div class="row mb-4">
    <div class="col-md-5">
        <div class="alert alert-info">
            <strong>Statement Balance:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['actual_balance']->value,2);?>

        </div>
    </div>
    <div class="col-md-2 text-center"></div>
    <div class="col-md-5">
        <div class="alert alert-warning">
            <strong>Book Balance:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['statement_balance']->value,2);?>

        </div>
    </div>
</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['matched_transactions']->value, 'entry');
$_smarty_tpl->tpl_vars['entry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->do_else = false;
?>
    <div class="row align-items-center mb-4">
        <!-- Unarchived DB Transaction on Left -->
        <div class="col-md-5">
            <div class="ibox" style="background-color: #f8f9fa; border-left: 5px solid #007bff; padding: 15px;">
                     <p><strong>Transaction ID:</strong> <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['id'];?>
</p>
              <p><strong>Bank:</strong>
                    <?php if ($_smarty_tpl->tpl_vars['entry']->value['transaction']['type'] == 'Deposit') {?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['to_field'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['bookaccount'];?>

                    <?php }?>
                </p>
              <p><strong>Acc Num:</strong> <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['accountnumber'];?>
</p>
               <p><strong>Date:</strong> <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['date'];?>
</p>
                <p><strong>Account:</strong>
                    <?php if ($_smarty_tpl->tpl_vars['entry']->value['transaction']['type'] == 'Deposit') {?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['to_field'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['to_field'];?>

                    <?php }?>
                </p>

               
                <p><strong>Amount:</strong>
                    <?php if ($_smarty_tpl->tpl_vars['entry']->value['transaction']['type'] == 'Expense') {?>
                        -<?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['amount'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['amount'];?>

                    <?php }?>
                </p>
                <p><strong>Description:</strong> <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['description'];?>
</p>
            </div>
        </div>

        <!-- Match Button or Reconciled Badge -->
        <div class="col-md-2 text-center" style="margin: 6% 0%;">
            <?php if ($_smarty_tpl->tpl_vars['entry']->value['matched']) {?>
                <button class="btn btn-primary match-btn mt-2" data-id="<?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['id'];?>
">Match</button>
            <?php } else { ?>
                <span class="badge bg-secondary text-white mt-2">No Match</span>
            <?php }?>
        </div>

        <!-- Matched Reconcile Transaction on Right -->
        <div class="col-md-5">
            <?php if ($_smarty_tpl->tpl_vars['entry']->value['matched']) {?>
                <div class="ibox" style="background-color: #d4edda; border-left: 5px solid #28a745; padding: 15px;">
                    <p><strong>Bank:</strong>
                    <?php if ($_smarty_tpl->tpl_vars['entry']->value['matched']['type'] == 'Deposit') {?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['matched']['to_field'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['matched']['bookaccount'];?>

                    <?php }?>
                </p>
              <p><strong>Acc Num:</strong> <?php echo $_smarty_tpl->tpl_vars['entry']->value['matched']['accountnumber'];?>
</p>
               <p><strong>Date:</strong> <?php echo $_smarty_tpl->tpl_vars['entry']->value['matched']['date'];?>
</p>
                <p><strong>Account:</strong>
                    <?php if ($_smarty_tpl->tpl_vars['entry']->value['transaction']['type'] == 'Deposit') {?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['to_field'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['entry']->value['transaction']['to_field'];?>

                    <?php }?>
                </p>
                    <p><strong>Amount:</strong>
                        <?php if ($_smarty_tpl->tpl_vars['entry']->value['matched']['type'] == 'Expense') {?>
                            -<?php echo $_smarty_tpl->tpl_vars['entry']->value['matched']['amount'];?>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['entry']->value['matched']['amount'];?>

                        <?php }?>
                    </p>
                    <p><strong>Description:</strong> <?php echo $_smarty_tpl->tpl_vars['entry']->value['matched']['description'];?>
</p>
                </div>
            <?php } else { ?>
                <div class="ibox" style="background-color: #f8f9fa; border-left: 5px solid #ccc; padding: 15px;">
                    <p class="text-muted text-center mt-4">No matched transaction</p>
                </div>
            <?php }?>
        </div>
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_1258134560682def8aef9cb2_52083007 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1258134560682def8aef9cb2_52083007',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
$(document).ready(function() {
    $(".match-btn").on("click", function() {
        var transactionId = $(this).data("id");
        if(confirm("Mark this transaction as reconciled?")) {
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/update-archived",
                data: { id: transactionId },
                dataType: "json",
                success: function(response) {
                    if(response.success) {
                        alert("Transaction reconciled successfully.");
                        location.reload();
                    } else {
                        alert("Error: " + (response.message || "Unknown error"));
                    }
                },
                error: function(xhr, status, error) {
                    alert("Failed to update transaction. " + xhr.status + ": " + xhr.statusText);
                }
            });
        }
    });
});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
