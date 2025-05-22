<?php
/* Smarty version 3.1.39, created on 2025-05-22 08:40:20
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\deposit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_682e7274504734_83669048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '247b99476c0a5423ea3347998f0ae9dc96097a2b' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\deposit.tpl',
      1 => 1747874418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682e7274504734_83669048 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_422904107682e72744f4690_12275967', "content");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_862299991682e7274502de5_92667615', "script");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_422904107682e72744f4690_12275967 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_422904107682e72744f4690_12275967',
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
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form class="form-horizontal" method="post" id="tform" role="form">
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
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="to" class="col-sm-3 control-label">To</label>
                            <div class="col-sm-9">
                               <select id="to" name="to" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountNo" class="col-sm-3 control-label">Account Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="accountNo" name="accountNo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>
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
                                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
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
class Block_862299991682e7274502de5_92667615 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_862299991682e7274502de5_92667615',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
$(document).ready(function () {
    // Initialize Select2
    $('#to').select2({
        tags: true,
        placeholder: 'Type to search book account...',
        ajax: {
            url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
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
        minimumInputLength: 1,
        createTag: function (params) {
            // Avoid creating tag if input is empty
            const term = $.trim(params.term);
            if (term === '') {
                return null;
            }
            return {
                id: term,
                text: term,
                newTag: true // mark as new
            };
        },
        templateResult: function (data) {
            var $result = $("<span></span>");
            $result.text(data.text);
            if (data.newTag) {
                $result.append(" <em>(new)</em>");
            }
            return $result;
        }
    });

    // When a new tag is entered and Select2 closes, force it to select the custom value
    $('#to').on('select2:close', function (e) {
        var inputValue = $('#to').data('select2').dropdown.$search.val();

        if (inputValue && !$('#to').find("option[value='" + inputValue + "']").length) {
            // Add the new option and select it
            var newOption = new Option(inputValue, inputValue, true, true);
            $('#to').append(newOption).trigger('change');
        }
    });

    // Handle blur logic
    $('#to').on('change', function () {
        let toValue = $(this).val();

        if (toValue !== '') {
            $.post('<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/lookup', {
                to: toValue
            }, function (data) {
                const res = JSON.parse(data);

                if (res.exists) {
                    $('#accountNo').val(res.accountNo).prop('readonly', true);
                    $('#add-contact-group').remove();
                } else {
                    $('#accountNo').val('').prop('readonly', false);

                    if (!$('#add-contact-group').length) {
                        let contactField = `
                            <div class="form-group" id="add-contact-group">
                                <label class="col-sm-3 control-label">Add Contact</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="add_contact" id="add_contact" placeholder="Enter contact name">
                                </div>
                            </div>`;
                        $('#accountNo').closest('.form-group').after(contactField);
                    }
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
