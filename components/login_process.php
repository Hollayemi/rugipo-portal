<?php include("connection.php") ?>

<?php
// login_process.php

if(isset($_POST["hlogin"])) {
    // Retrieve form data
    $matricNo = $_POST['matricNo'];
    $password = $_POST['password'];

    // Retrieve lecturer data based on matricNo
    $sql = "SELECT * FROM students WHERE rollnumber = '$matricNo'";
    $result = mysqli_query($conn, $sql);

    // Check if lecturer exists and verify the password
    if ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
        if ($password) {
            // Start a session and store lecturer details
            session_start();
            $_SESSION['email'] = $row['Email'];

            // Redirect to dashboard.php
            // header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Lecturer not found!";
    }
}
?>
