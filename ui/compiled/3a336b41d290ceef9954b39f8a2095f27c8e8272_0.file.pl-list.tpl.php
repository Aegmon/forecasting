<?php
/* Smarty version 3.1.39, created on 2024-08-28 03:40:47
  from 'C:\xampp1\htdocs\ibilling\ui\theme\ibilling\pl-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_66ced47f2fb263_70772421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a336b41d290ceef9954b39f8a2095f27c8e8272' => 
    array (
      0 => 'C:\\xampp1\\htdocs\\ibilling\\ui\\theme\\ibilling\\pl-list.tpl',
      1 => 1724828994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66ced47f2fb263_70772421 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_63092884666ced47f2f73e0_06074505', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_63092884666ced47f2f73e0_06074505 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_63092884666ced47f2f73e0_06074505',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default" id="uploading_inside">
                <div class="panel-body">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/plugin_upload/" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['plugin_drop_help'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['plugin_upload_help'];?>
</span>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 15px;">
            <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/get_plugin/">
                <div class="form-group">
                    <label for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Or Install from URL'];?>
: </label>
                    <input type="text" class="form-control" id="pl_url" name="pl_url" placeholder="Enter Plugin URL...">
                </div>




                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Install</button>
            </form>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plugins'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <div class="project-list mt-md">
                        <div id="progressbar">
                        </div>

                        <div id="application_ajaxrender"><table class="table table-hover">
                                <tbody>
                                <?php echo $_smarty_tpl->tpl_vars['pl_html']->value;?>

                                </tbody>
                            </table></div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" id="_msg_unzipping" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Unzipping'];?>
 ...">
    <input type="hidden" id="_msg_are_you_sure" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">
<?php
}
}
/* {/block "content"} */
}
