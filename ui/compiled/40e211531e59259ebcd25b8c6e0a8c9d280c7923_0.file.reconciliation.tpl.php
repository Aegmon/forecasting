<?php
/* Smarty version 3.1.39, created on 2025-03-26 12:06:07
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\reconciliation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67e37d2f5139b4_02147049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40e211531e59259ebcd25b8c6e0a8c9d280c7923' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\reconciliation.tpl',
      1 => 1742961966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e37d2f5139b4_02147049 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8772613667e37d2f503584_21711922', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_8772613667e37d2f503584_21711922 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8772613667e37d2f503584_21711922',
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
                       
                            <th>Action</th>
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
                        </table>
                    </div>
                    <div class="text-right">
                        <strong>Total Debit:</strong> <?php echo $_smarty_tpl->tpl_vars['total_debit']->value;?>
 &nbsp;&nbsp;
                        <strong>Total Credit:</strong> <?php echo $_smarty_tpl->tpl_vars['total_credit']->value;?>

                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

        </div>
    </div>
      <?php echo '<script'; ?>
>
        $(document).ready(function () {
            $('.reconcile-btn').click(function () {
                var transactionId = $(this).data('id');
                $.post("<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/update-archived", { id: transactionId }, function (response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert("Error updating transaction.");
                    }
                }, "json");
            });

            $(".edit-account").click(function () {
                var accountId = $(this).data("id");
                window.location.href = "/forecasting/?ng=transactions/edit-chart-of-accounts/" + accountId;
            });
    
            $(".delete-account").click(function () {
                var accountId = $(this).data("id");
                var baseUrl = window.location.origin + "/forecasting/?ng=transactions/";
    
                if (confirm("Are you sure you want to delete this account?")) {
                    $.post(baseUrl + "delete-chart-of-accounts/" + accountId, function (response) {
                        if (response.status === "success") {
                            location.reload();
                        } else {
                            alert("Delete failed: " + response.message);
                        }
                    }, "json").fail(function () {
                        alert("Error deleting account.");
                    });
                }
            });
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
