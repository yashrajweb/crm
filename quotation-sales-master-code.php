<?php
    
    session_start();
    require 'dbcon.php';

    if(isset($_POST['master-btn'])){
        $title = mysqli_real_escape_string($con,$_POST['title']);
        $device = mysqli_real_escape_string($con,$_POST['device']);
        $description = $_POST['description'];
        $company = mysqli_real_escape_string($con,$_POST['company']);
        $model = mysqli_real_escape_string($con,$_POST['model']);
        $mrp = mysqli_real_escape_string($con,$_POST['mrp']);
        $offer_price = mysqli_real_escape_string($con,$_POST['offerprice']);

        $stmt = $con->prepare( "INSERT INTO quotation_sales_master (title,device,description,company,model,mrp,offerprice) VALUES (?,?,?,?,?,?,?)");
        
        $stmt->bind_param(
            "sssssii",
            $title,
            $device,
            $description,
            $company,
            $model,
            $mrp,
            $offer_price
        );

        if($stmt->execute()){
            $_SESSION['message'] = "Successfully Added to Master!";
            header("location: quotation-sales-master.php");
            exit();
        }
        else{
            $_SESSION['message'] = "Failed";
            header("location: quotation-sales-master.php");
            exit();
        }

        $stmt->close();
        $con->close();

    }

?>