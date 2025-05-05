<?php

$do = route(1);

if ($do == '') {
    $do = 'login-display';
}
switch ($do) {
case 'post':
    $username = _post('username');
    $password = _post('password');

    $after = route(2);
    $rd = U . $config['redirect_url'] . '/';

    if ($after != '') {
        $after = str_replace('*', '/', $after);
        $rd = U . $after . '/';
    }

    if ($username != '' && $password != '') {
        $d = ORM::for_table('sys_users')->where('username', $username)->find_one();
        
        if ($d) {
            $d_pass = $d['password'];
            
            if (password_verify($password, $d_pass)) {
                if ($d['otp'] == 'Yes') {
                    // Generate OTP and save to user record
                    $otp = rand(100000, 999999);
                    $d->otp_code = $otp;
                    $d->otp_expire = time() + 300; // 5 minutes
                    $d->save();

                    $subject = "OTP Verification from " . htmlspecialchars($config['CompanyName']);
                    $message = "
                        <html>
                        <head><title>OTP Verification</title></head>
                        <body>
                            <p>Dear " . htmlspecialchars($d['fullname']) . ",</p>
                            <p>Your OTP for verification is: <strong>" . $otp . "</strong></p>
                            <p>This OTP is valid for 5 minutes.</p>
                            <p>If you did not request this, please ignore this email.</p>
                            <p>Regards,<br>" . htmlspecialchars($config['CompanyName']) . " Team</p>
                        </body>
                        </html>
                    ";

                    // Send OTP email
                    if (Notify_Email::_send($d['fullname'], $d['username'], $subject, $message)) {
                        echo '<script>alert("OTP sent to your email.");</script>';
                    } else {
                        echo '<script>alert("Error: Unable to send OTP email.");</script>';
                    }

                    // Set temporary session variable for OTP verification
                    $_SESSION['temp_uid'] = $d['id'];
                    r2(U . 'admin/otp');
                } else {
                    // No OTP needed, login directly
                    $_SESSION['uid'] = $d->id;
                    $d->last_login = date('Y-m-d H:i:s');
                    $d->autologin = (strlen($d->autologin) > 20) ? $d->autologin : Ib_Str::random_string(20) . $d->id;
                    $d->save();

                    setcookie('ib_at', $d->autologin, time() + 86400 * 180, "/");
                    _log($_L['Login Successful'] . ' ' . $username, 'Admin', $d['id']);
                    setcookie("tplsub", 'default', time() + 15552000);

                    if (!isset($config['build']) || $config['build'] < $file_build) {
                        r2(U . 'update/');
                    }

                    r2($rd);
                }
            } else {
                _msglog('e', $_L['Invalid Username or Password']);
                _log($_L['Failed Login'] . ' ' . $username, 'Admin');
                r2(U . 'login');
            }
        } else {
            _msglog('e', $_L['Invalid Username or Password']);
            r2(U . 'login/');
        }
    } else {
        _msglog('e', $_L['Invalid Username or Password']);
        r2(U . 'login/');
    }
    break;

   case 'otp':
    if (!isset($_SESSION['temp_uid'])) {
        r2(U . 'login/');
    }
    
    $ui->display('otp.tpl');
    break;

case 'otp-verify':
    if (!isset($_SESSION['temp_uid'])) {
        _msglog('e', 'Session expired, please log in again.');
        r2(U . 'login/');
    }

    $otp = _post('otp_code');
    $temp_uid = $_SESSION['temp_uid'];
    $d = ORM::for_table('sys_users')->find_one($temp_uid);

    if ($d) {
        if ($d['otp_code'] == $otp && time() < $d['otp_expire']) {
            // OTP is valid, complete login
            $_SESSION['uid'] = $d->id;
            unset($_SESSION['temp_uid']);
            $d->otp_code = null;
            $d->otp_expire = null;
            $d->last_login = date('Y-m-d H:i:s');
            $d->autologin = (strlen($d->autologin) > 20) ? $d->autologin : Ib_Str::random_string(20) . $d->id;
            $d->save();

            setcookie('ib_at', $d->autologin, time() + 86400 * 180, "/");
            _log($_L['Login Successful'] . ' ' . $d['username'], 'Admin', $d['id']);
            setcookie("tplsub", 'default', time() + 15552000);

            if (!isset($config['build']) || $config['build'] < $file_build) {
                r2(U . 'update/');
            }

            r2(U . $config['redirect_url'] . '/');
        } else {
            _msglog('e', 'Invalid OTP or Expired');
            r2(U . 'admin/otp');
        }
    } else {
        _msglog('e', 'User not found, please log in again.');
        r2(U . 'login/');
    }
    break;

case 'resend-otp':
    // Check if the user ID is set in the session
    if (!isset($_SESSION['temp_uid'])) {
        error_log('User ID is not set in the session for OTP resend.');
        _msglog('e', 'Session expired, please log in again.');
        r2(U . 'login/');
    }

    $tuid = $_SESSION['temp_uid'];

    // Retrieve user information
    $d = ORM::for_table('sys_users')->find_one($tuid);
    if ($d) {
        // Generate a new 6-digit OTP
        $otp = rand(100000, 999999);
        $d->otp_code = $otp;
        $d->otp_expire = time() + 300; // Set OTP expiration to 5 minutes
        $d->save(); // Save the updated OTP to the database

        // Prepare email to send the OTP
        $subject = "OTP Verification from " . htmlspecialchars($config['CompanyName']);
        $message = "
            <html>
            <head>
                <title>OTP Verification</title>
            </head>
            <body>
                <p>Dear " . htmlspecialchars($d['fullname']) . ",</p>
                <p>Your new OTP for verification is: <strong>" . $otp . "</strong></p>
                <p>This OTP is valid for 5 minutes.</p>
                <p>If you did not request this, please ignore this email.</p>
                <p>Regards,<br>" . htmlspecialchars($config['CompanyName']) . " Team</p>
            </body>
            </html>
        ";

        // Send OTP to the user's email
        if (Notify_Email::_send($d['fullname'], $d['username'], $subject, $message)) {
            _msglog('s', 'A new OTP has been sent to your email.');
        } else {
            _msglog('e', 'Error: Unable to send OTP email.');
        }
    } else {
        error_log('No user found with ID: ' . $tuid);
        _msglog('e', 'User not found, please log in again.');
        r2(U . 'login/');
    }

    r2(U . 'admin/otp'); // Redirect back to the OTP input page
    break;


    case 'login-display':
            if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        // Redirect to the main page or dashboard if already logged in
        error_log('User is already logged in with ID: ' . $_SESSION['uid']);
        r2(U . $config['redirect_url'] . '/');
        exit(); // Stop further execution
    }
        $ui->display('login.tpl');
        break;

    case 'forgot-pw':
              if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        // Redirect to the main page or dashboard if already logged in
        error_log('User is already logged in with ID: ' . $_SESSION['uid']);
        r2(U . $config['redirect_url'] . '/');
        exit(); // Stop further execution
    }
        $ui->display('forgot-pw.tpl');
        break;

   case 'register':
          if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        // Redirect to the main page or dashboard if already logged in
        error_log('User is already logged in with ID: ' . $_SESSION['uid']);
        r2(U . $config['redirect_url'] . '/');
        exit(); // Stop further execution
    }
        $ui->display('register.tpl');
        break;

        case 'reset-password-form':
            if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
                // Redirect to dashboard if already logged in
                error_log('User is already logged in with ID: ' . $_SESSION['uid']);
                r2(U . $config['redirect_url'] . '/');
                exit();
            }
        
            // Retrieve the pwresetkey from the URL
            $pwresetkey = _get('pwresetkey');
            error_log('Received pwresetkey: ' . $pwresetkey); // Debugging
        
            if (!$pwresetkey) {
                _msglog('e', 'Missing password reset key.');
                r2(U . 'admin/forgot-password');
                exit();
            }
        
            // Fetch user with this pwresetkey
            $user = ORM::for_table('sys_users')->where('pwresetkey', $pwresetkey)->find_one();
        
            if ($user) {
                // Log user ID for debugging
                error_log('User found with pwresetkey: ' . $user->id);
        
                // Display the reset password form
                $ui->assign('pwresetkey', $pwresetkey);
                $ui->display('reset-password-form.tpl');
            } else {
                _msglog('e', 'Invalid or expired password reset link.');
                r2(U . 'admin/forgot-password');
            }
            break;
        
    
        break;
