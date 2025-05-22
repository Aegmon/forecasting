{extends file="$tpl_admin_layout"}

{block name="content"}

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Chart of Accounts</h5>
                <div class="ibox-tools">
                    <a href="{$_url}transactions/add-accounts/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Accounts</a>
                </div>
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





{/block}
