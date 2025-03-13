{extends file="$tpl_admin_layout"}

{block name="content"}

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Chart of Accounts</h5>
            </div>
            <div class="ibox-content">

                <!-- Tabs for Account Types -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-all" data-toggle="tab">All</a></li>
                    <li><a href="#tab-asset" data-toggle="tab">Assets</a></li>
                    <li><a href="#tab-liability" data-toggle="tab">Liabilities</a></li>
                    <li><a href="#tab-equity" data-toggle="tab">Equity</a></li>
                    <li><a href="#tab-expense" data-toggle="tab">Expenses</a></li>
                    <li><a href="#tab-revenue" data-toggle="tab">Revenue</a></li>
                </ul>

                <div class="tab-content">
                    <!-- All Accounts (Default Tab) -->
                    <div class="tab-pane active" id="tab-all">
                        {include file="sections/chart-of-accounts-table.tpl" accounts=$accounts}
                    </div>

                    <!-- Assets -->
                    <div class="tab-pane" id="tab-asset">
                        {include file="sections/chart-of-accounts-table.tpl" accounts=$assets}
                    </div>

                    <!-- Liabilities -->
                    <div class="tab-pane" id="tab-liability">
                        {include file="sections/chart-of-accounts-table.tpl" accounts=$liabilities}
                    </div>

                    <!-- Equity -->
                    <div class="tab-pane" id="tab-equity">
                        {include file="sections/chart-of-accounts-table.tpl" accounts=$equities}
                    </div>

                    <!-- Expenses -->
                    <div class="tab-pane" id="tab-expense">
                        {include file="sections/chart-of-accounts-table.tpl" accounts=$expenses}
                    </div>

                    <!-- Revenue -->
                    <div class="tab-pane" id="tab-revenue">
                        {include file="sections/chart-of-accounts-table.tpl" accounts=$revenues}
                    </div>
                </div> <!-- Tab Content End -->
            </div>
        </div>
    </div>
</div>

<!-- Edit Account Modal -->
<div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 100%; width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccountModalLabel">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAccountForm">
                    <input type="hidden" id="edit_account_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account #</label>
                                <input type="text" id="edit_account_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" id="edit_description" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Type</label>
                                <select id="edit_asset_type" class="form-control">
                                    <option>Asset</option>
                                    <option>Liability</option>
                                    <option>Equity</option>
                                    <option>Expense</option>
                                    <option>Revenue</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Statement</label>
                                <input type="text" id="edit_statement" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveEditAccount">Save Changes</button>
            </div>
        </div>
    </div>
</div>



{/block}
