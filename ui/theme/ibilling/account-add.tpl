{extends file="$tpl_admin_layout"}

{block name="content"}

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Add_New_Account']}</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="{$_url}accounts/add-post">
                        <div class="form-group">
                            <label for="account">{$_L['Account Title']}*</label>
                            <input type="text" class="form-control" id="account" name="account">

                        </div>
                        <div class="form-group">
                            <label for="description">{$_L['Description']}</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                     
              <input type="hidden" class="form-control" id="balance"  name="balance" value="0">

                   

                                   <input type="hidden" class="form-control" id="account_number" name="account_number" value="Accounts">
                            <input type="hidden" class="form-control" id="contact_person" name="contact_person">
                

                   
                            <input type="hidden" class="form-control" id="contact_phone" name="contact_phone">
                 

             
                            <input type="hidden" class="form-control" id="ib_url" name="ib_url">
                  



                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>

                </div>
            </div>



        </div>



    </div>

{/block}

