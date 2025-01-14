<?php
session_start();
require 'dbcon.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}



if(isset($_GET['id'])){
    $enq_id = mysqli_real_escape_string($con,$_GET['id']);

    $query_status = "UPDATE enquiry SET status = 'Accepted' WHERE enquiry_id = '$enq_id'";

    if (mysqli_query($con,$query_status)) {
        $_SESSION['message'] = "Accepted!";
        header("Location: fetch-enquiry.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Failed".mysqli_error($con);
        // header("Location: fetch-customer.php");
        // exit(0);
    }


}


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
                                    

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form inputs
    $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
    $enquiry = mysqli_real_escape_string($con, $_POST['enquiry-title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $remindDate = isset($_POST['remind-Date']) && !empty($_POST['remind-Date']) 
        ? mysqli_real_escape_string($con, $_POST['remind-Date']) 
        : null;
    $remindTime = isset($_POST['remind-Time']) && !empty($_POST['remind-Time']) 
        ? mysqli_real_escape_string($con, $_POST['remind-Time']) 
        : null;

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO enquiry 
        (register_customer_id, enquiry_title, description, status, reminder_date, reminder_time) 
        VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param(
        "isssss",
        $register_customer_id,
        $enquiry,
        $description,
        $status,
        $remindDate,
        $remindTime
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to fetch-customer.php with a success parameter
        $_SESSION['message'] = "Enquiry inserted successfully!";
        header("Location: fetch-customer.php");
        exit();
    } else {
        $_SESSION['message'] = "Insertion Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
