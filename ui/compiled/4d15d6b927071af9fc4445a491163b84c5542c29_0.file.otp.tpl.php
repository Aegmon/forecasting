<?php
/* Smarty version 3.1.39, created on 2024-11-19 14:21:45
  from '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/otp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_673c2e799014e1_18592668',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d15d6b927071af9fc4445a491163b84c5542c29' => 
    array (
      0 => '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/otp.tpl',
      1 => 1731995747,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673c2e799014e1_18592668 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>OTP Verification</title>
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
            <form class="otp-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/otp-verify">
                <div class="form-group m-bottom-md">
                    <label for="otp_code">Enter OTP Code</label>
                    <input type="text" class="form-control" id="otp_code" name="otp_code" placeholder="Enter OTP" required>
                </div>

                <div class="m-top-md p-top-sm">
                    <button class="btn btn-success block full-width" name="otp-verify" type="submit">Verify</button>
                </div>

                <div class="m-top-md p-top-sm text-center">
                    <div class="font-12">
                 <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/resend-otp/" class="font-12">Resend OTP</a>
                    </div>
                </div>
            </form>
        </div><!-- ./sign-in-inner -->
    </div><!-- ./sign-in-wrapper -->
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
