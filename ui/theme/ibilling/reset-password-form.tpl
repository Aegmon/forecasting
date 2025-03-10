<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{$_L['Reset Password']} - {$_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$_theme}/css/logincss.css" rel="stylesheet">
</head>

<body class="overflow-hidden light-background">
<div class="wrapper no-navigation preload">
    <div class="sign-in-wrapper">
        <div class="sign-in-inner">
            <div class="login-brand text-center">
                <img class="logo" src="{$app_url}application/storage/system/logo.png" alt="Logo">
            </div>
            {if isset($notify)}
                {$notify}
            {/if}
                <form action="{$_url}admin/reset-password-update/" method="post">
                        <input type="hidden" name="pwresetkey" value="{$pwresetkey}">
                <div class="form-group m-bottom-md">
                 <label for="cpassword">{$_L['Password']}</label>
                      <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="m-top-md p-top-sm">
                 <label for="cpassword">{$_L['Confirm Password']}</label>
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

<script src="{$_theme}/js/jquery-1.10.2.js"></script>
<script src="{$_theme}/js/bootstrap.min.js"></script>
</body>
</html>
