<?php
    
    session_start();
    require 'dbcon.php';

    // $editorContent = $statusMsg = '';

    if(isset($_POST['master-btn'])){
        // $editorContent = $_POST['description'];
        $title = mysqli_real_escape_string($con,$_POST['title']);
        $desc = $_POST['description'];
        $mrp = mysqli_real_escape_string($con,$_POST['mrp']);
        $offer_price = mysqli_real_escape_string($con,$_POST['offerprice']);
        $yr1 = mysqli_real_escape_string($con,$_POST['yr1']);
        $yr2 = mysqli_real_escape_string($con,$_POST['yr2']);
        $yr3 = mysqli_real_escape_string($con,$_POST['yr3']);
        $yr4 = mysqli_real_escape_string($con,$_POST['yr4']);
        $yr5 = mysqli_real_escape_string($con,$_POST['yr5']);
        $yr10 = mysqli_real_escape_string($con,$_POST['yr10']);

        $stmt = $con->prepare("INSERT INTO quotation_web_master (title, description, mrp, offerprice, 1year, 2year, 3year, 4year, 5year, 10year) VALUES (?,?,?,?,?,?,?,?,?,?)");
        
        $stmt->bind_param(
            "ssiiiiiiii", // change this to use "i" for all the numeric values
            $title,
            $desc,
            $mrp,
            $offer_price,
            $yr1,
            $yr2,
            $yr3,
            $yr4,
            $yr5,
            $yr10
        );
        

        if($stmt->execute()){
            $_SESSION['message'] = "Successfully Added to Master!";
            header("location: quotation-web-master.php");
            exit();
        }
        else{
            $_SESSION['message'] = "Failed".mysqli_errno($con);
            header("location: quotation-web-master.php");
            // exit();
        }

        $stmt->close();
        $con->close();

    }

?>