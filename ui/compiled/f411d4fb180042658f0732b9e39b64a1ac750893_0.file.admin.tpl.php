<?php
/* Smarty version 3.1.39, created on 2024-11-19 13:56:16
  from '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/layouts/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_673c2880ed2244_24291844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f411d4fb180042658f0732b9e39b64a1ac750893' => 
    array (
      0 => '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/layouts/admin.tpl',
      1 => 1731995761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673c2880ed2244_24291844 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>


<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/favicon.ico">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/css/ibilling.css?v=3" rel="stylesheet">

    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/<?php echo $_smarty_tpl->tpl_vars['_c']->value['nstyle'];?>
.css" rel="stylesheet">

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plugin_ui_header_admin']->value, 'plugin_ui_header_add');
$_smarty_tpl->tpl_vars['plugin_ui_header_add']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plugin_ui_header_add']->value) {
$_smarty_tpl->tpl_vars['plugin_ui_header_add']->do_else = false;
?>
        <?php echo $_smarty_tpl->tpl_vars['plugin_ui_header_add']->value;?>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if ($_smarty_tpl->tpl_vars['_c']->value['rtl'] == '1') {?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style-rtl.min.css" rel="stylesheet">
    <?php }?>

    <?php if ((isset($_smarty_tpl->tpl_vars['xheader']->value))) {?>
        <?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

    <?php }?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plugin_ui_header_admin_css']->value, 'plugin_ui_header_add_css');
$_smarty_tpl->tpl_vars['plugin_ui_header_add_css']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plugin_ui_header_add_css']->value) {
$_smarty_tpl->tpl_vars['plugin_ui_header_add_css']->do_else = false;
?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['plugin_ui_header_add_css']->value;?>
" rel="stylesheet">
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</head>

<body class="fixed-nav <?php if ($_smarty_tpl->tpl_vars['_c']->value['mininav']) {?>mini-navbar<?php }?>">
<section>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">

                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tplnav']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

                    <img class="logo" style="max-height: 40px; width: auto;" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/system/logo.png" alt="Logo">

                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary btn-flat" href="#"><i class="fa fa-dedent"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right pull-right">



                   






                        <li class="dropdown navbar-user">

                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

                                <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == 'gravatar') {?>
                                    <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['username']));?>
?s=200" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                <?php }?>

                                <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Welcome'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeIn">
                                <li class="arrow"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change Password'];?>
</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</a></li>

                            </ul>
                        </li>

                        <li>
                            <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>




                    </ul>

                </nav>
            </div>

            <div class="row wrapper white-bg page-heading">
                <div class="col-lg-12">
                    <h2 style="color: #2F4050; font-size: 16px; font-weight: 400; margin-top: 18px"> <?php echo $_smarty_tpl->tpl_vars['_st']->value;?>
 </h2>

                </div>

            </div>

            <div class="wrapper wrapper-content <?php echo $_smarty_tpl->tpl_vars['_c']->value['contentAnimation'];?>
">
                <?php if ((isset($_smarty_tpl->tpl_vars['notify']->value))) {?>
                <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

<?php }?>

                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_57973760673c2880ecd6c0_72049291', "content");
?>


                <div id="ajax-modal" class="modal container fade-scale" tabindex="-1" style="display: none;"></div>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['tpl_footer']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_footer']) {?>

                <?php } else { ?>
                    <div class="footer">
                        <div>
                            <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Copyright'];?>
</strong> &copy; <?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>

                        </div>
                    </div>
                <?php }?>
            <?php }?>

        </div>

        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Notes'];?>

                        </a></li>

                    <li class=""><a data-toggle="tab" href="#tab-3">
                            <i class="fa fa-gear"></i>
                        </a></li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-file-text-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Quick Notes'];?>
</h3>

                        </div>

                        <div style="padding: 10px">

                            <form class="form-horizontal push-10-t push-10" method="post" onsubmit="return false;">

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <textarea class="form-control" id="ib_admin_notes" name="ib_admin_notes" rows="10"><?php echo $_smarty_tpl->tpl_vars['user']->value->notes;?>
</textarea>
                                            <label for="ib_admin_notes"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Whats on your mind'];?>
</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-success" type="submit" id="ib_admin_notes_save"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                                    </div>
                                </div>
                            </form>
                        </div>




                    </div>


                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
</h3>

                        </div>

                        <div class="setings-item">
                            <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Theme_Color'];?>
</h4>

                            <ul id="ib_theme_color" class="ib_theme_color">

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/set_color/light/"><span class="light"></span></a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/set_color/blue/"><span class="blue"></span></a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/set_color/dark/"><span class="dark"></span></a></li>
                            </ul>


                        </div>
                        <div class="setings-item">
                    <span>
                        <?php echo $_smarty_tpl->tpl_vars['_L']->value['Fold Sidebar Default'];?>

                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="r_fold_sidebar" <?php if (get_option('mininav') == '1') {?>checked<?php }?> class="onoffswitch-checkbox" id="r_fold_sidebar">
                                    <label class="onoffswitch-label" for="r_fold_sidebar">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>



        </div>

    </div>
</section>
<!-- BEGIN PRELOADER -->
<?php if (($_smarty_tpl->tpl_vars['_c']->value['animate']) == '1') {?>
    <div class="loader-overlay">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
<?php }?>
<input type="hidden" id="_url" name="_url" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
">
<input type="hidden" id="_df" name="_df" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['df'];?>
">
<input type="hidden" id="_lan" name="_lan" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['language'];?>
">
<!-- END PRELOADER -->
<!-- Mainly scripts -->


<?php echo '<script'; ?>
>
    var _L = [];


    var app_url = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
';
    var base_url = '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
';

    <?php if (($_smarty_tpl->tpl_vars['_c']->value['animate']) == '1') {?>
    var config_animate = 'Yes';
    <?php } else { ?>
    var config_animate = 'No';
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['jsvar']->value;?>

<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/ibilling.js"><?php echo '</script'; ?>
>



<?php if ((isset($_smarty_tpl->tpl_vars['xfooter']->value))) {?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1849412714673c2880ed1630_24914366', 'script');
?>


<?php echo '<script'; ?>
>
    $(function () {
        "use strict";
        matForms();
        <?php if ((isset($_smarty_tpl->tpl_vars['xjq']->value))) {?>
        <?php echo $_smarty_tpl->tpl_vars['xjq']->value;?>

        <?php }?>
    });

<?php echo '</script'; ?>
>
</body>

</html>
<?php }
/* {block "content"} */
class Block_57973760673c2880ecd6c0_72049291 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_57973760673c2880ecd6c0_72049291',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_1849412714673c2880ed1630_24914366 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1849412714673c2880ed1630_24914366',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
