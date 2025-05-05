<?php
// Database connection settings
$host = 'localhost';      // Database host
$dbname = 'u286208807_forecasting';     // Database name
$username = 'u286208807_forecasting';       // Database username
$password = 'Forecasting@2024';           // Database password

// Initialize variables to retain form data after submission failure
$usernameInput = $firstnameInput = $middlenameInput = $lastnameInput = $emailInput = "";

// Establishing PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize input
    $username = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $middlename = htmlspecialchars(trim($_POST['middlename']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $user_type = 'Admin';
    $role = '';
    $roleid = '0';

    // Retain the input values for the form
    $usernameInput = $username;
    $firstnameInput = $firstname;
    $middlenameInput = $middlename;
    $lastnameInput = $lastname;
    $emailInput = $email;

    // Check if any required fields are empty
    if (empty($username) || empty($password) || empty($confirm_password) || empty($firstname) || empty($lastname) || empty($email)) {
        echo "<script>alert('All fields are required!');</script>";
    } else {
        // Check if password and confirm password match
        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!');</script>";
        } else {
            // Validate email (only Gmail accounts allowed)
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@gmail\.com$/', $email)) {
                echo "<script>alert('Please enter a valid Gmail address.');</script>";
            } else {
                // Check if the email already exists in the database
                $email_check_query = "SELECT COUNT(*) FROM sys_users WHERE username = :email";
                $stmt = $pdo->prepare($email_check_query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $email_count = $stmt->fetchColumn();

                if ($email_count > 0) {
                    echo "<script>alert('This email is already registered. Please use a different email.');</script>";
                } else {
                    // Combine first, middle, and last names into the fullname
                    $fullname = trim($firstname . ' ' . $middlename . ' ' . $lastname);

                    // Fullname length validation: between 3 and 25 characters
                    if (strlen($fullname) < 3 || strlen($fullname) > 25) {
                        echo "<script>alert('Fullname must be between 3 and 25 characters.');</script>";
                    } else {
                        // Password length validation: between 6 and 15 characters
                        if (strlen($password) < 6 || strlen($password) > 15) {
                            echo "<script>alert('Password must be between 6 and 15 characters.');</script>";
                        } else {
                            // Hash password for security
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                            // Current date and time
                            $current_datetime = date('Y-m-d H:i:s');

                            // Prepare the SQL to insert into the sys_users table
                            $query = "INSERT INTO sys_users (username, password, fullname, user_type, phonenumber, last_login, email, creationdate, pin, img, otp, pin_enabled, api, pwresetkey, keyexpire, status, role, roleid)
                                      VALUES (:username, :password, :fullname, :user_type, '', :last_login, :email, :creationdate, '', '', 'Yes', 'No', 'No', '', '', 'Active', :role, :roleid)";
                            
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(':username', $username);
                            $stmt->bindParam(':password', $hashed_password);
                            $stmt->bindParam(':fullname', $fullname);
                            $stmt->bindParam(':user_type', $user_type);
                            $stmt->bindParam(':last_login', $current_datetime);
                            $stmt->bindParam(':creationdate', $current_datetime);
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':role', $role);
                            $stmt->bindParam(':roleid', $roleid);

                            // Execute the query
                            if ($stmt->execute()) {
                                // Get the last inserted ID
                                $lastinsertedid = $pdo->lastInsertId();

                                // Update the system_id field with the last inserted ID
                                $update_query = "UPDATE sys_users SET system_id = :system_id WHERE id = :id";
                                $update_stmt = $pdo->prepare($update_query);
                                $update_stmt->bindParam(':system_id', $lastinsertedid);
                                $update_stmt->bindParam(':id', $lastinsertedid);
                                $update_stmt->execute();

                                echo "<script>
                                alert('Account Created Successfully!');
                                setTimeout(function() {
                                    window.location.href = 'index.php';
                                }, 2000); // 2000 ms (2 seconds) delay
                                </script>";
                                exit; // Stop further script execution
                            } else {
                                echo "<script>alert('An error occurred during registration. Please try again.');</script>";
                            }
                        }
                    }
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-size: 16px;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .form-group input[type="submit"] {
            background-color: #1877F2;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0000FF;
        }
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .form-group .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <center><img src="application/storage/system/logo.png" alt="Logo"></center>
    <h2>User Registration</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($emailInput); ?>" required>
            <span class="error"></span>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <span class="error"></span>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <span class="error"></span>
        </div>
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstnameInput); ?>" required>
            <span class="error"></span>
        </div>
        <div class="form-group">
            <label for="middlename">Middle Name:</label>
            <input type="text" id="middlename" name="middlename" value="<?php echo htmlspecialchars($middlenameInput); ?>">
            <span class="error"></span>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastnameInput); ?>" required>
            <span class="error"></span>
        </div>
   
        <div class="form-group">
            <input type="submit" value="Register">
        </div>
        <div class="form-group">
            <a href="index.php" style="display: block; text-align: center; text-decoration: none; padding: 10px; background-color: #ccc; border-radius: 4px; color: black; font-size: 16px; cursor: pointer;">
                Back to Login
            </a>
        </div>
    </form>
</div>

</body>
</html>
