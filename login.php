<?php
// Initialize the session
session_start();

if (isset($_SESSION['username'])) {
    header("location: ideas.php");
    exit;
}

require_once "database/_dbconnect.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;


        // Try to execute this statement
        // if (mysqli_stmt_execute($stmt)) {
        //     mysqli_stmt_store_result($stmt);
        //     if (mysqli_stmt_num_rows($stmt) == 1) {
        //         mysqli_stmt_bind_result($stmt, $id, $username, $password);
        //         if (mysqli_stmt_fetch($stmt)) {
        //             if (password_verify($password, $hashed_password)) {
        //                 // this means the password is corrct. Allow user to login
        //                 session_start();
        //                 $_SESSION["username"] = $username;
        //                 $_SESSION["id"] = $id;
        //                 $_SESSION["loggedin"] = true;

        //                 //Redirect user to ideas page
        //                 header("location: ideas.php");
        //             }
        //         }
        //     }
        // }


        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $password);
                if (mysqli_stmt_fetch($stmt)) {
                    // Allow user to login without password verification
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["id"] = $id;
                    $_SESSION["loggedin"] = true;

                    // Redirect user to ideas page
                    header("location: ideas.php");
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
    <title>IdeaApp-Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper" style="margin-left: 37%; margin-top: 10%">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>

</html>