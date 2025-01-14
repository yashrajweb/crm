<?php
session_start();
require 'dbcon.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Function to validate phone numbers (only digits and length check)
function validate_phone_number($phone) {
    return ctype_digit($phone) && strlen($phone) >= 10 && strlen($phone) <= 15; // Only digits, between 10 to 15 digits
}

// If 'id' is set, handle the delete operation
if (isset($_GET['id'])) {
    // Sanitize input
    $register_customer_id = mysqli_real_escape_string($con, $_GET['id']);

    // Prepare the DELETE query
    $query = "UPDATE register_customer SET markasdelete = 'Yes' WHERE register_customer_id = '$register_customer_id'";

    // Execute the query
    if (mysqli_query($con, $query)) {
        $_SESSION['message'] = "Marked as deleted";
    } else {
        $_SESSION['message'] = "Delete failed: " . mysqli_error($con);
    }

    header("Location: fetch-customer.php");
    exit(0);
}

// Handle form submission
if (isset($_POST['customer-register'])) {
    // Collect form inputs
    $honorific = mysqli_real_escape_string($con, $_POST['honorific']);
    $first_name = mysqli_real_escape_string($con, $_POST['fname']);
    $last_name = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile_number = mysqli_real_escape_string($con, $_POST['number-1']);
    $alternate_number = mysqli_real_escape_string($con, $_POST['number-2']);
    $whatsapp_number = mysqli_real_escape_string($con, $_POST['whatsapp']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);

    // Validate phone numbers (only digits and within the correct length)
    if (!validate_phone_number($mobile_number)) {
        $_SESSION['message'] = "Invalid mobile number. It must contain only digits and be between 10 to 15 digits long.";
        header("Location: customer-register.php");
        exit(0);
    }
    
    if (!empty($alternate_number) && !validate_phone_number($alternate_number)) {
        $_SESSION['message'] = "Invalid alternate number. It must contain only digits and be between 10 to 15 digits long.";
        header("Location: customer-register.php");
        exit(0);
    }
    
    if (!empty($whatsapp_number) && !validate_phone_number($whatsapp_number)) {
        $_SESSION['message'] = "Invalid WhatsApp number. It must contain only digits and be between 10 to 15 digits long.";
        header("Location: customer-register.php");
        exit(0);
    }

    // Check if email already exists
    $email_check_query = "SELECT * FROM register_customer WHERE email = ? LIMIT 1";
    if ($stmt = mysqli_prepare($con, $email_check_query)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $_SESSION['message'] = "Email already registered! Please use a different email.";
            header("Location: customer-register.php");
            exit(0);
        }
        mysqli_stmt_close($stmt);
    }

    // Prepare the SQL insert statement
    $stmt = $con->prepare("INSERT INTO register_customer 
        (honorific, first_name, last_name, email, mobile_number, alternate_number, whatsapp_number, street, area, city, district, state, country, pincode) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param(
        "ssssiiissssssi",
        $honorific,
        $first_name,
        $last_name,
        $email,
        $mobile_number,
        $alternate_number,
        $whatsapp_number,
        $street,
        $area,
        $city,
        $district,
        $state,
        $country,
        $pincode
    );

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['message'] = "Record inserted successfully!";
        header("Location: customer-register.php");
    } else {
        $_SESSION['message'] = "Insertion Error: " . mysqli_error($con);
        header("Location: customer-register.php");
    }
    exit();
}

// Close the connection
$stmt->close();
$con->close();
?>
