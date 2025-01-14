<?php
require 'dbcon.php';
session_start();
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Function to save base64 image to a file
function saveBase64Image($base64Image, $path) {
    if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
        $data = substr($base64Image, strpos($base64Image, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, gif

        // Check for valid file type
        if (!in_array($type, ['jpg', 'jpeg', 'png', 'gif'])) {
            return null;
        }

        $data = base64_decode($data);
        if ($data === false) {
            return null;
        }

        // Generate unique file name
        $filePath = $path . uniqid() . '.' . $type;

        // Save file to path
        if (file_put_contents($filePath, $data)) {
            return $filePath; // Return file path
        }
    }
    return null;
}

// Process form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs
    $register_customer_id = $_POST['register_customer_id'];
    $title = $_POST['title'];
    $device = $_POST['device'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $model = $_POST['model'];
    $mrp = $_POST['mrp'];
    $offerprice = $_POST['offerprice'];
    $status = $_POST['status'];
    $deviceCondition = $_POST['deviceCondition'];

    // Save images
    $image1Path = saveBase64Image($_POST['image1'], 'uploads/');
    $image2Path = saveBase64Image($_POST['image2'], 'uploads/');
    $image3Path = saveBase64Image($_POST['image3'], 'uploads/');

    // Check if images were saved
    if (!$image1Path || !$image2Path || !$image3Path) {
        die("Error uploading images. Please try again.");
    }

    // Insert data into database
    $query = "INSERT INTO quotation_repair (
                register_customer_id, title, device, description, company, model, mrp, offerprice, status, device_condition, image1, image2, image3
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($query);
    if ($stmt) {
        $stmt->bind_param(
            'isssssiisssss',
            $register_customer_id,
            $title,
            $device,
            $description,
            $company,
            $model,
            $mrp,
            $offerprice,
            $status,
            $deviceCondition,
            $image1Path,
            $image2Path,
            $image3Path
        );

        if ($stmt->execute()) {
            echo "Quotation submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }
} else {
    echo "Invalid request method.";
}

// Close connection
$con->close();
?>
