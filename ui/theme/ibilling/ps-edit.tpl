{extends file="$tpl_admin_layout"}

{block name="content"}

    <div class="row">
        <div class="widget-1 col-md-6 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{$_L['Edit']}</h3>
                </div>
                <div class="panel-body">
                    <form role="form" name="accadd" method="post" action="{$_url}ps/edit-post">
                        <div class="form-group">
                            <label for="name">{$_L['Name']}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{$d->name}">
                        </div>
                     
                            <div class="form-group">
                            <label for="price">{$_L['Price']}</label>
                            <input type="text" class="form-control" id="price" name="price" value="{$d->sales_price}">
                                     <input type="hidden" name="id" value="' . $d['id'] . '">
                        </div>

                        
                            <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" value="{$d->inventory}">
                                     <input type="hidden" name="id" value="' . $d['id'] . '">
                        </div>
            
            

                        <div class="form-group">
                         <label for="description">{$_L['Description']}</label>
                         <textarea id="description" name="description" class="form-control" rows="3">{$d->description}</textarea>

                        </div>

                  
                   



                        <input type="hidden" name="id" value="{$d['id']}">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>
                </div>
            </div>
        </div> <!-- Widget-1 end-->

        <!-- Widget-2 end-->
    </div>


{/block}
