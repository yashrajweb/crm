<?php
// Include database connection
include('dbcon.php');

// Check if ID is provided
if (isset($_GET['id'])) {
    $title = mysqli_real_escape_string($con, $_GET['title']);

    // Fetch the description for the selected title
    $query = "SELECT description FROM quotation_web_master WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['description'];
    } else {
        echo "No description found.";
    }
} else {
    echo "Invalid request.";
}
?>
