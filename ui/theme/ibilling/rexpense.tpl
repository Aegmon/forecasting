{extends file="$tpl_admin_layout"}

{block name="content"}
    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Add Expense']}</h5>

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
                            {foreach $deposit_trans as $dt}
                                    <option value="{$dt['id']}">{$dt['id']} - {$dt['description']} - {$dt['amount']}- {$dt['bookaccount']}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            </form>
                       <form class="form-horizontal" method="post" id="tform" role="form" action="{$_url}transactions/rexpense-post/">
                      <div class="form-group">
                            <label for="bookaccount" class="col-sm-3 control-label">Account</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bookaccount" name="bookaccount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountNo" class="col-sm-3 control-label">Account Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="accountNo" name="accountNo">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="account" class="col-sm-3 control-label">From</label>
                            <div class="col-sm-9">
                                <select id="account" name="account" class="form-control">
                                    <option value="">{$_L['Choose an Account']}</option>
                                    {foreach $d as $ds}
                                        <option selected value="{$ds['account']}">{$ds['account']}</option>
                                    {/foreach}


                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="to" class="col-sm-3 control-label">To</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="to" name="to">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-3 control-label">{$_L['Date']}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{$mdate}" name="date" id="date" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
                            </div>
                        </div>

                        <div class="form-group">
    <label for="description" class="col-sm-3 control-label">{$_L['Description']}</label>
    <div class="col-sm-9">
        <select class="form-control" id="description" name="description">
            <option value="">-- Select Expense --</option>
            <option value="Rent">Rent</option>
            <option value="Utilities">Utilities (Electricity, Water, Internet)</option>
            <option value="Salaries">Salaries & Wages</option>
            <option value="Office Supplies">Office Supplies</option>
            <option value="Marketing">Marketing & Advertising</option>
            <option value="Insurance">Insurance</option>
            <option value="Travel">Travel & Transportation</option>
            <option value="Maintenance">Maintenance & Repairs</option>
            <option value="Software">Software & Subscriptions</option>
            <option value="Legal Fees">Legal & Professional Fees</option>
            <option value="Taxes">Taxes & Licenses</option>
            <option value="Loan Payments">Loan Payments</option>
            <option value="Inventory">Inventory & Raw Materials</option>
            <option value="Training">Employee Training & Development</option>
            <option value="Miscellaneous">Miscellaneous</option>
            <option value="Others">Others</option>
        </select>
    </div>
</div>


                        <div class="form-group">
                            <label for="amount" class="col-sm-3 control-label">{$_L['Amount']}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control amount" id="amount" name="amount">
                            </div>
                        </div>






                        <div class="form-group">
                            <div class="col-sm-3">
                                &nbsp;
                            </div>
                            <div class="col-sm-9">
                          
                            </div>
                        </div>
                        <div id="a_hide">
                            <div class="form-group">
                                <label for="cats" class="col-sm-3 control-label">{$_L['Category']}</label>
                                <div class="col-sm-9">
                                    <select id="cats" name="cats" class="form-control">
                                        <option value="Uncategorized">{$_L['Uncategorized']}</option>
                                        {foreach $cats as $cat}
                                            <option value="{$cat['name']}">{$cat['name']}</option>
                                        {/foreach}


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags" class="col-sm-3 control-label">{$_L['Tags']}</label>
                                <div class="col-sm-9">
                                    <select name="tags[]" id="tags" class="form-control" multiple="multiple">
                                        {foreach $tags as $tag}
                                            <option value="{$tag['text']}">{$tag['text']}</option>
                                        {/foreach}

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payee" class="col-sm-3 control-label">{$_L['Payee']}</label>
                                <div class="col-sm-9">
                                    <select id="payee" name="payee" class="form-control">
                                        <option value="">{$_L['Choose Contact']}</option>
                                        {foreach $p as $ps}
                                            <option value="{$ps['id']}">{$ps['account']}</option>
                                        {/foreach}


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pmethod" class="col-sm-3 control-label">{$_L['Method']}</label>
                                <div class="col-sm-9">
                                    <select id="pmethod" name="pmethod" class="form-control">
                                        <option value="">{$_L['Select Payment Method']}</option>
                                        {foreach $pms as $pm}
                                            <option value="{$pm['name']}">{$pm['name']}</option>
                                        {/foreach}


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ref" class="col-sm-3 control-label">{$_L['Ref']}#</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ref" name="ref">
                                    <span class="help-block">{$_L['ref_example']}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="hidden" name="attachments" id="attachments" value="">
                                <button type="submit" id="rsubmit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>

    <input type="hidden" id="_lan_no_results_found" value="{$_L['No results found']}">

    <div id="modal_add_item" class="modal fade-scale" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">{$_L['Attach File']}</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  {$_L['Drop File Here']}</h3>
                            <br />
                            <span class="note">{$_L['Click to Upload']}</span>
                        </div>

                    </form>


                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

        </div>
    </div>
{/block}

{block name="script"}

   <script>
$('#deposit_select').on('change', function () {
    const depositId = $(this).val();

    if (depositId !== '') {
        $.post("{$_url}transactions/rexpense-json", {
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

                $('#bookaccount').val(d.bookaccount);
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

</script>


{/block}
