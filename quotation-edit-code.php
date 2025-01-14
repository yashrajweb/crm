<?php
session_start();
require 'dbcon.php';

if (isset($_POST['edit-btn'])) {
    // $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
    // $title = mysqli_real_escape_string($con, $_POST['title']);
    $quotation_id = mysqli_real_escape_string($con, $_POST['quotation_id']);
    $description = $_POST['description'];
    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
    $offerprice = mysqli_real_escape_string($con, $_POST['offerprice']);

    // Prepare the SQL statement
    $query = "UPDATE quotation_web SET description=?, mrp=?, offerprice=? WHERE quotation_id=?";
    $stmt = $con->prepare($query);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param('sssi', $description, $mrp, $offerprice, $quotation_id);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "Changes saved!";
            header("Location:fetch-customer.php");
            exit(0);
        } else {
            $_SESSION["message"] = "Updation Error: " . $stmt->error;
            header("Location:fetch-customer.php");
            exit(0);
        }
    } else {
        $_SESSION["message"] = "Statement preparation failed: " . mysqli_error($con);
        header("Location:fetch-customer.php");
        exit(0);
    }
}

if (isset($_POST['edit-sales'])) {

    $quotation_id = mysqli_real_escape_string($con, $_POST['quotation_id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $device = mysqli_real_escape_string($con, $_POST['device']);
    $description = $_POST['description'];
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
    $serial_number = mysqli_real_escape_string($con, $_POST['serial_number']);
    $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
    // $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE quotation_sales SET title=?,device=?, description=?,company=?,model=?,serial_number=?, mrp=?, offerprice=? WHERE id=?";
    $stmt = $con->prepare($query);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param('ssssssssi', $title, $device, $description, $company, $model, $serial_number, $mrp, $offerprice, $quotation_id);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "Changes saved!";
            header("Location:fetch-customer.php");
            exit(0);
        } else {
            $_SESSION["message"] = "Updation Error: " . $stmt->error;
            header("Location:fetch-customer.php");
            exit(0);
        }
    } else {
        $_SESSION["message"] = "Statement preparation failed: " . mysqli_error($con);
        header("Location:fetch-customer.php");
        exit(0);
    }

}

if (isset($_POST['edit-repair'])) {

    $quotation_id = mysqli_real_escape_string($con, $_POST['quotation_id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $device = mysqli_real_escape_string($con, $_POST['device']);
    $description = $_POST['description'];
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
    $device_condition = mysqli_real_escape_string($con, $_POST['device_condition']);
    $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
    // $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE quotation_repair SET title=?,device=?, description=?,company=?,model=?,device_condition=?, mrp=?, offerprice=? WHERE id=?";
    $stmt = $con->prepare($query);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param('ssssssssi', $title, $device, $description, $company, $model, $device_condition, $mrp, $offer_price, $quotation_id);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "Changes saved!";
            header("Location:fetch-customer.php");
            exit(0);
        } else {
            $_SESSION["message"] = "Updation Error: " . $stmt->error;
            // header("Location:fetch-customer.php");
            // exit(0);
        }
    } else {
        $_SESSION["message"] = "Statement preparation failed: " . mysqli_error($con);
        header("Location:fetch-customer.php");
        exit(0);
    }
}

?>