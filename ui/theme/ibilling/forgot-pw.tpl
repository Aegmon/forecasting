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
            <form class="login" method="post" action="{$_url}admin/reset-password-post/">
                <div class="form-group m-bottom-md">
                    <input type="email" class="form-control" id="email" name="email" placeholder="{$_L['Email Address']}" required>
                </div>
                <div class="m-top-md p-top-sm">
                    <button class="btn btn-success block full-width" type="submit">{$_L['Reset Password']}</button>
                </div>
                <div class="m-top-md p-top-sm">
                    <div class="font-12 text-center m-bottom-xs">
                        <a href="{$_url}admin/" class="font-12">{$_L['Back To Login']}</a>
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
