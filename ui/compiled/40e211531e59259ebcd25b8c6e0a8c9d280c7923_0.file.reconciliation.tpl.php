<?php
/* Smarty version 3.1.39, created on 2025-05-16 11:19:19
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\reconciliation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6826aeb7f02b83_84872996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40e211531e59259ebcd25b8c6e0a8c9d280c7923' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\reconciliation.tpl',
      1 => 1747365176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6826aeb7f02b83_84872996 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7287485856826aeb7ee0066_26905621', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7997824686826aeb7f01cf2_72171076', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_7287485856826aeb7ee0066_26905621 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7287485856826aeb7ee0066_26905621',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row mt-4">
    <div class="col-md-12">
        <!-- Import CSV Form -->
        <form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/import_csv/" method="post" enctype="multipart/form-data" class="form-inline mb-3">
            <div class="form-group">
                <input type="file" name="csv_file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Import</button>
        </form>
        <br>
             <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/reports/" class="btn btn-primary" >
    Reconciliation Report </a>

    </div>
</div>
<br>
<div class="row mb-4">
    <div class="col-md-5">
        <div class="alert alert-info">
        <strong>Statement Balance:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['actual_balance']->value,2);?>

        </div>
    </div>
        <div class="col-md-2 text-center" >
            </div>

    <div class="col-md-5">
        <div class="alert alert-warning">
            
                <strong>Book Balance:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['statement_balance']->value,2);?>

        </div>
    </div>
</div>

<?php if ((isset($_smarty_tpl->tpl_vars['excel_transactions']->value)) && (isset($_smarty_tpl->tpl_vars['db_transactions']->value))) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['excel_transactions']->value, 'ex');
$_smarty_tpl->tpl_vars['ex']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ex']->value) {
$_smarty_tpl->tpl_vars['ex']->do_else = false;
?>
        <?php $_smarty_tpl->_assignInScope('db_item', (($tmp = @$_smarty_tpl->tpl_vars['db_transactions']->value[$_smarty_tpl->tpl_vars['ex']->value['id']])===null||$tmp==='' ? null : $tmp));?>
        <?php $_smarty_tpl->_assignInScope('is_archived', (($tmp = @$_smarty_tpl->tpl_vars['db_item']->value['archived'])===null||$tmp==='' ? 0 : $tmp));?>

        <div class="row align-items-center mb-4">

            <!-- Excel Transaction -->
            <div class="col-md-5">
                <div class="ibox" style="background-color: <?php if ($_smarty_tpl->tpl_vars['is_archived']->value == 1) {?>#d4edda<?php } else { ?>#f8f9fa<?php }?>; border-left: 5px solid <?php if ($_smarty_tpl->tpl_vars['is_archived']->value == 1) {?>#28a745<?php } else { ?>#007bff<?php }?>; padding: 15px;">
                    <h5><strong>Transaction ID:</strong> <?php echo $_smarty_tpl->tpl_vars['ex']->value['id'];?>
</h5>
                    <p><strong>Date:</strong> <?php echo $_smarty_tpl->tpl_vars['ex']->value['date'];?>
</p>
                    <p><strong>Account:</strong> <?php echo $_smarty_tpl->tpl_vars['ex']->value['account'];?>
</p>
                    <p><strong>Amount:</strong> <?php echo $_smarty_tpl->tpl_vars['ex']->value['amount'];?>
</p>
                    <p><strong>Description:</strong> <?php echo $_smarty_tpl->tpl_vars['ex']->value['description'];?>
</p>
                </div>
            </div>

            <!-- Match Button in the middle -->
            <div class="col-md-2 text-center" style="
    margin: 6% 0%;">
                <?php if ($_smarty_tpl->tpl_vars['db_item']->value && $_smarty_tpl->tpl_vars['db_item']->value['archived'] != 1) {?>
                    <button class="btn btn-primary match-btn mt-2" data-id="<?php echo $_smarty_tpl->tpl_vars['ex']->value['id'];?>
">Match</button>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['db_item']->value && $_smarty_tpl->tpl_vars['db_item']->value['archived'] == 1) {?>
                    <span class="badge bg-success text-white mt-2">Reconciled</span>
                <?php }?>
            </div>

            <!-- DB Transaction -->
            <div class="col-md-5">
                <div class="ibox" style="background-color: <?php if ($_smarty_tpl->tpl_vars['is_archived']->value == 1) {?>#d4edda<?php } else { ?>#f8f9fa<?php }?>; border-left: 5px solid <?php if ($_smarty_tpl->tpl_vars['is_archived']->value == 1) {?>#28a745<?php } else { ?>#007bff<?php }?>; padding: 15px;">
                    <h5><strong>Transaction ID:</strong> <?php if ($_smarty_tpl->tpl_vars['db_item']->value) {
echo $_smarty_tpl->tpl_vars['db_item']->value['id'];
} else { ?>-<?php }?></h5>
                    <?php if ($_smarty_tpl->tpl_vars['db_item']->value) {?>
                        <p><strong>Date:</strong> <?php echo $_smarty_tpl->tpl_vars['db_item']->value['date'];?>
</p>
                        <p><strong>Account:</strong> <?php echo $_smarty_tpl->tpl_vars['db_item']->value['account'];?>
</p>
                        <p><strong>Amount:</strong>
                            <?php if ($_smarty_tpl->tpl_vars['db_item']->value['type'] == 'Expense') {?>
                                -<?php echo $_smarty_tpl->tpl_vars['db_item']->value['amount'];?>

                            <?php } elseif ($_smarty_tpl->tpl_vars['db_item']->value['type'] == 'Income' || $_smarty_tpl->tpl_vars['db_item']->value['type'] == 'Deposit') {?>
                                <?php echo $_smarty_tpl->tpl_vars['db_item']->value['amount'];?>

                            <?php } else { ?>
                                <?php echo $_smarty_tpl->tpl_vars['db_item']->value['amount'];?>

                            <?php }?>
                        </p>
                        <p><strong>Description:</strong> <?php echo $_smarty_tpl->tpl_vars['db_item']->value['description'];?>
</p>
                    <?php } else { ?>
                        <p class="text-danger">No matching DB transaction.</p>
                    <?php }?>
                </div>
            </div>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>



<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_7997824686826aeb7f01cf2_72171076 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_7997824686826aeb7f01cf2_72171076',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
$(document).ready(function() {
    $(".match-btn").on("click", function() {
        var transactionId = $(this).data("id");
        if(confirm("Mark transaction ID "+transactionId+" as reconciled?")) {
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
