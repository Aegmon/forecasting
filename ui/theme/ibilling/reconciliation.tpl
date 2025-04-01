{extends file="$tpl_admin_layout"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> {$_L['Page']} {$paginator['page']} {$_L['of']} {$paginator['lastpage']}. </h5>
                </div>
                <div class="ibox-content">
                
                    <div id="dpx"></div>

                 
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered sys_table">
                            <thead>
                                <tr>
                                    <th>{$_L['Date']}</th>
                                    <th>{$_L['Account']}</th>
                                    <th>Disbursement</th>
                                    <th class="text-right">{$_L['Amount']}</th>
                                    <th>{$_L['Description']}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach $d as $ds}
                                <tr class="{if $ds['cr'] eq '0.00'}warning{else}info{/if}">
                                    <td>{date($_c['df'], strtotime($ds['date']))}</td>
                                    <td>{$ds['account']}</td>
                                    <td>Disbursement</td>
                                    <td class="text-right amount">{$ds['amount']}</td>
                                    <td>{$ds['description']}</td>
                                    <td>
                                        {if $ds['archived'] eq '0'}
                                            <button class="btn btn-success btn-xs reconcile-btn" data-id="{$ds['id']}">{$_L['OK']}</button>
                                        {/if}
                                    </td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <strong>Total:</strong> {$total_credit}
                    </div>
                </div>
            </div>
            {$paginator['contents']}
        </div>
    </div>
{/block}
