{extends file="$tpl_admin_layout"}

{block name="content"}
    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Add Expense']}</h5>

                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form class="form-horizontal" method="post" id="tform" role="form">
                        <div class="form-group">
                            <label for="account" class="col-sm-3 control-label">{$_L['Account']}</label>
                            <div class="col-sm-9">
                                <select id="account" name="account" class="form-control">
                                    <option value="">{$_L['Choose an Account']}</option>
                                    {foreach $d as $ds}
                                        <option value="{$ds['account']}">{$ds['account']}</option>
                                    {/foreach}


                                </select>
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
                                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Recent Expense']}</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-bordered sys_table">
                        <thead>
                        <tr>
                            <th>{$_L['Description']}</th>
                            <th>{$_L['Amount']}</th>

                        </tr>
                        </thead>
                        <tbody>

                        {foreach $tr as $trs}
                            <tr>
                                <td><a href="{$_url}transactions/manage/{$trs['id']}">
                                        {if $trs['attachments'] neq ''}
                                            <i class="fa fa-paperclip"></i>
                                        {/if}
                                        {$trs['description']}
                                    </a> </td>
                                <td class="amount">{$trs['amount']}</td>
                            </tr>
                        {/foreach}

                        </tbody>
                    </table>

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
