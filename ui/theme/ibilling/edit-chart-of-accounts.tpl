{extends file="$tpl_admin_layout"}

{block name="content"}

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Account</h5>
            </div>
            <div class="ibox-content">
                <form id="editAccountForm">
                    <input type="hidden" id="edit_account_id" value="{$account.id}">

                    <div class="form-group">
                        <label>Account #</label>
                        <input type="text" id="edit_account_number" class="form-control" value="{$account.account_number}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" id="edit_description" class="form-control" value="{$account.description}">
                    </div>

                    <div class="form-group">
                        <label>Asset Type</label>
                        <select id="edit_asset_type" class="form-control">
                            <option {if $account.asset_type == 'Asset'}selected{/if}>Asset</option>
                            <option {if $account.asset_type == 'Liability'}selected{/if}>Liability</option>
                            <option {if $account.asset_type == 'Equity'}selected{/if}>Equity</option>
                            <option {if $account.asset_type == 'Expense'}selected{/if}>Expense</option>
                            <option {if $account.asset_type == 'Revenue'}selected{/if}>Revenue</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Statement</label>
                        <input type="text" id="edit_statement" class="form-control" value="{$account.statement}">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{$_url}transactions/chart-of-accounts" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

{/block}
