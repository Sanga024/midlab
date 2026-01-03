<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="Alogin.css">
</head>
<body>

<img src="SAVYZ TEXT LOGO.png">

<div class="container">
    <h1>Register</h1>

    <form method="POST" action="">
        <label>Full Name:</label><br>
        <input type="text" name="fname"><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="lname"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>Date of Birth:</label><br>
        <input type="date" name="dob"><br><br>

        <div class="auth">
            <button type="submit" name="register">Register</button>
            <button type="reset">Cancel</button>
        </div>
    </form>

    <!-- PHP Validation -->
    <?php
    if (isset($_POST['register'])) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass  = $_POST['password'];
        $dob   = $_POST['dob'];

        if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($dob)) {
            echo "<p style='color:red;'>All fields are required!</p>";
        } else {
            echo "<p style='color:green;'>Registration Successful!</p>";
        }
    }
    ?>

    <p style="margin-top:20px;">
        Already have an account?
        <a href="Alogin.php" style="color:greenyellow; font-weight:bold;">
            Login Here
        </a>
    </p>

</div>

</body>
</html>
