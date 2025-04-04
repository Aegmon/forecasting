{extends file="$tpl_admin_layout"}

{block name="content"}
    <div class="row">


        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Reports by Date']} </h5>

                </div>
                <div class="ibox-content">

                    <form class="form-inline mb-3">
                        <div class="form-group">
                            <label for="start_date">{$_L['From']}:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control mx-2" value="{$start_date}">
                        </div>
                        <div class="form-group">
                            <label for="end_date">{$_L['To']}:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control mx-2" value="{$end_date}">
                        </div>
                        <button type="submit" id="filterBtn" class="btn btn-primary">{$_L['Filter']}</button>
                    </form>

                    <div id="result">
                        <h4>{$_L['Total Income']}: {$_c['currency_code']} {number_format($cr,2,$_c['dec_point'],$_c['thousands_sep'])}</h4>
                        <h4>{$_L['Total Expense']}: {$_c['currency_code']} {number_format($dr,2,$_c['dec_point'],$_c['thousands_sep'])}</h4>

                        
                        <table class="table table-striped table-bordered table-responsive">

                            <th>{$_L['Account']}</th>
                            <th>{$_L['Type']}</th>
                            <th class="hidden-xs hidden-sm">{$_L['Category']}</th>
                            <th class="text-right">{$_L['Amount']}</th>
                            <th class="hidden-xs hidden-sm hidden-md">{$_L['Payer']}</th>
                            <th class="hidden-xs hidden-sm hidden-md">{$_L['Payee']}</th>
                            <th class="hidden-xs hidden-sm hidden-md">{$_L['Method']}</th>
                            <th class="hidden-xs hidden-sm hidden-md">{$_L['Ref']}</th>
                            <th>{$_L['Description']}</th>
                            <th class="text-right">{$_L['Dr']}</th>
                            <th class="text-right">{$_L['Cr']}</th>
                            <th class="text-right">{$_L['Balance']}</th>

                           {foreach $d as $ds}
                              
                                    <tr>
                                        <td>{$ds['account']}</td>
                                        <td>{ib_lan_get_line($ds['type'])}</td>
                                        <td>{if $ds['category'] == 'Uncategorized'}{$_L['Uncategorized']} {else} {$ds['category']} {/if}</td>
                                        <td class="text-right">{$_c['currency_code']} {number_format($ds['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                        <td class="hidden-xs hidden-sm hidden-md">{$ds['payer']}</td>
                                        <td class="hidden-xs hidden-sm hidden-md">{$ds['payee']}</td>
                                        <td class="hidden-xs hidden-sm hidden-md">{$ds['method']}</td>
                                        <td class="hidden-xs hidden-sm hidden-md">{$ds['ref']}</td>
                                        <td>{$ds['description']}</td>
                                        <td class="text-right">{$_c['currency_code']} {number_format($ds['dr'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                        <td class="text-right">{$_c['currency_code']} {number_format($ds['cr'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                        <td class="text-right"><span {if $ds['bal'] < 0}class="text-red"{/if}>{$_c['currency_code']} {number_format($ds['bal'],2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>
                                    </tr>
                           
                            {/foreach}




                        </table>
                    </div>


                </div>
            </div>
        </div>



        <!-- Widget-2 end-->
    </div>


    <input type="hidden" id="_lan_i18n" value="{Ib_I18n::get_code($_c['language'])}">
{/block}
