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

    <form method="POST" action="">
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
        <a href="Areg.php" style="color:greenyellow; font-weight:bold;">
            Register Here
        </a>
    </p>
    </form>

    <!-- PHP Validation Message -->
   <?php
if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (empty($user) || empty($pass)) {
        echo "<p style='color:red;'>All fields are required!</p>";
    } else {
        // For now, simple check (replace with DB check later)
        // Example: username = "admin", password = "1234"
        if ($user == "admin" && $pass == "1234") {
            // Login successful, redirect to Adash.php
            header("Location: Adash.php");
            exit(); // Always exit after header redirect
        } else {
            echo "<p style='color:red;'>Invalid username or password!</p>";
        }
    }
}
?>

</div>

</body>
</html>
