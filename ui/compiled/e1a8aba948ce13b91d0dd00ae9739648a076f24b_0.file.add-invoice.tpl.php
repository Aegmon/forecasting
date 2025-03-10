<?php
/* Smarty version 3.1.39, created on 2024-12-13 07:22:56
  from 'C:\xampp\htdocs\forecasting\ui\theme\ibilling\add-invoice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_675b7050185d18_66424204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1a8aba948ce13b91d0dd00ae9739648a076f24b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\add-invoice.tpl',
      1 => 1734044675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_675b7050185d18_66424204 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_976910523675b705016e2c5_60844022', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_976910523675b705016e2c5_60844022 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_976910523675b705016e2c5_60844022',
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
