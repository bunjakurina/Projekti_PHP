
<?php
// Initialize the session


// Include config file
require_once "databaseconfig.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css3.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>

        <div class="modal">
            <span  class="close" title="Close Modal"><button class="close"><a href="index.php">&times;</a></button> </span>
            <form class="modal-content" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="container">
                    <h1>Log in</h1>
                    <p>Log in to your account.</p>
                    <hr>


                    <div  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label><b>Username</b></label>
                    <span class="red"><?php echo $username_err; ?></span>
                    <input type="text" placeholder="Enter username" name="username" >
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label><b>Password</b></label>

                    <input type="password" placeholder="password" name="password" >
                    <span class="red"><?php echo $password_err; ?></span></div> <div class="clearfix">
                    <button type="reset"  class="cancelbtn buttonn">Cancel</button>
                    <button type="submit" class="signupbtn buttonn" name="submit">Log in</button>

                    <br>
                <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
    </form>
</div>
</body>
</html>
