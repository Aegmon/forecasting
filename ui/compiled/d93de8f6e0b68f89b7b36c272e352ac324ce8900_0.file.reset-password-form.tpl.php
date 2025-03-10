<?php
/* Smarty version 3.1.39, created on 2025-03-10 10:36:00
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\reset-password-form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67ce50103401f3_56531140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd93de8f6e0b68f89b7b36c272e352ac324ce8900' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\reset-password-form.tpl',
      1 => 1741574144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ce50103401f3_56531140 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reset Password'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/logincss.css" rel="stylesheet">
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
                <form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/reset-password-update/" method="post">
                        <input type="hidden" name="pwresetkey" value="<?php echo $_smarty_tpl->tpl_vars['pwresetkey']->value;?>
">
                <div class="form-group m-bottom-md">
                 <label for="cpassword"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
                      <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="m-top-md p-top-sm">
                 <label for="cpassword"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm Password'];?>
</label>
                   <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="m-top-md p-top-sm">
                    <div class="font-12 text-center m-bottom-xs">
                           <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
