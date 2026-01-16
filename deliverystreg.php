<?php
include "connect.php";

if (isset($_POST['register'])) {

    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $dob      = $_POST['dob'];

    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($dob)) {
        echo "<p style='color:red;'>All fields are required!</p>";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO cus (fname, lname, email, password, dob)
                VALUES ('$fname', '$lname', '$email', '$hashedPassword', '$dob')";

        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:yellowgreen;position:fixed;padding:30px;margin-top:300px;font-size:50px;'>Registration successful</p>";
        } else {
            echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="Clogin.css">
</head>
<body>

<img src="SAVYZ TEXT LOGO.png">

<div class="container">
    <h1>Register</h1>

    <form method="POST" action="http://localhost/Prac/Creg.php">

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


   

    <p style="margin-top:20px;">
        Already have an account?
        <a href="Clogin.php" style="color:greenyellow; font-weight:bold;">
            Login Here
        </a>
    </p>

</div>

</body>
</html>
