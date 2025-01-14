<?php
session_start();
require 'dbcon.php';



if (isset($_GET['id'])) {
    
        // Sanitize the input
        $id = mysqli_real_escape_string($con, $_GET['id']); // Correct the input key to 'id'

        // Prepare the DELETE query
        $query = "UPDATE website_demo SET markasdelete = 'Yes' WHERE id = '$id'"; // Use the variable correctly

        // Execute the query
        $query_run = mysqli_query($con, $query);

        // Check if the query was successful
        if ($query_run) {
            $_SESSION['message'] = "Marked as deleted";
            header("Location: web-demo-master.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Delete failed: " . mysqli_error($con); // Correct error handling
            // header("Location: website-demo-master.php");
            exit(0);
        }
    
}

if (isset($_POST['master-btn'])) {
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $website_type = mysqli_real_escape_string($con, $_POST['website_type']);
    $demoPort = mysqli_real_escape_string($con, $_POST['demoPort']);
    $description = $_POST['description'];
    $url = mysqli_real_escape_string($con, $_POST['link']);

    // Debug URL input
    if (empty($url)) {
        die("URL is empty. Please check the form.");
    }

    // Prepare and bind parameters
    $stmt = $con->prepare("INSERT INTO website_demo (category, website_type,demoOrPortfolio, description, url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $category, $website_type, $demoPort , $description, $url);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Successfully Added to Master!";
        header("Location: web-demo-master.php");
        exit();
    } else {
        $_SESSION['message'] = "Failed: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}



