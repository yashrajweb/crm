<?php
    
    session_start();
    require 'dbcon.php';

    if(isset($_POST['email-sub'])){
        $register_customer_id = mysqli_real_escape_string($con,$_POST['register_customer_id']);
        $domainName = mysqli_real_escape_string($con,$_POST['domainName']);
        $service_provider = mysqli_real_escape_string($con,$_POST['service_provider']);
        $mx1_host = mysqli_real_escape_string($con,$_POST['mx1_host']);
        $mx1_value = mysqli_real_escape_string($con,$_POST['mx1_value']);
        $mx1_priority = mysqli_real_escape_string($con,$_POST['mx1_priority']);
        $mx2_host = mysqli_real_escape_string($con,$_POST['mx2_host']);
        $mx2_value = mysqli_real_escape_string($con,$_POST['mx2_value']);
        $mx2_priority = mysqli_real_escape_string($con,$_POST['mx2_priority']);
        $mx3_host = mysqli_real_escape_string($con,$_POST['mx3_host']);
        $mx3_value = mysqli_real_escape_string($con,$_POST['mx3_value']);
        $mx3_priority = mysqli_real_escape_string($con,$_POST['mx3_priority']);
        $spf_host = mysqli_real_escape_string($con,$_POST['spf_host']);
        $spf_value = mysqli_real_escape_string($con,$_POST['spf_value']);
        $dkim = mysqli_real_escape_string($con,$_POST['dkim']);
        $bimi_logo_url = mysqli_real_escape_string($con,$_POST['bimi_logo_url']);
        $vmc_certificate_url = mysqli_real_escape_string($con,$_POST['vmc_certificate_url']);
        $description = mysqli_real_escape_string($con,$_POST['description']);
    

        $stmt = $con->prepare( "INSERT INTO email (
        register_customer_id,
        domainName,
        service_provider,
        MX1_host,
        MX1_value,
        MX1_priority,
        MX2_host,
        MX2_value,
        MX2_priority,
        MX3_host,
        MX3_value,
        MX3_priority,
        SPF_host,
        SPF_value,
        DKIM,
        BIMI_logo_url,
        VMC_certificate_url,
        description) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        
        $stmt->bind_param(
            "isssssssssssssssss",
            $register_customer_id,
            $domainName,
            $service_provider,
            $mx1_host,
            $mx1_value,
            $mx1_priority,
            $mx2_host,
            $mx2_value,
            $mx2_priority,
            $mx3_host,
            $mx3_value,
            $mx3_priority,
            $spf_host,
            $spf_value,
            $dkim,
            $bimi_logo_url,
            $vmc_certificate_url,
            $description
            
        );

        if($stmt->execute()){
            $_SESSION['message'] = "Success !";
            header("location: fetch-email-details.php");
            exit();
        }
        else{
            $_SESSION['message'] = "Failed";
            header("location: email.php");
            exit();
        }

        $stmt->close();
        $con->close();

    }

?>