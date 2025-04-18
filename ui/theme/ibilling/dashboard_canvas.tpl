{extends file="$tpl_admin_layout"}

{block name="content"}

    {$dashboard_section_0}



    <div class="row">
        <div class="col-md-12" id="ib_graph"></div>
        <div class="col-md-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="row" id="d_ajax_summary">

                        <div class="col-md-4"><div class="chart-statistic-box">
                                <div class="chart-txt">
                                    <div class="chart-txt-top">
                                        <p><span class="amount number">{$net_worth}</span></p>
                                        <hr>
                                        <p class="caption">{$_L['Net Worth']}</p>
                                    </div>
                                    <table class="tbl-data">
                                        <tr>
                                            <td class="amount">{$ti}</td>
                                            <td>{$_L['Income Today']}</td>
                                        </tr>
                                        <tr>
                                            <td class="amount">{$te}</td>
                                            <td>{$_L['Expense Today']}</td>
                                        </tr>
                                        <tr>
                                            <td class="amount">{$mi}</td>
                                            <td>{$_L['Income This Month']}</td>
                                        </tr>
                                        <tr>
                                            <td class="amount">{$me}</td>
                                            <td>{$_L['Expense This Month']}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div></div>


                        <div class="col-md-8">


                            <div class="chart-container">
                                <div class="" style="height:350px" id="inc_vs_exp_t"></div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div id="d_chart" style="height: 350px;"></div>
                </div>
            </div>

        </div>
    </div>


    <div class="row" id="sort_2">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="#" id="set_goal" class="btn btn-primary btn-xs pull-right"><i class="fa fa-bullseye"></i> {$_L['Set Goal']}</a>
                    <h5>{$_L['Net Worth n Account Balances']}</h5>
                </div>
                <div class="ibox-content" style="min-height: 365px;">
                    <div>
                        <h3 class="text-center amount">{$net_worth}</h3>
                        <div>
                            <span class="amount">{$net_worth}</span> {$_L['of']} <span class="amount">{$_c['networth_goal']}</span>
                            <small class="pull-right"><span class="amount">{$pg}</span>%</small>
                        </div>


                        <div class="progress progress-small">
                            <div style="width: {$pgb}%;" class="progress-bar progress-bar-{$pgc}"></div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered" style="margin-top: 26px;">
                        <th>{$_L['Account']}</th>
                        <th class="text-right">{$_L['Balance']}</th>
                        {foreach $d as $ds}
                            <tr>
                                <td>{$ds['account']}</td>
                                <td class="text-right"><span class="amount{if $ds['balance'] < 0} text-red{/if}">{$ds['balance']}</span></td>
                            </tr>
                        {/foreach}



                    </table>
                </div>
            </div>
        </div>


      

    </div>



    <div class="row" id="sort_3">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>{$_L['Latest Income']}</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Date']}</th>
                        <th>{$_L['Description']}</th>
                        <th class="text-right">{$_L['Amount']}</th>
                        {foreach $inc as $incs}
                            <tr>
                                <td>{date( $_c['df'], strtotime($incs['date']))}</td>
                                <td><a href="{$_url}transactions/manage/{$incs['id']}/">{$incs['description']}</a> </td>
                                <td class="text-right amount">{$incs['amount']}</td>
                            </tr>
                        {/foreach}



                    </table>
                </div>
            </div>

        </div>


        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>{$_L['Latest Expense']}</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Date']}</th>
                        <th>{$_L['Description']}</th>
                        <th class="text-right">{$_L['Amount']}</th>

                        {foreach $exp as $exps}
                            <tr>
                                <td>{date( $_c['df'], strtotime($exps['date']))}</td>
                                <td><a href="{$_url}transactions/manage/{$exps['id']}/">{$exps['description']}</a> </td>
                                <td class="text-right amount">{$exps['amount']}</td>
                            </tr>
                        {/foreach}



                    </table>
                </div>
            </div>

        </div>


    </div>


{/block}