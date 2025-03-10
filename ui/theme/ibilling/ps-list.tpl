{extends file="$tpl_admin_layout"}

{block name="content"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Product List</h5>
                <div class="ibox-tools">
                    <a href="{$_url}ps/p-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Product</a>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#transactionHistoryModal">
                        <i class="fa fa-history"></i> View Transaction History
                    </button>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stocks</th>
                            <th>Image</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody id="product_list">
                         {foreach from=$d item=product}
                            <tr>
                                <td>{$product.name}</td>
                                <td>{$product.sales_price}</td>
                                <td>{$product.inventory}</td>
                                 <td>
                                    <!-- Add product image here -->
                                    <img src="/forecasting/img/{$product.image}" alt="{$product.name}" width="50" height="50" />
                                </td>
                                <td>
                                    <a href="{$_url}ps/edit/{$product.id}" class="btn btn-xs btn-warning cedit" id="edit_{$product.id}">Edit</a>
                                    <a href="{$_url}ps/delete/{$product.id}" class="btn btn-xs btn-danger cdelete" id="delete_{$product.id}">Inactive</a>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Transaction History Modal -->
<div class="modal fade" id="transactionHistoryModal" tabindex="-1" role="dialog" aria-labelledby="transactionHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 100%; width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionHistoryModalLabel">Transaction History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>System ID</th>
                            <th>Action</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody id="transaction_logs">
                        {foreach from=$d item=transaction_logs}
                            <tr>
                                <td>{$transaction_logs.id}</td>
                                <td>{$transaction_logs.system_id}</td>
                                <td>{$transaction_logs.action}</td>
                                <td>{$transaction_logs.type}</td>
                                <td>{$transaction_logs.description}</td>
                                <td>{$transaction_logs.created_at}</td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<input type="hidden" id="_lan_are_you_sure" value="{$_L['are_you_sure']}">

{/block}
