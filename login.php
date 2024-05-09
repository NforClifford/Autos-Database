<?php
session_start();
include("pdo.php");

// Define the hardcoded password
$password = "php123";
// Hash the password using the default algorithm
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nfor Clifford Yungong - Login Page</title>
</head>
<body>
    <h1>Please Log In</h1>
    <p style="color: red;">
    <?php
    // Check if form is submitted
    if (isset($_POST['go'])) {
        // Check if email and password fields are empty
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "Email and password are required";
        } elseif ($_POST['password'] !== $password) {
            // Compare entered password with hardcoded password
            echo "Incorrect password";
            // Log login failure
            error_log("Login fail ".$_POST['email']);
        } elseif (!strpos($_POST['email'], '@')) {
            // Check if email contains '@' symbol
            echo "Email must have an at-sign (@)";
        } else {
            // Verify hashed password
            if (password_verify($_POST['password'], $hashed_password)) {
                // Store email in session
                $_SESSION['email'] = $_POST['email'];
                // Redirect to autos.php
                header("Location: autos.php?name=".urlencode($_POST['email']));
                // Log login success
                error_log("Login success ".$_POST['email']);
                exit();
            }
        }
    }

    // Handle cancel button
    if (isset($_POST['cancel'])) {
        header("location: index.php");
        exit();
    }
    ?>
    </p>
    <div class="cont">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="who">User Name</label>
            <input type="text" name="email" id="who"><br>
            <label for="id_1723">Password</label>
            <input type="password" name="password" id="id_1723"><br>
            <input type="submit" name="go" value="Log In">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </div>
    <p>For a password hint, view source and find a password hint in the HTML comment.
    <!-- Hint: The password is the three character name of the programming language used in this class (all lower case) followed by 123. -->
    </p>
</body>
</html>
