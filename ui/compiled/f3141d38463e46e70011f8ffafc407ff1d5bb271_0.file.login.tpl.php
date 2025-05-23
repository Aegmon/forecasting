<?php
/* Smarty version 3.1.39, created on 2025-05-20 20:34:32
  from 'E:\Xampp\htdocs\forecasting\ui\theme\ibilling\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_682c76d8382774_97938323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3141d38463e46e70011f8ffafc407ff1d5bb271' => 
    array (
      0 => 'E:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\login.tpl',
      1 => 1746271913,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682c76d8382774_97938323 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['_L']->value['Login'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/fa/css/font-awesome.min.css" rel="stylesheet">

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

    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/logincss.css" rel="stylesheet">

    <?php if ($_smarty_tpl->tpl_vars['_c']->value['rtl'] == '1') {?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style-rtl.min.css" rel="stylesheet">
    <?php }?>
</head>

<body class="overflow-hidden light-background">
<div class="wrapper no-navigation preload">
    <div class="sign-in-wrapper">
        <div class="sign-in-inner">
            <div class="login-brand text-center">
                <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/system/logo.png" alt="Logo">
            </div>
            <?php if ((isset($_smarty_tpl->tpl_vars['notify']->value))) {?>
                <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

            <?php }?>
            <form class="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/post/<?php if ((isset($_smarty_tpl->tpl_vars['after']->value))) {
echo $_smarty_tpl->tpl_vars['after']->value;?>
/<?php }?>">
                <div class="form-group m-bottom-md">
                   <input type="text" class="form-control" id="username" name="username" 
       value="<?php if ((isset($_smarty_tpl->tpl_vars['username']->value))) {
echo $_smarty_tpl->tpl_vars['username']->value;
}?>" 
       placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Address'];?>
" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
" required>
                </div>

                <?php if ((isset($_smarty_tpl->tpl_vars['otp_required']->value)) && $_smarty_tpl->tpl_vars['otp_required']->value === true) {?>
                <div class="form-group">
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Enter OTP'];?>
" required>
                </div>
                <div class="m-top-md p-top-sm">
                    <button class="btn btn-primary block full-width" name="verify_otp" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Verify OTP'];?>
</button>
                </div>
                <?php }?>

                <div class="m-top-md p-top-sm">
                    <button class="btn btn-success block full-width" name="login" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sign in'];?>
</button>
                </div>

                <div class="m-top-md p-top-sm">
                    <div class="font-12 text-center m-bottom-xs">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/forgot-pw/" class="font-12"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Forgot password'];?>
</a>
                    </div>
                </div>
                 <div class="m-top-md p-top-sm">
                    <div class="font-12 text-center m-bottom-xs">
                    Don't have an Account? Signup  <strong><a href="/register.php" class="font-12">Here</a> </strong>
                   
                    </div>
                </div>
            </form>
        </div><!-- ./sign-in-inner -->
    </div><!-- ./sign-in-wrapper  -->
</div><!-- /wrapper -->

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
