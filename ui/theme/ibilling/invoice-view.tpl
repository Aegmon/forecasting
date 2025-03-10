{extends file="$tpl_admin_layout"}

{block name="content"}

    <div class="row">
        <div class="col-lg-12">
           <!-- <div class="form-group">
                <label for="exampleInputEmail1">{$_L['Unique Invoice URL']}:</label>
                <input type="text" class="form-control" id="invoice_public_url" onClick="this.setSelectionRange(0, this.value.length)" value="{$_url}client/iview/{$d['id']}/token_{$d['vtoken']}">
            </div> -->
        </div>
        <div class="col-lg-12"  id="application_ajaxrender">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Invoice']} - {$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if} </h5>
                    <input type="hidden" name="iid" value="{$d['id']}" id="iid">


                    <div class="btn-group  pull-right" role="group" aria-label="...">


                     


                        {if $_c['accounting'] eq '1'}
                            <button type="button" class="btn  btn-danger btn-sm" id="add_payment"><i class="fa fa-plus"></i> {$_L['Add Payment']}</button>
                        {/if}

                     
                        <div class="btn-group" role="group">
                            <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-file-pdf-o"></i>
                                {$_L['PDF']}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{$_url}client/ipdf/{$d['id']}/token_{$d['vtoken']}/view/" target="_blank">{$_L['View PDF']}</a></li>
                                <li><a href="{$_url}client/ipdf/{$d['id']}/token_{$d['vtoken']}/dl/">{$_L['Download PDF']}</a></li>
                            </ul>
                        </div>
                        <!-- <a href="{$_url}iview/print/{$d['id']}/token_{$d['vtoken']}" target="_blank" class="btn btn-primary  btn-sm"><i class="fa fa-print"></i> {$_L['Print']}</a> -->


                    </div>

                </div>
                <div class="ibox-content">

                    <div class="invoice">
                        <header class="clearfix">
                            <div class="row">
                                <div class="col-sm-6 mt-md">
                                    <h2 class="h2 mt-none mb-sm text-dark text-bold">{$_L['INVOICE']}</h2>
                                    <h4 class="h4 m-none text-dark text-bold">#{$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</h4>
                                    {if $d['status'] eq 'Unpaid'}
                                        <h3 class="alert alert-danger">{$_L['Unpaid']}</h3>
                                    {elseif $d['status'] eq 'Paid'}
                                        <h3 class="alert alert-success">{$_L['Paid']}</h3>
                                    {elseif $d['status'] eq 'Partially Paid'}
                                        <h3 class="alert alert-info">{$_L['Partially Paid']}</h3>
                                    {else}
                                        <h3 class="alert alert-info">{$d['status']}</h3>
                                    {/if}
                                </div>
                                <div class="col-sm-6 text-right mt-md mb-md">
                                 
                                
                                </div>
                            </div>
                        </header>
                        <div class="bill-info">
                            <div class="row">
                                <div class="col-md-6">
                                  
                                </div>
                                <div class="col-md-6">
                                    <div class="bill-data text-right">
                                        <p class="mb-none">
                                            <span class="text-dark">{$_L['Invoice Date']}:</span>
                                            <span class="value">{date( $_c['df'], strtotime($d['date']))}</span>
                                        </p>
                                      
                                        <h2> {$_L['Invoice Total']}: <span class="amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['total']}</span> </h2>
                                        {if ($d['credit']) neq '0.00'}
                                            <h2> {$_L['Total Paid']}:  <span class="amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['credit']}</span> </h2>
                                            {*<h2> {$_L['Amount Due']}: {$_c['currency_code']} {number_format($i_due,2,$_c['dec_point'],$_c['thousands_sep'])} </h2>*}
                                            <h2> {$_L['Amount Due']}: <span class="amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$i_due}</span> </h2>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table invoice-items">
                                <thead>
                                <tr class="h4 text-dark">
                                    <th id="cell-id" class="text-semibold">#</th>
                                    <th id="cell-item" class="text-semibold">{$_L['Item']}</th>

                                    <th id="cell-price" class="text-center text-semibold">{$_L['Price']}</th>
                                    <th id="cell-qty" class="text-center text-semibold">{$_L['Quantity']}</th>
                                    <th id="cell-total" class="text-center text-semibold">{$_L['Total']}</th>
                                </tr>
                                </thead>
                                <tbody>

                                {foreach $items as $item}
                                    <tr>
                                        <td>{$item['itemcode']}</td>
                                        <td class="text-semibold text-dark">{$item['description']}</td>

                                        <td class="text-center amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$item['amount']}</td>
                                        <td class="text-center">{$item['qty']}</td>
                                        <td class="text-center amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$item['total']}</td>
                                    </tr>
                                {/foreach}

                                </tbody>
                            </table>
                        </div>

                        <div class="invoice-summary">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-8">
                                    <table class="table h5 text-dark">
                                        <tbody>
                                        <tr class="b-top-none">
                                            <td colspan="2">{$_L['Subtotal']}</td>
                                            <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['subtotal']}</td>
                                        </tr>
                                        {if ($d['discount']) neq '0.00'}
                                            <tr>
                                                <td colspan="2">{$_L['Discount']}</td>
                                                <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['discount']}</td>
                                            </tr>
                                        {/if}
                                        <!-- <tr>
                                            <td colspan="2">{$_L['TAX']}</td>
                                            <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['tax']}</td>
                                        </tr> -->
                                        
                                        {if ($d['credit']) neq '0.00'}
                                            <tr>
                                                <td colspan="2">{$_L['Total']}</td>
                                                <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['total']}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">{$_L['Total Paid']}</td>
                                                <td class="text-left amount">{$d['credit']}</td>
                                            </tr>
                                            <tr class="h4">
                                                <td colspan="2">{$_L['Amount Due']}</td>
                                                {*<td class="text-left">{$_c['currency_code']} {number_format($i_due,2,$_c['dec_point'],$_c['thousands_sep'])}</td>*}
                                                <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$i_due}</td>
                                            </tr>
                                        {else}
                                            <tr class="h4">
                                                <td colspan="2">{$_L['Grand Total']}</td>
                                                <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$_c['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['total']}</td>
                                            </tr>
                                        {/if}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {if ($trs_c neq '')}
                        <h3>{$_L['Related Transactions']}</h3>
                        <table class="table table-bordered sys_table">
                            <th>{$_L['Date']}</th>
                            <th>{$_L['Account']}</th>


                            <th class="text-right">{$_L['Amount']}</th>

                            <th>{$_L['Description']}</th>




                            {foreach $trs as $tr}
                                <tr class="{if $tr['cr'] eq '0.00'}warning {else}info{/if}">
                                    <td>{date( $_c['df'], strtotime($tr['date']))}</td>
                                    <td>{$tr['account']}</td>


                                    <td class="text-right amount">{$tr['amount']}</td>
                                    <td>{$tr['description']}</td>




                                </tr>
                            {/foreach}



                        </table>
                    {/if}

                    {if ($d['notes']) neq ''}
                        <div class="well m-t">
                            {$d['notes']}
                        </div>
                    {/if}

                    {if ($emls_c neq '')}
                        <hr>
                        <h3>{$_L['Related Emails']}</h3>
                        <table class="table table-bordered sys_table">
                            <th width="20%">{$_L['Date']}</th>
                            <th>{$_L['Subject']}</th>







                            {foreach $emls as $eml}
                                <tr>
                                    <td>{date( $_c['df'], strtotime($eml['date']))}</td>
                                    <td>{$eml['subject']}</td>
                                </tr>
                            {/foreach}



                        </table>
                    {/if}



                </div>


            </div>
        </div>
    </div>

    <input type="hidden" id="_lan_msg_confirm" value="{$_L['are_you_sure']}">
    <input type="hidden" id="admin_email" value="{$user->username}">

{/block}