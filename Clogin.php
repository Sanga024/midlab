<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="Clogin.css">
</head>
<body>

<img src="SAVYZ TEXT LOGO.png">

<div class="container">
    <h1>Log In</h1>

    <form method="POST" action="Cdash.php">
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <div class="auth">
            <button type="submit" name="login">Log in</button>
            <button type="reset">Cancel</button>
        </div>
        <p style="margin-top:20px;">
        Don't have an account?
        <a href="Creg.php" style="color:greenyellow; font-weight:bold;">
            Register Here
        </a>
    </p>
        
    </form>

    <!-- PHP Validation Message -->
  <?php
session_start();
include "connect.php";

if (isset($_POST['login'])) {

    $user = $_POST['username'];   // email or username
    $pass = $_POST['password'];

    if (empty($user) || empty($pass)) {
        echo "<p style='color:red;'>All fields are required!</p>";
        exit();
    }

    // Fetch user from database
    $sql = "SELECT * FROM customerreg WHERE email='$user'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        
        if (password_verify($pass, $row['password'])) {

            
            $_SESSION['user']  = $row['email'];
            $_SESSION['fname'] = $row['fname'];

            header("Location: Cdash.php");
            exit();

        } else {
            echo "<p style='color:red;'>Invalid password!</p>";
        }

    } else {
        echo "<p style='color:red;'>User not found!</p>";
    }
}
?>
 



    
</div>

</body>
</html>
