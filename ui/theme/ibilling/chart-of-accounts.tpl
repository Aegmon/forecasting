{extends file="$tpl_admin_layout"}

{block name="content"}

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Import & Reconcile Transactions</h5>
            </div>
            <div class="ibox-content">

                <!-- Import CSV Form -->
                <form action="{$_url}transactions/import_csv/" method="post" enctype="multipart/form-data" class="form-inline mb-3">
                    <div class="form-group mr-2">
                        <input type="file" name="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Import & Reconcile CSV</button>
                </form>

                {if isset($excel_transactions) && isset($db_transactions)}
                <div class="row mt-4">

                    <!-- Excel Transactions -->
                    <div class="col-md-5">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Excel Transactions</h5>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-sm table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $excel_transactions as $ex}
                                        <tr>
                                            <td>{$ex.id}</td>
                                            <td>{$ex.date}</td>
                                            <td>{$ex.account}</td>
                                            <td>{$ex.amount}</td>
                                            <td>{$ex.description}</td>
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Match Buttons -->
                    <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
                        <div class="ibox float-e-margins w-100">
                            <div class="ibox-title text-center">
                                <h5>Match Actions</h5>
                            </div>
                            <div class="ibox-content text-center">
                                {foreach from=$excel_transactions item=ex}
                                    {assign var=db_item value=$db_transactions[$ex.id]|default:null}
                                    {if $db_item}
                                        <button class="btn btn-primary mb-2 match-btn" data-id="{$ex.id}">Match ID {$ex.id}</button>
                                    {/if}
                                {/foreach}
                            </div>
                        </div>
                    </div>

                    <!-- Database Transactions -->
                    <div class="col-md-5">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Database Transactions</h5>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-sm table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $db_transactions as $db}
                                        <tr>
                                            <td>{$db.id}</td>
                                            <td>{$db.date}</td>
                                            <td>{$db.account}</td>
                                            <td>{$db.amount}</td>
                                            <td>{$db.description}</td>
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                {/if}

            </div>
        </div>
    </div>
</div>

{/block}