case 'reset-password-post':
          if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        // Redirect to the main page or dashboard if already logged in
        error_log('User is already logged in with ID: ' . $_SESSION['uid']);
        r2(U . $config['redirect_url'] . '/');
        exit(); // Stop further execution
    }
    $email = _post('email');
    
    // Check if the email exists in the system
    $user = ORM::for_table('sys_users')->where('username', $email)->find_one();
    if ($user) {
        // Generate a unique pwresetkey
        $pwresetkey = bin2hex(random_bytes(16));
        $keyExpiry = time() + 3600; // Key expires in 1 hour

        // Update user record with reset key and expiry
        $user->pwresetkey = $pwresetkey;
        $user->keyexpire = $keyExpiry;
        $user->save();

        // Prepare the email content
        $resetLink =  "https://financialforcast.online/?ng=admin/reset-password-form&pwresetkey=" . $pwresetkey;
        $subject = "Password Reset Request from " . htmlspecialchars($config['CompanyName']);
        $message = "
            <html>
            <head>
                <title>Password Reset</title>
            </head>
            <body>
                <p>Dear " . htmlspecialchars($user->fullname) . ",</p>
                <p>You requested a password reset. Click the link below to reset your password:</p>
                <p><a href=\"" . $resetLink . "\">Reset Password</a></p>
                <p>This link is valid for 1 hour. If you did not request a password reset, please ignore this email.</p>
                <p>Regards,<br>" . htmlspecialchars($config['CompanyName']) . " Team</p>
            </body>
            </html>
        ";

        // Send email
        if (Notify_Email::_send($user->fullname, $user->username, $subject, $message)) {
            _msglog('s', 'A password reset link has been sent to your email.');
        } else {
            _msglog('e', 'Error: Unable to send password reset email.');
        }
    } else {
        error_log("Error: No user found with email: {$email}");
        _msglog('e', 'No account found with that email.');
    }

    r2(U . 'admin/forgot-password');
    break;
