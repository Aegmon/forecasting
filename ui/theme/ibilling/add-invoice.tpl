{extends file="$tpl_admin_layout"}

{block name="content"}

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{$_L['New Invoice']}</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <form id="invform" method="post">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="idate" class="col-sm-4 control-label">{$_L['Invoice Date']}</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="idate" name="idate" 
                                                   datepicker data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                   value="{$idate}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive m-t">
                            <table class="table invoice-table" id="invoice_items">
                                <thead>
                                <tr>
                                    <th width="10%">{$_L['Item Code']}</th>
                                    <th width="55%">{$_L['Item Name']}</th>
                                    <th width="10%">{$_L['Qty']}</th>
                                    <th width="10%">{$_L['Price']}</th>
                                    <th width="15%">{$_L['Total']}</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <button type="button" class="btn btn-primary" id="item-add"> 
                            <i class="fa fa-search"></i> {$_L['Add Product']}
                        </button>

                        <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong>{$_L['Sub Total']} :</strong></td>
                                <td id="sub_total" class="amount" data-a-sign="" data-a-dec="{$_c['dec_point']}"
                                    data-a-sep="" data-d-group="3">0.00</td>
                            </tr>
                            <tr>
                                <td><strong>{$_L['TOTAL']} :</strong></td>
                                <td id="total" class="amount" data-a-sign="" data-a-dec="{$_c['dec_point']}"
                                    data-a-sep="" data-d-group="3">0.00</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="text-right">
                            <button class="btn btn-primary" id="submit">
                                <i class="fa fa-save"></i> {$_L['Save Invoice']}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{/block}
