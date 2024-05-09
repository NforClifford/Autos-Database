<?php
session_start();
include("pdo.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nfor Clifford Yungong - Login Page</title>
</head>
<body >
    <h1>Please Log In</h1>
	<P style="color: red;"><?php    
   $password = "php123";
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (isset($_POST['go'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "Email and password are required";
        } elseif ($_POST['password'] !== 'php123') {
            echo "Incorrect password";
        } elseif (!strpos($_POST['email'], '@')) {
            echo "Email must have an at-sign (@)";
        } else {
            
            if (password_verify($_POST['password'], $hashed_password)) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];    

                header("Location: autos.php?name=".urlencode($_POST['email']));
                error_log("Login success ".$_POST['email']);
                exit();
            } else {
                
                error_log("Login fail ".$_POST['email']."$hashed_password");
            }
        }
    } elseif (isset($_POST['cancel'])) {
        header("location: index.php");
    }
    ?></p>
    <div class="cont">
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><br>
        	<label for="who">User Name</label>
             <input type="text" name="email" id="who"><br>
             <label for="id_1723">Password</label>
             <input type="text" name="password" id="id_1723"><br>
            <input type="submit" name="go" value="Log In">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </div>
    <p>For a password hint, view source and find a password hint in the HTML comment.
    <!-- Hint: The password is the three character name of the programming language used in this class (all lower case) followed by 123. -->
    	
    </p>
    
</body>
</html>
