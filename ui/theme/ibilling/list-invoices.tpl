{extends file="$tpl_admin_layout"}

{block name="content"}

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{$_L['Invoices']}</h5>
                <div class="ibox-tools">
                    <a href="{$_url}invoices/add/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> {$_L['Add Invoice']}</a>
                </div>
            </div>
            <div class="ibox-content">
                <!-- 🔍 DataTable Integrated Table -->
                <table class="table table-bordered table-hover sys_table" id="invoice_table">
                    <thead>
                        <tr>
                            <th>{$_L['Amount']}</th>
                            <th>{$_L['Invoice Date']}</th>
                            <th>{$_L['Status']}</th>
                            <th>{$_L['Type']}</th>
                            <th class="text-right">{$_L['Manage']}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $d as $ds}
                            <tr>
                                <td>{$ds['total']}</td>
                                <td>{date($_c['df'], strtotime($ds['date']))}</td>
                                <td>
                                    {if $ds['status'] eq 'Unpaid'}
                                        <span class="label label-danger">{ib_lan_get_line($ds['status'])}</span>
                                    {elseif $ds['status'] eq 'Paid'}
                                        <span class="label label-success">{ib_lan_get_line($ds['status'])}</span>
                                    {elseif $ds['status'] eq 'Partially Paid'}
                                        <span class="label label-info">{ib_lan_get_line($ds['status'])}</span>
                                    {else}
                                        {ib_lan_get_line($ds['status'])}
                                    {/if}
                                </td>
                                <td>
                                    {if $ds['r'] eq '0'}
                                        <span class="label label-success"><i class="fa fa-dot-circle-o"></i> {$_L['Onetime']}</span>
                                    {else}
                                        <span class="label label-success"><i class="fa fa-repeat"></i> {$_L['Recurring']}</span>
                                    {/if}
                                </td>
                                <td class="text-right">
                                    <a href="{$_url}invoices/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-file-text-o"></i></a>
                                    <a href="#" class="btn btn-danger btn-xs cdelete" id="iid{$ds['id']}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{/block}