case 'reset-password-update':
    if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        // Redirect to the main page or dashboard if already logged in
        error_log('User is already logged in with ID: ' . $_SESSION['uid']);
        r2(U . $config['redirect_url'] . '/');
        exit(); // Stop further execution
    }

    $pwresetkey = _post('pwresetkey');
    $newPassword = _post('new_password');
    $confirmPassword = _post('confirm_password');

    // Check if new password meets length requirements
    if (!Validator::Length($newPassword, 15, 5)) {
        _msglog('e', $_L['password_length_error']);
        r2(U . 'admin/reset-password-form/?pwresetkey=' . $pwresetkey);
    }

    // Verify passwords match
    if ($newPassword !== $confirmPassword) {
        _msglog('e', $_L['Both Password should be same']);
        r2(U . 'admin/reset-password-form/?pwresetkey=' . $pwresetkey);
    }

    // Validate reset key and retrieve user
    $user = ORM::for_table('sys_users')
                ->where('pwresetkey', $pwresetkey)
                ->find_one();
                
    if ($user) {
        // Encrypt the new password, update, and clear reset key
        $user->password = Password::_crypt($newPassword);
        $user->pwresetkey = null;
        $user->keyexpire = null;
        $user->save();

        _msglog('s', $_L['Password changed successfully']);
        r2(U . 'login');
    } else {
        _msglog('e', $_L['Invalid or expired password reset link']);
        r2(U . 'admin/forgot-password');
    }
    break;




    case 'where':
            if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        // Redirect to the main page or dashboard if already logged in
        error_log('User is already logged in with ID: ' . $_SESSION['uid']);
        r2(U . $config['redirect_url'] . '/');
        exit(); // Stop further execution
    }
        r2(U . 'login');
        break;

    case 'after':
            if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        // Redirect to the main page or dashboard if already logged in
        error_log('User is already logged in with ID: ' . $_SESSION['uid']);
        r2(U . $config['redirect_url'] . '/');
        exit(); // Stop further execution
    }
        $after = route(2);
        $ui->assign('after', $after);
        $ui->display('login.tpl');
        break;

        case 'users-post':
            // Store form data in session to retain it on validation failure 
            $_SESSION['form_data'] = [
                'username' => _post('username'),
                'first_name' => _post('first_name'),
                'middle_name' => _post('middle_name'),
                'last_name' => _post('last_name'),
                'password' => _post('password'),
                'cpassword' => _post('cpassword')
            ];
        
            $username = $_SESSION['form_data']['username'];
            $first_name = $_SESSION['form_data']['first_name'];
            $middle_name = $_SESSION['form_data']['middle_name'];
            $last_name = $_SESSION['form_data']['last_name'];
            $password = $_SESSION['form_data']['password'];
            $cpassword = $_SESSION['form_data']['cpassword'];
            $user_type = _post('user_type');
        
            $fullname = trim("{$first_name} {$middle_name} {$last_name}");
            // Attempt to find the role
            $r = Model::factory('Models_Role')->find_one($user_type);
            if ($r) {
                $role = $r->rname;
                $roleid = $user_type;
                $user_type = $r->rname;
            } else {
                error_log("Error: User role with ID {$user_type} not found, defaulting to Admin.");
                $role = '';
                $roleid = 0;
                $user_type = 'Admin';
            }
        
            $msg = '';
        
            // Validate email
            if (Validator::Email($username) == false) {
                $msg .= $_L['notice_email_as_username'] . '<br>';
                error_log("Error: Invalid email format for username: {$username}");
                _msglog('e', 'Invalid email format');
                r2(U . 'admin/register');
            }
        
            // Validate full name length
            if (Validator::Length($fullname, 26, 2) == false) {
                $msg .= 'Full Name should be between 3 to 25 characters' . '<br>';
                _msglog('e', 'Full Name should be between 3 to 25 characters');
                r2(U . 'admin/register');
            }
        
            // Validate password length
            if (!Validator::Length($password, 15, 5)) {
                $msg .= 'Password should be between 6 to 15 characters' . '<br>';
                error_log("Error: Password length invalid for username: {$username}");
                _msglog('e', 'Password should be between 6 to 15 characters');
                r2(U . 'admin/register');
            }
        
            // Check if passwords match
            if ($password != $cpassword) {
                $msg .= 'Passwords do not match' . '<br>';
                _msglog('e', 'Passwords do not match');
                r2(U . 'admin/register');
            }
        
            // Check for existing account
            $d = ORM::for_table('sys_users')->where('username', $username)->find_one();
            if ($d) {
                $msg .= $_L['account_already_exist'] . '<br>';
                error_log("Error: Account already exists with username: {$username}");
                _msglog('e', 'Account Already Exist');
                r2(U . 'admin/register');
            }
        
            // Create account if no errors
            if ($msg == '') {
                $password = Password::_crypt($password);
        
                // Add account to database
                try {
                    $d = ORM::for_table('sys_users')->create();
                    $d->username = $username;
                    $d->password = $password;
                    $d->fullname = $fullname;
                    $d->user_type = $user_type;
                    $d->phonenumber = '';
                    $d->last_login = date('Y-m-d H:i:s');
                    $d->email = '';
                    $d->creationdate = date('Y-m-d H:i:s');
                    $d->pin = '';
                    $d->img = '';
                    $d->otp = 'Yes';
                    $d->pin_enabled = 'No';
                    $d->api = 'No';
                    $d->pwresetkey = '';
                    $d->keyexpire = '';
                    $d->status = 'Active';
                    $d->role = $role;
                    $d->roleid = $roleid;
        
                    // Save user and get the last inserted ID
                    $d->save();
                    $lastinsertedid = $d->id();  // Get the last inserted ID
        
                    // Now set the system_id to be the same as the last inserted ID
                    $d->system_id = $lastinsertedid;
                    $d->save();  // Save again with the system_id set
        
                    _msglog('s', 'Account Created Successfully');
                    
                    // Clear session data after successful registration
                    unset($_SESSION['form_data']);
                    r2(U . 'login/');
                } catch (Exception $e) {
                    error_log("Error: Failed to create account for username: {$username}. Exception: " . $e->getMessage());
                    _msglog('e', 'Account Creation Failed');
                    r2(U . 'admin/register');
                }
            } else {
                // Log message if validation failed
                error_log("Error: Account creation validation failed for username: {$username}. Errors: {$msg}");
                _msglog('e', 'Account Creation Failed');
                r2(U . 'admin/register');
            }
        
            break;
        

default:
    $ui->display('login.tpl');
    break;
}
