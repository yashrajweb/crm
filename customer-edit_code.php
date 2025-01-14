<?php
session_start();
require 'dbcon.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check for Existing Email in Database


// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form inputs
    $register_customer_id = mysqli_real_escape_string($con,$_POST['register_customer_id']);
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



    // Prepare the SQL statement
    $stmt = $con->prepare("UPDATE register_customer 
    SET 
        honorific = ?, 
        first_name = ?, 
        last_name = ?, 
        email = ?, 
        mobile_number = ?, 
        alternate_number = ?, 
        whatsapp_number = ?, 
        street = ?, 
        area = ?, 
        city = ?, 
        district = ?, 
        state = ?, 
        country = ?, 
        pincode = ? 
    WHERE register_customer_id = ?");


    // Bind parameters
    $stmt->bind_param("ssssssssssssssi", $honorific, $first_name, $last_name, $email, $mobile_number, $alternate_number, $whatsapp_number, $street, $area, $city, $district, $state, $country, $pincode, $register_customer_id);


    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to customer-register.php with a success parameter
        $_SESSION['message'] = "Record Updated successfully!";
        header("Location: fetch-customer.php");
        exit();
    } else {
        $_SESSION['message'] = "Updation Error";
        header("Location: fetch-customer.php"); // Redirect on error
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
