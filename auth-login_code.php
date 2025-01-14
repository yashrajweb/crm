<?php
session_start();
require 'dbcon.php'; // Database connection

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if the email exists in the database
    $query = "SELECT * FROM register_employee WHERE email = ? LIMIT 1";
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Verify the password
            if (password_verify($password, $row['password'])) {
                // Set session variables for the logged-in user
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['name'] = $row['name'];


                // Redirect to the dashboard
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['message'] = "Invalid password. Please try again.";
                header("Location: auth-login.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "Email not registered.";
            header("Location: auth-login.php");
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['message'] = "Failed to prepare the statement.";
        header("Location: auth-login.php");
        exit();
    }
} else {
    header("Location: auth-login.php");
    exit();
}
?>
