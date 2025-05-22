<?php
/* Smarty version 3.1.39, created on 2025-05-22 08:54:35
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\rdeposit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_682e75cb8fa283_10907055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f884c86884ef356694eb21c511e74a32500a956f' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\rdeposit.tpl',
      1 => 1747874044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682e75cb8fa283_10907055 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1633953928682e75cb8ea643_97723458', "content");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1274421424682e75cb8f93c9_62710655', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_1633953928682e75cb8ea643_97723458 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1633953928682e75cb8ea643_97723458',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Deposit'];?>
</h5>

                </div>
                <div class="ibox-content" id="ribox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form method="post"  class="form-horizontal">
                 <div class="form-group">
                    <label for="deposit_select" class="col-sm-3 control-label">Load From Deposit ID</label>
                    <div class="col-sm-9">
                        <select id="deposit_select" class="form-control">
                            <option value="">-- Select Deposit ID --</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deposit_trans']->value, 'dt');
$_smarty_tpl->tpl_vars['dt']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dt']->value) {
$_smarty_tpl->tpl_vars['dt']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dt']->value['description'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dt']->value['amount'];?>
- <?php echo $_smarty_tpl->tpl_vars['dt']->value['bookaccount'];?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>
            </form>

                    <form class="form-horizontal" method="post" id="tform" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/rdeposit-post/">
                   

                        <div class="form-group">
                            <label for="account" class="col-sm-3 control-label">From</label>
                            <div class="col-sm-9">
                                <select id="account" name="account" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Choose an Account'];?>
</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                        <option selected value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountNo" class="col-sm-3 control-label">Account Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="accountNo" name="accountNo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="to" class="col-sm-3 control-label">To</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="to" name="to">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>
" name="date" id="date" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description" value="Deposit" readonly>
                          
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="amount" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control amount" id="amount" name="amount">
                            </div>
                        </div>






                        <div class="form-group">
                            <div class="col-sm-3">
                                &nbsp;
                            </div>
                       
                        </div>
                        <div id="a_hide" class="form-horizontal" >
                            <div class="form-group">
                                <label for="cats" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Category'];?>
</label>
                                <div class="col-sm-9">
                                    <select id="cats" name="cats" class="form-control">
                                        <option value="Uncategorized"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Uncategorized'];?>
</option>

                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cats']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tags'];?>
</label>
                                <div class="col-sm-9">
                                    <select name="tags[]" id="tags"  class="form-control" multiple="multiple">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
$_smarty_tpl->tpl_vars['tag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Payer'];?>
</label>
                                <div class="col-sm-9">
                                    <select id="payer" name="payer" class="form-control">
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Choose Contact'];?>
</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['p']->value, 'ps');
$_smarty_tpl->tpl_vars['ps']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ps']->value) {
$_smarty_tpl->tpl_vars['ps']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['ps']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ps']->value['account'];?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Method'];?>
</label>
                                <div class="col-sm-9">
                                    <select id="pmethod" name="pmethod" class="form-control">
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Payment Method'];?>
</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pms']->value, 'pm');
$_smarty_tpl->tpl_vars['pm']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pm']->value) {
$_smarty_tpl->tpl_vars['pm']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['pm']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['pm']->value['name'];?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ref" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Ref'];?>
#</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ref" name="ref">
                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ref_example'];?>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="hidden" name="attachments" id="attachments" value="">
                                <button type="submit" id="rsubmit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>




        </div>

   

    </div>


    <input type="hidden" id="_lan_no_results_found" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No results found'];?>
">

    <div id="modal_add_item" class="modal fade-scale" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Attach File'];?>
</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Drop File Here'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Click to Upload'];?>
</span>
                        </div>

                    </form>


                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

        </div>
    </div>

<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_1274421424682e75cb8f93c9_62710655 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1274421424682e75cb8f93c9_62710655',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


   <?php echo '<script'; ?>
>
$('#deposit_select').on('change', function () {
    const depositId = $(this).val();

    if (depositId !== '') {
        $.post("<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/rdeposit-json", {
            id: depositId
        }, function (data) {
            const res = JSON.parse(data);
            if (res.status === 'success') {
                const d = res.data;

                console.log('Account from server:', d.account);

            const accountSelect = $('#account');

            // Check if the option with d.account exists
            if (accountSelect.find('option[value="' + d.account + '"]').length === 0) {
                // If not, add it so we can select it
                accountSelect.append($('<option>', {
                    value: d.account,
                    text: d.account
                }));
            }

            // Set the select to this value, which selects the option
            accountSelect.val(d.account);


                $('#accountNo').val(d.accountnumber);
                $('#to').val(d.to_field);
                $('#date').val(d.date);
                $('#description').val(d.description);
                $('#amount').val(d.amount);
            } else {
                alert('Transaction not found.');
            }
        });
    }
});
$('#to').select2({
    placeholder: 'Type to search book account...',
    ajax: {
        url:'<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/get-bookaccounts',
        type: 'POST',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term
            };
        },
        processResults: function (data) {
            return {
                results: data.results
            };
        },
        cache: true
    },
    minimumInputLength: 1
});

<?php echo '</script'; ?>
>


<?php
}
}
/* {/block "script"} */
}
