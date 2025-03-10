<?php
/* Smarty version 3.1.39, created on 2024-11-20 04:58:41
  from '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/add-invoice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_673cfc011cd5f8_87547809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c20dda82a0d509581c032b5c833f91ff36c4995d' => 
    array (
      0 => '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/add-invoice.tpl',
      1 => 1732049915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673cfc011cd5f8_87547809 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1796211918673cfc011ca852_68601371', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_1796211918673cfc011ca852_68601371 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1796211918673cfc011ca852_68601371',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['New Invoice'];?>

                </h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <form id="invform" method="post">
                    <div class="ibox-content">
                        <div class="row">
                
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="idate" class="col-sm-4 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive m-t">
                            <table class="table invoice-table" id="invoice_items">
                                <thead>
                                <tr>
                                    <th width="10%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item Code'];?>
</th>
                                    <th width="55%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item Name'];?>
</th>
                                    <th width="10%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];?>
</th>
                                    <th width="10%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>
                                   <th width="15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                
                        <button type="button" class="btn btn-primary" id="item-add">
                            <i class="fa fa-search"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Product'];?>

                        </button>
             

                        <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sub Total'];?>
 :</strong></td>
                                <td id="sub_total" class="amount" data-a-sign="" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
"
                                    data-a-sep="" data-d-group="3">0.00
                                </td>
                            </tr>
                            <tr>
                                <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['TOTAL'];?>
 :</strong></td>
                                <td id="total" class="amount" data-a-sign="" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
"
                                    data-a-sep="" data-d-group="3">0.00
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="text-right">
                            <button class="btn btn-primary" id="submit">
                                <i class="fa fa-save"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save Invoice'];?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
}
}
/* {/block "content"} */
}
