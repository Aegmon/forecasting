{extends file="$tpl_admin_layout"}

{block name="content"}

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5> {$_L['Page']} {$paginator.page} {$_L['of']} {$paginator.lastpage}. </h5>
            </div>
            <div class="ibox-content">

                <!-- Filter Form -->
                <div class="row">
                    <div class="col-md-5">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{$start_date|escape}">
                    </div>
                    <div class="col-md-5">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{$end_date|escape}">
                    </div>
                    <div class="col-md-2" style="margin-top: 25px;">
                        <button id="filterBtn" class="btn btn-primary">Filter</button>
                    </div>
                </div>

                <br>

                <form method="GET" id="exportForm">
                    <input type="hidden" name="start_date" id="export_start_date" value="{$start_date|escape}">
                    <input type="hidden" name="end_date" id="export_end_date" value="{$end_date|escape}">
                    <button type="submit" class="btn btn-success">Export CSV</button>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered sys_table">
                        <thead>
                            <tr>
                                <th>{$_L['Date']}</th>
                                <th>{$_L['Account']}</th>
                         
                                <th class="text-right">{$_L['Amount']}</th>
                                <th>{$_L['Description']}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $d as $ds}
                                <tr>
                                    <td>{date($_c.df, strtotime($ds.date))}</td>
                                    <td>{$ds.account}</td>
                                
                                    <td class="text-right">
                                        {if $ds.type == 'Expense'}
                                            <span class="text-danger">-{$ds.amount}</span>
                                        {else}
                                            <span class="text-success">{$ds.amount}</span>
                                        {/if}
                                    </td>
                                    <td>{$ds.description}</td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        {$paginator.contents}
    </div>
</div>

{/block}
