{extends file="$tpl_admin_layout"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> {$_L['Page']} {$paginator['page']} {$_L['of']} {$paginator['lastpage']}. </h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered sys_table">
                            <th>{$_L['Date']}</th>
                            <th>{$_L['Account']}</th>
                            <th>{$_L['Type']}</th>
                            <th class="text-right">{$_L['Amount']}</th>
                            <th>{$_L['Description']}</th>
                            <th class="text-right">{$_L['Dr']}</th>
                            <th class="text-right">{$_L['Cr']}</th>
                       
                            <th>Action</th>
                            {foreach $d as $ds}
                                <tr class="{if $ds['cr'] eq '0.00'}warning {else}info{/if}">
                                    <td>{date( $_c['df'], strtotime($ds['date']))}</td>
                                    <td>{$ds['account']}</td>
                                    <td>
                                        {if $ds['type'] eq 'Income'}
                                            {$_L['Income']}
                                        {elseif $ds['type'] eq 'Expense'}
                                            {$_L['Expense']}
                                        {elseif $ds['type'] eq 'Transfer'}
                                            {$_L['Transfer']}
                                        {else}
                                            {$ds['type']}
                                        {/if}
                                    </td>
                                    <td class="text-right amount">{$ds['amount']}</td>
                                    <td>{$ds['description']}</td>
                                    <td class="text-right amount">{$ds['dr']}</td>
                                    <td class="text-right amount">{$ds['cr']}</td>
                               
                                   <td>
                                        {if $ds['archived'] eq '0'}
                                            <button class="btn btn-success btn-xs reconcile-btn" data-id="{$ds['id']}">{$_L['OK']}</button>
                                        {/if}
                                    </td>
                                </tr>
                            {/foreach}
                        </table>
                    </div>
                    <div class="text-right">
                        <strong>Total Debit:</strong> {$total_debit} &nbsp;&nbsp;
                        <strong>Total Credit:</strong> {$total_credit}
                    </div>
                </div>
            </div>
            {$paginator['contents']}
        </div>
    </div>
      <script>
        $(document).ready(function () {
            $('.reconcile-btn').click(function () {
                var transactionId = $(this).data('id');
                $.post("{$_url}transactions/update-archived", { id: transactionId }, function (response) {
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
    </script>
{/block}
