<?php
    
    session_start();
    require 'dbcon.php';

    if(isset($_POST['master-btn'])){
        $category_name = mysqli_real_escape_string($con,$_POST['category_name']);
        

        $stmt = $con->prepare( "INSERT INTO category (category_name) VALUES (?)");
        
        $stmt->bind_param(
            "s",
            $category_name
        );

        if($stmt->execute()){
            $_SESSION['message'] = "Successfully Added to Master!";
            header("location: category.php");
            exit();
        }
        else{
            $_SESSION['message'] = "Failed".mysqli_errno($con);
            // header("location: category.php");
            // exit();
        }

        $stmt->close();
        $con->close();

    }


    if (isset($_GET['id'])) {
        $type = mysqli_real_escape_string($con,$_GET['type']);
        if ($type==="delete") {
            // Sanitize the input
        $category_id = mysqli_real_escape_string($con, $_GET['id']); // Correct the input key to 'id'
    
        // Prepare the DELETE query
        $query = "UPDATE category SET markasdelete = 'Yes' WHERE id = '$category_id'"; // Use the variable correctly
    
        // Execute the query
        $query_run = mysqli_query($con, $query);
    
        // Check if the query was successful
        if ($query_run) {
            $_SESSION['message'] = "Marked as deleted";
            header("Location: category.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Delete failed: " . mysqli_error($con); // Correct error handling
            // header("Location: category.php");
            exit(0);
        }
       
        
    }
}

?>