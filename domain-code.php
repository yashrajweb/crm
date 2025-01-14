<?php

session_start();
require 'dbcon.php';

$typeDomain = "domain";
$typeSsl = "ssl";
$typeHosting = "hosting";

if (isset($_POST['master-btn'])) {
    $type = $_POST['type'];
}

if ($type === $typeDomain) {
    if (isset($_POST['master-btn'])) {
        $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $domain_name = mysqli_real_escape_string($con, $_POST['domain_name']);
        $service_provider = mysqli_real_escape_string($con, $_POST['service_provider']);
        $exp_date = mysqli_real_escape_string($con, $_POST['exp_date']);
        $reg_date = mysqli_real_escape_string($con, $_POST['reg_date']);
        $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
        $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
        $status = mysqli_real_escape_string($con, $_POST['status']);

        $stmt = $con->prepare("INSERT INTO domain (register_customer_id,title,domainName,service_provider,reg_date,exp_date,mrp,offerprice,status) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param(
            "issssssss",
            $register_customer_id,
            $title,
            $domain_name,
            $service_provider,
            $reg_date,
            $exp_date,
            $mrp,
            $offer_price,
            $status
        );

        if ($stmt->execute()) {
            $_SESSION['message'] = "Successfully Added!";
            header("location: fetch-customer.php");
            exit();
        } else {
            $_SESSION['message'] = "Failed".mysqli_errno($con);
            // header("location: domain.php");
            exit();
        }

        $stmt->close();
        $con->close();
    }
} else if ($type === $typeSsl) {
    if (isset($_POST['master-btn'])) {
        $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $domain = mysqli_real_escape_string($con, $_POST['domain']);
        $service_provider = mysqli_real_escape_string($con, $_POST['service_provider']);
        $reg_date = mysqli_real_escape_string($con, $_POST['reg_date']);
        $exp_date = mysqli_real_escape_string($con, $_POST['exp_date']);
        $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
        $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
        $status = mysqli_real_escape_string($con, $_POST['status']);

        $stmt = $con->prepare("INSERT INTO ssl_certificate (register_customer_id,title,domain,service_provider,reg_date,exp_date,mrp,offerprice,status) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param(
            "issssssss",
            $register_customer_id,
            $title,
            $domain,
            $service_provider,
            $reg_date,
            $exp_date,
            $mrp,
            $offer_price,
            $status
        );

        if ($stmt->execute()) {
            $_SESSION['message'] = "Successfully Added!";
            header("location: fetch-customer.php");
            exit();
        } else {
            $_SESSION['message'] = "Failed".mysqli_errno($con);
            // header("location: domain.php");
            exit();
        }

        $stmt->close();
        $con->close();
    }
} 


// HOSTING ======>

else if ($type === $typeHosting) {

    if (isset($_POST['master-btn'])) {
        // Sanitize input data
        $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $domain = mysqli_real_escape_string($con, $_POST['domain']);
        $service_provider = mysqli_real_escape_string($con, $_POST['service_provider']);
        $reg_date = mysqli_real_escape_string($con, $_POST['reg_date']);
        $exp_date = mysqli_real_escape_string($con, $_POST['exp_date']);
        $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
        $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
        $status = mysqli_real_escape_string($con, $_POST['status']);
    
        // Prepare SQL query
        $stmt = $con->prepare("INSERT INTO hosting (register_customer_id, title, domain, service_provider, reg_date, exp_date, mrp, offerprice, status) VALUES (?,?,?,?,?,?,?,?,?)");
    
        if ($stmt === false) {
            die('MySQL prepare error: ' . $con->error); // Detailed error if query preparation fails
        }
    
        // Bind parameters to the query
        $stmt->bind_param(
            "issssssss",  // Make sure these match the data types of the values you're inserting
            $register_customer_id,
            $title,
            $domain,
            $service_provider,
            $reg_date,
            $exp_date,
            $mrp,
            $offer_price,
            $status
        );
    
        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "Successfully Added!";
            header("location: fetch-customer.php");
            exit();
        } else {
            $_SESSION['message'] = "Failed: " . mysqli_error($con);  // More detailed failure message
            header("location: domain.php");
            exit();
        }
    
        // Close statement and connection
        $stmt->close();
        $con->close();
    }
    
} else {
    echo "Type is not valid.";
}


?>