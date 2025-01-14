
    <?php
    session_start();
    require 'dbcon.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_customer_id'])) {
    $quotation_id = mysqli_real_escape_string($con,$_POST['quotation_id']);
    $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $device = mysqli_real_escape_string($con, $_POST['device']);
    $desc = $_POST['description'];
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $serial_number = mysqli_real_escape_string($con, $_POST['serial_number']);
    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
    $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $gst = mysqli_real_escape_string($con, $_POST['gst']);

    $query_status = "UPDATE quotation_sales SET status = '$status' WHERE id = '$quotation_id'";
    $query_status_run = mysqli_query($con,$query_status);




    $stmt = $con->prepare("INSERT INTO invoice_sales 
    (register_customer_id,
    title,
    device_type,
    description,
    company,
    model,
    serial_number,
    mrp,
    offer_price,
    gst) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param(
        "issssssiis",
        $register_customer_id,
        $title,
        $device,
        $desc,
        $company,
        $model,
        $serial_number,
        $mrp,
        $offer_price,
        $gst
    );

    if ($stmt->execute()) {
        $_SESSION['message'] = "Successfully Submitted!";
        // $_SESSION['id'] = $register_customer_id;
        header("location: fetch-customer.php");
        exit();
    } else {
        $_SESSION['message'] = "Failed".mysqli_errno($con);
        // $_SESSION['id'] = $register_customer_id;
        header("location: new-invoice.php");
        // exit();
    }



   


   

    $stmt->close();
    $con->close();
    }
    ?>
    