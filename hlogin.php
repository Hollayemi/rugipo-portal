<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD Login</title>
    <link rel="stylesheet" type="text/css" href="css/auth.css">

</head>
<body>
    <h2>HOD Login</h2>
    <form action="login_process.php" method="post">
        <!-- Input field for Email -->
        <label for="email">Email</label>
        <input type="text" name="email" required>

        <!-- Input field for Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <!-- Submit button -->
        <input type="submit" name="hlogin" value="Login as a HOD">
        <br>
        <p>Don't have an account? <a href="register.php">Register</a></p>
        
    </form>
   
</body>
</html>