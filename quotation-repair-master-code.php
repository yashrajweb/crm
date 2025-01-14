<?php
    
    session_start();
    require 'dbcon.php';

    if(isset($_POST['master-btn'])){
        $title = mysqli_real_escape_string($con,$_POST['title']);
        $device = mysqli_real_escape_string($con,$_POST['device']);
        $description = $_POST['description'];
        $mrp = mysqli_real_escape_string($con,$_POST['mrp']);
        $offer_price = mysqli_real_escape_string($con,$_POST['offerprice']);

        $stmt = $con->prepare( "INSERT INTO quotation_repair_master (title,device,description,mrp,offerprice) VALUES (?,?,?,?,?)");
        
        $stmt->bind_param(
            "sssii",
            $title,
            $device,
            $description,
            $mrp,
            $offer_price
        );

        if($stmt->execute()){
            $_SESSION['message'] = "Successfully Added to Master!";
            header("location: quotation-repair-master.php");
            exit();
        }
        else{
            $_SESSION['message'] = "Failed";
            header("location: quotation-repair-master.php");
            exit();
        }

        $stmt->close();
        $con->close();

    }

?>