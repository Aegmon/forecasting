{extends file="$tpl_admin_layout"}
{block name="content"}
<div class="row mt-4">
    <div class="col-md-12">
        <!-- Import CSV Form -->
        <form action="{$_url}transactions/import_csv/" method="post" enctype="multipart/form-data" class="mb-3">
            <div class="row">
                <!-- Left: File input and Import button -->
                <div class="col-md-4 d-flex form-inline">
                    <input type="file" name="csv_file" class="form-control" required>
                    <button type="submit" class="btn btn-success">Import</button>
                </div>

                <!-- Middle: Expense and Deposit buttons -->
                <div class="col-md-4 d-flex justify-content-center gap-2 mt-2 mt-md-0">
                    <a href="{$_url}transactions/rdeposit/" class="btn btn-primary">Deposit</a>
                    <a href="{$_url}transactions/rexpense/" class="btn btn-primary">Expense</a>
                </div>

                <!-- Right: Bank and Account buttons + Book Account dropdown -->
                <div class="col-md-4 d-flex justify-content-end gap-2 mt-2 mt-md-0">
                    <a href="{$_url}transactions/list/" class="btn btn-primary">Bank Statement</a>
                    <a href="{$_url}transactions/reconlist/" class="btn btn-primary">Account Transaction</a>

                    <!-- Book Account Dropdown -->
                   
                </div>

            </div>
        </form>
        <br>
                    <form method="post" action="{$_url}transactions/select_bookaccount" class="d-inline">
                        <select name="bookaccount" class="form-select" onchange="this.form.submit()">
                            <option value="">All Book Accounts</option>
                            {foreach from=$bookaccounts item=ba}
                                <option value="{$ba}" {if $selected_bookaccount == $ba}selected{/if}>{$ba}</option>
                            {/foreach}
                        </select>
                    </form>
        <br>

        <!-- Reconciliation Report Button -->
        <a href="{$_url}transactions/reports/" class="btn btn-primary">Reconciliation Report</a>
    </div>
</div>

<br>
<div class="row mb-4">
    <div class="col-md-5">
        <div class="alert alert-info">
            <strong>Statement Balance:</strong> {$actual_balance|number_format:2}
        </div>
    </div>
    <div class="col-md-2 text-center"></div>
    <div class="col-md-5">
        <div class="alert alert-warning">
            <strong>Book Balance:</strong> {$statement_balance|number_format:2}
        </div>
    </div>
</div>

{foreach from=$matched_transactions item=entry}
    <div class="row align-items-center mb-4">
        <!-- Unarchived DB Transaction on Left -->
        <div class="col-md-5">
            <div class="ibox" style="background-color: #f8f9fa; border-left: 5px solid #007bff; padding: 15px;">
                     <p><strong>Transaction ID:</strong> {$entry.transaction.id}</p>
              <p><strong>Bank:</strong>
                    {if $entry.transaction.type == 'Deposit'}
                        {$entry.transaction.to_field}
                    {else}
                        {$entry.transaction.bookaccount}
                    {/if}
                </p>
              <p><strong>Acc Num:</strong> {$entry.transaction.accountnumber}</p>
               <p><strong>Date:</strong> {$entry.transaction.date}</p>
                <p><strong>Account:</strong>
                    {if $entry.transaction.type == 'Deposit'}
                        {$entry.transaction.to_field}
                    {else}
                        {$entry.transaction.to_field}
                    {/if}
                </p>

               
                <p><strong>Amount:</strong>
                    {if $entry.transaction.type == 'Expense'}
                        -{$entry.transaction.amount}
                    {else}
                        {$entry.transaction.amount}
                    {/if}
                </p>
                <p><strong>Description:</strong> {$entry.transaction.description}</p>
            </div>
        </div>

        <!-- Match Button or Reconciled Badge -->
        <div class="col-md-2 text-center" style="margin: 6% 0%;">
            {if $entry.matched}
                <button class="btn btn-primary match-btn mt-2" data-id="{$entry.transaction.id}">Match</button>
            {else}
                <span class="badge bg-secondary text-white mt-2">No Match</span>
            {/if}
        </div>

        <!-- Matched Reconcile Transaction on Right -->
        <div class="col-md-5">
            {if $entry.matched}
                <div class="ibox" style="background-color: #d4edda; border-left: 5px solid #28a745; padding: 15px;">
                    <p><strong>Bank:</strong>
                    {if $entry.matched.type == 'Deposit'}
                        {$entry.matched.to_field}
                    {else}
                        {$entry.matched.bookaccount}
                    {/if}
                </p>
              <p><strong>Acc Num:</strong> {$entry.matched.accountnumber}</p>
               <p><strong>Date:</strong> {$entry.matched.date}</p>
                <p><strong>Account:</strong>
                    {if $entry.transaction.type == 'Deposit'}
                        {$entry.transaction.to_field}
                    {else}
                        {$entry.transaction.to_field}
                    {/if}
                </p>
                    <p><strong>Amount:</strong>
                        {if $entry.matched.type == 'Expense'}
                            -{$entry.matched.amount}
                        {else}
                            {$entry.matched.amount}
                        {/if}
                    </p>
                    <p><strong>Description:</strong> {$entry.matched.description}</p>
                </div>
            {else}
                <div class="ibox" style="background-color: #f8f9fa; border-left: 5px solid #ccc; padding: 15px;">
                    <p class="text-muted text-center mt-4">No matched transaction</p>
                </div>
            {/if}
        </div>
    </div>
{/foreach}
{/block}

{block name="script"}
<script>
$(document).ready(function() {
    $(".match-btn").on("click", function() {
        var transactionId = $(this).data("id");
        if(confirm("Mark this transaction as reconciled?")) {
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
