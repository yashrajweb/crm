<?php
    require 'dbcon.php';
    session_start();

    if(isset($_POST['register-btn'])){
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $passwordHash = password_hash($password,PASSWORD_DEFAULT);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format!";
        header("Location: auth-register.php");
        exit(0);
    }

    $email_check_query = "SELECT * FROM register_employee WHERE email = ? LIMIT 1";
    if ($stmt = mysqli_prepare($con, $email_check_query)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $_SESSION['message'] = "Email already registered! Please use a different email.";
            header("Location: auth-register.php");
            exit(0);
        }
        mysqli_stmt_close($stmt);
    }

    $query = "INSERT INTO register_employee (name, email, password) VALUES (?, ?, ?)";  //point: Prepared statement to prevent SQL injection...
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $passwordHash);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = "Registration successful! Redirecting to login page...";
            header("Location: auth-login.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Registration failed. Please try again later.";
            header("Location: auth-register.php");
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['message'] = "Failed to prepare statement!";
        header("Location: auth-register.php");
    }
?>