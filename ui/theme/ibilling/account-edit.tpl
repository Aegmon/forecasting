{extends file="$tpl_admin_layout"}

{block name="content"}

    <div class="row">
        <div class="widget-1 col-md-6 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{$_L['Edit_Account']}</h3>
                </div>
                <div class="panel-body">
                    <form role="form" name="accadd" method="post" action="{$_url}accounts/edit-post">
                        <div class="form-group">
                            <label for="account">{$_L['Account_Title']}</label>
                            <input type="text" class="form-control" id="account" name="account" value="{$d->account}">
                        </div>
                        <div class="form-group">
                            <label for="description">{$_L['Description']}</label>
                            <input type="text" class="form-control" id="description" name="description" value="{$d->description}">
                        </div>


                        <div class="form-group">
                            <label for="account_number">{$_L['Account Number']}</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" value="{$d->account_number}">
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
