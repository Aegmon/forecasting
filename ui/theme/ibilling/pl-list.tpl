{extends file="$tpl_admin_layout"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Product List</h5>
                    <div class="ibox-tools">
                        <a href="{$_url}ps/p-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Product</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product_list">
                            {foreach from=$d item=product}
                                <tr>
                                    <td>{$product.name}</td>
                                    <td>{$product.sales_price}</td>
                                  <td>
                                    <a href="#" class="btn btn-xs btn-warning cedit" id="edit_{$product.id}">Edit</a>
                                    <a href="#"class="btn btn-xs btn-danger cdelete" id="delete_{$product.id}">Delete</a>
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit -->
    <div class="modal fade" id="ajax-modal" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajaxModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>

 
{/block}
