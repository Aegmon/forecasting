<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{$_L['Login']} - {$_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/fa/css/font-awesome.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{$app_url}application/storage/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$app_url}application/storage/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$app_url}application/storage/icon/favicon-16x16.png">
    <link rel="manifest" href="{$app_url}application/storage/icon/site.webmanifest">
    <link rel="mask-icon" href="{$app_url}application/storage/icon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="{$app_url}application/storage/icon/favicon.ico">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="{$app_url}application/storage/icon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link href="{$_theme}/css/logincss.css" rel="stylesheet">

    {if $_c['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
    {/if}
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
             <form role="form" name="accadd" method="post" action="{$_url}admin/users-post">
                   <!-- Full Name fields in a single row -->
                        <div class="form-group">
                            <label>{$_L['Full Name']}</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">{$_L['Email Address']}</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>

                    

                        <input type="hidden" class="form-control" value="Admin" name="user_type">

                        <div class="form-group">
                            <label for="password">{$_L['Password']}</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="cpassword">{$_L['Confirm Password']}</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword">
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
               
                    </form>
        </div><!-- ./sign-in-inner -->
    </div><!-- ./sign-in-wrapper -->
</div><!-- /wrapper -->

<script src="{$_theme}/js/jquery-3.6.0.min.js"></script>
<script src="{$_theme}/js/bootstrap.min.js"></script>

</body>
</html>
