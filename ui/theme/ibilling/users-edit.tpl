{extends file="$tpl_admin_layout"}

{block name="content"}
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Edit User']}</h5>
                </div>
                <div class="ibox-content" id="application_ajaxrender">
                    <form role="form" name="accadd" method="post" action="{$_url}settings/users-edit-post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">{$_L['Email']}</label>
                            <input type="text" class="form-control" id="username" name="username" value="{$d['username']}">
                        </div>
                        <div class="form-group">
                            <label for="fullname">{$_L['Full Name']}</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{$d['fullname']}">
                        </div>

                        <!-- Cropping Image Section -->
                        <div class="form-group">
                            <div id="croppic"></div>

                
                            <button type="button" id="opt_gravatar" class="btn btn-info">{$_L['Use Gravatar']}</button>
                            <button type="button" id="no_image" class="btn btn-default">{$_L['No Image']}</button>
                        </div>

                        <div class="form-group">
                            <label for="picture">{$_L['Picture']}</label>
                            <input type="file" class="form-control" id="picture" name="picture">
                        </div>

                        {if ($user['id']) neq ($d['id'])}
                            <div class="form-group">
                                <label>{$_L['User']} {$_L['Type']}</label>
                                <div class="i-checks">
                                    <label>
                                        <input type="radio" value="Admin" name="user_type" {if $d->user_type eq 'Admin'}checked{/if}>
                                        <i></i> {$_L['Full Administrator']}
                                    </label>
                                </div>

                                {foreach $roles as $role}
                                    <div class="i-checks">
                                        <label>
                                            <input type="radio" value="{$role['id']}" name="user_type" {if $d->roleid eq $role['id']}checked{/if}>
                                            <i></i> {$role['rname']}
                                        </label>
                                    </div>
                                {/foreach}

                            </div>
                        {/if}

                        <input type="hidden" name="id" value="{$d['id']}">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                        {$_L['Or']} <a href="{$_url}settings/users">{$_L['Cancel']}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
{/block}
