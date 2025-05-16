{extends file="$tpl_admin_layout"}
{block name="content"}
<div class="row mt-4">
    <div class="col-md-12">
        <!-- Import CSV Form -->
        <form action="{$_url}transactions/import_csv/" method="post" enctype="multipart/form-data" class="form-inline mb-3">
            <div class="form-group">
                <input type="file" name="csv_file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Import</button>
        </form>
        <br>
             <a href="{$_url}transactions/reports/" class="btn btn-primary" >
    Reconciliation Report </a>

    </div>
</div>
<br>
<div class="row mb-4">
    <div class="col-md-5">
        <div class="alert alert-info">
        <strong>Statement Balance:</strong> {$actual_balance|number_format:2}
        </div>
    </div>
        <div class="col-md-2 text-center" >
            </div>

    <div class="col-md-5">
        <div class="alert alert-warning">
            
                <strong>Book Balance:</strong> {$statement_balance|number_format:2}
        </div>
    </div>
</div>

{if isset($excel_transactions) && isset($db_transactions)}
    {foreach from=$excel_transactions item=ex}
        {assign var=db_item value=$db_transactions[$ex.id]|default:null}
        {assign var=is_archived value=$db_item.archived|default:0}

        <div class="row align-items-center mb-4">

            <!-- Excel Transaction -->
            <div class="col-md-5">
                <div class="ibox" style="background-color: {if $is_archived == 1}#d4edda{else}#f8f9fa{/if}; border-left: 5px solid {if $is_archived == 1}#28a745{else}#007bff{/if}; padding: 15px;">
                    <h5><strong>Transaction ID:</strong> {$ex.id}</h5>
                    <p><strong>Date:</strong> {$ex.date}</p>
                    <p><strong>Account:</strong> {$ex.account}</p>
                    <p><strong>Amount:</strong> {$ex.amount}</p>
                    <p><strong>Description:</strong> {$ex.description}</p>
                </div>
            </div>

            <!-- Match Button in the middle -->
            <div class="col-md-2 text-center" style="
    margin: 6% 0%;">
                {if $db_item && $db_item.archived != 1}
                    <button class="btn btn-primary match-btn mt-2" data-id="{$ex.id}">Match</button>
                {/if}
                {if $db_item && $db_item.archived == 1}
                    <span class="badge bg-success text-white mt-2">Reconciled</span>
                {/if}
            </div>

            <!-- DB Transaction -->
            <div class="col-md-5">
                <div class="ibox" style="background-color: {if $is_archived == 1}#d4edda{else}#f8f9fa{/if}; border-left: 5px solid {if $is_archived == 1}#28a745{else}#007bff{/if}; padding: 15px;">
                    <h5><strong>Transaction ID:</strong> {if $db_item}{$db_item.id}{else}-{/if}</h5>
                    {if $db_item}
                        <p><strong>Date:</strong> {$db_item.date}</p>
                        <p><strong>Account:</strong> {$db_item.account}</p>
                        <p><strong>Amount:</strong>
                            {if $db_item.type == 'Expense'}
                                -{$db_item.amount}
                            {elseif $db_item.type == 'Income' || $db_item.type == 'Deposit'}
                                {$db_item.amount}
                            {else}
                                {$db_item.amount}
                            {/if}
                        </p>
                        <p><strong>Description:</strong> {$db_item.description}</p>
                    {else}
                        <p class="text-danger">No matching DB transaction.</p>
                    {/if}
                </div>
            </div>

        </div>
    {/foreach}
{/if}



{/block}


{block name="script"}
<script>
$(document).ready(function() {
    $(".match-btn").on("click", function() {
        var transactionId = $(this).data("id");
        if(confirm("Mark transaction ID "+transactionId+" as reconciled?")) {
            $.ajax({
                type: "POST",
                url: "{$_url}transactions/update-archived",
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
</script>
{/block}
