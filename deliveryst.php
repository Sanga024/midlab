<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - SAVYZ</title>
    <link rel="stylesheet" href="deliveryst.css">
</head>
<body>

<img src="SAVYZ TEXT LOGO.png" alt="Logo" style="display:block; margin:20px auto; max-width:200px;">

<div class="header">

<h1>Delivery Staff Panel<h1>
</div>

<div class="container">
    <h1>Log In</h1>

    <?php
    if (!empty($error)) {
        echo '<p style="color:red; font-weight:bold;">' . $error . '</p>';
    }
    ?>

    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="fname" value="<?php echo isset($fname) ? htmlspecialchars($fname) : ''; ?>" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <div class="auth">
            <button type="submit" name="login">Log In</button>
            <button type="reset">Cancel</button>
        </div>
        
        <p style="margin-top:20px;">
            Don't have an account? 
            <a href="Creg.php" style="color:greenyellow; font-weight:bold;">Register Here</a>
        </p>
    </form>
</div>

</body>
</html>
