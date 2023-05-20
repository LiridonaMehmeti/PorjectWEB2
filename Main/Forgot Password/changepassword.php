<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Change Password Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='forgotpass.css'>
</head>

<body>
    <div class="login-box">
        <h2>Change password</h2>
        <form method="post">

            <div class="user-box">
                <input type="password" name="newPass" required="">
                <label for="newPass">New Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="confirmPass" required="">
                <label for="confirmPass">Confirm New Password</label>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php
    $host = "localhost";
    $username = "root";
    $password = "lirak";
    $database = "login_db";

    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_errno) {
        die("Connection error: " . $connection->connect_error);
    }

    if (isset($_GET['email'])) {
        $email = $_GET['email'];

        if (isset($_POST['submit'])) {
            // Retrieve the form inputs
            $newPass = $_POST['newPass'];
            $confirmPass = $_POST['confirmPass'];

            // Validate the inputs
            if ($newPass !== $confirmPass) {
                echo "New password and confirm password do not match.";
            } else {
                // Retrieve the user's password hash from the database
                $query = "SELECT password_hash FROM users WHERE email = '$email'";
                $result = $connection->query($query);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $passwordHash = $row['password_hash'];

                    // Hash the new password for security
                    $hashedPassword = password_hash($newPass, PASSWORD_DEFAULT);

                    // Update the password in the database
                    $query = "UPDATE users SET password_hash = '$hashedPassword' WHERE email = '$email'";
                    if ($connection->query($query)) {
                        echo "Password changed successfully!";
                    } else {
                        echo "Error updating password: " . $connection->error;
                    }
                } else {
                    echo "User not found.";
                }
            }
        }
    } else {
        echo "Email parameter is missing in the URL.";
    }

    ?>




</body>

</html>