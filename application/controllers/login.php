<?php
$do = route(1);

if ($do == '') {
    $do = 'login-display';
}
switch ($do) {
    case 'post':
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $username = addslashes($username);
        $password = _post('password');
        $password = addslashes($password);

        $after = route(2);
        $rd = U . $config['redirect_url'] . '/';

        if ($after != '') {
            $after = str_replace('*', '/', $after);
            $rd = U . $after . '/';
        }

        if ($username != '' and $password != '') {
            $d = ORM::for_table('sys_users')
                ->where('username', $username)
                ->find_one();
            if ($d) {
                $d_pass = $d['password'];
                if (Password::_verify($password, $d_pass) == true) {
                    if ($d['otp'] == 'Yes') {
                        // Set the user ID in the session for OTP verification
                        $_SESSION['uid'] = $d->id;

                        // Redirect to OTP page
                        r2(U . 'otp/'); // Change to your OTP route
                    } else {
                        $_SESSION['uid'] = $d->id;
                        $d->last_login = date('Y-m-d H:i:s');
                        if (strlen($d->autologin) > 20) {
                            $str = $d->autologin;
                        } else {
                            $str = Ib_Str::random_string(20) . $d->id;
                        }

                        $d->autologin = $str;
                        $d->save();

                        setcookie('ib_at', $str, time() + 86400 * 180, "/"); // 86400 = 1 day

                        _log(
                            $_L['Login Successful'] . ' ' . $username,
                            'Admin',
                            $d['id']
                        );

                        setcookie("tplsub", 'default', time() + 15552000);

                        if (
                            !isset($config['build']) or
                            $config['build'] < $file_build
                        ) {
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

    case 'login-display':
        Event::trigger('admin/login/');
        Admin::isLogged();
        $ui->display('login.tpl');
        break;

    case 'otp':
        // Check if the user is logged in and has an OTP session set
        if (!isset($_SESSION['uid'])) {
            r2(U . 'login/'); // Redirect to login if no session
        }
        $ui->display('otp.tpl'); // Display OTP input template
        break;

    case 'forgot-pw':
        $ui->display('forgot-pw.tpl');
        break;

    case 'forgot-pw-post':
        $username = _post('username');
        $d = ORM::for_table('sys_users')
            ->where('username', $username)
            ->find_one();
        if ($d) {
            $xkey = _raid('10');
            $d->pwresetkey = $xkey;
            $d->keyexpire = time() + 3600;

            $d->save();

            $e = ORM::for_table('sys_email_templates')
                ->where('tplname', 'Admin:Password Change Request')
                ->find_one();

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set(
                'password_reset_link',
                U . 'login/pwreset-validate/' . $d['id'] . '/token_' . $xkey
            );
            $message->set('username', $d['username']);
            $message->set('ip_address', $_SERVER["REMOTE_ADDR"]);
            $message_o = $message->output();
            Notify_Email::_send(
                $d['fullname'],
                $d['username'],
                $subj,
                $message_o
            );

            _msglog('s', $_L['Check your email to reset Password']);
            r2(U . 'login/');
        } else {
            _msglog('e', $_L['User Not Found'] . '!');
            r2(U . 'login/forgot-pw/');
        }

        break;

    case 'pwreset-validate':
        $v_uid = $routes['2'];
        $v_token = $routes['3'];
        $v_token = str_replace('token_', '', $v_token);

        $d = ORM::for_table('sys_users')->find_one($v_uid);

        if ($d) {
            $d_token = $d['pwresetkey'];
            if ($v_token != $d_token) {
                r2(U . 'login/', 'e', $_L['Invalid Password Reset Key'] . '!');
            }
            $keyexpire = $d['keyexpire'];
            $ctime = time();
            if ($ctime > $keyexpire) {
                r2(U . 'login/', 'e', $_L['Password Reset Key Expired']);
            }
            $password = _raid('6');
            $npassword = Password::_crypt($password);

            $d->password = $npassword;
            $d->pwresetkey = '';
            $d->keyexpire = '0';
            $d->save();

            $e = ORM::for_table('sys_email_templates')
                ->where('tplname', 'Admin:New Password')
                ->find_one();

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('login_url', U . 'login/');
            $message->set('username', $d['username']);
            $message->set('password', $password);
            $message_o = $message->output();
            Notify_Email::_send(
                $d['fullname'],
                $d['username'],
                $subj,
                $message_o
            );

            _msglog('s', $_L['Check your email to reset Password'] . '.');
            r2(U . 'login/');
        }

        break;

    case 'where':
        r2(U . 'login');
        break;

    case 'after':
        Admin::isLogged();
        $after = route(2);
        $ui->assign('after', $after);
        $ui->display('login.tpl');
        break;

    default:
        Admin::isLogged();
        $ui->display('login.tpl');
        break;
}
