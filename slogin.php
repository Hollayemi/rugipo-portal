<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="css/auth.css">

</head>
<body>
    <h2>Student Login</h2>
    <form method="post">
        <!-- Input field for Email -->
        <label for="matricNo">Matric Number:</label>
        <input type="text" name="matricNo" required>

        <!-- Input field for Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <!-- Submit button -->
        <input type="submit" name="slogin" value="Login as a student">
        <br>
        <p>Don't have an account? <a href="register.php">Register</a></p>
        
    </form>
   
</body>
</html>

<?php include("components/connection.php") ?>

<?php
// login_process.php

if(isset($_POST["slogin"])) {
    // Retrieve form data
    $matricNo = $_POST['matricNo'];
    $password = $_POST['password'];

    // Retrieve lecturer data based on matricNo
    $sql = "SELECT * FROM students WHERE roll_number = '$matricNo'";
    $result = mysqli_query($conn, $sql);

    // Check if lecturer exists and verify the password
    if ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
        if ($password) {
            // Start a session and store lecturer details
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['roll_number'] = $row['roll_number'];

            // Redirect to dashboard.php
            header("Location: student.php?email=".$row['email']);
            exit();
        } else {
            echo '<script>alert("Invalid password!")</script>';
        }
    } else {
        echo '<script>alert("Student not found!")</script>';
    }
}
?>