{extends file="$tpl_admin_layout"}

{block name="content"}

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Account</h5>
            </div>
            <div class="ibox-content">
                <form id="addAccountForm" method="post" action="{$_url}transactions/add-accounts-post">
                    <div class="form-group">
                        <label>Account #</label>
                        <input type="number" name="account_number" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Asset Type</label>
                        <select name="asset_type" class="form-control" required>
                            <option value="Asset">Asset</option>
                            <option value="Liability">Liability</option>
                            <option value="Equity">Equity</option>
                            <option value="Expense">Expense</option>
                            <option value="Revenue">Revenue</option>
                        </select>
                    </div>

                 

                    <button type="submit" class="btn btn-primary">Add Account</button>
                    <a href="{$_url}transactions/chart-of-accounts" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

{/block}