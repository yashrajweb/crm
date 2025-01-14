

    <?php
    session_start();
    require 'dbcon.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_customer_id'])) {
        $quotation_id = mysqli_real_escape_string($con,$_POST['quotation_id']);
    $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $device = mysqli_real_escape_string($con, $_POST['device']);
    $desc = $_POST['description'];
    $device_condition = mysqli_real_escape_string($con, $_POST['deviceCondition']);
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
    $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
    $delivery_date = mysqli_real_escape_string($con, $_POST['delivery_date']);
    $delivery_time = mysqli_real_escape_string($con, $_POST['delivery_time']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $gst = mysqli_real_escape_string($con, $_POST['gst']);

    $query_status = "UPDATE quotation_repair SET status = '$status' WHERE id = '$quotation_id'";
    $query_status_run = mysqli_query($con,$query_status);

    $stmt = $con->prepare("INSERT INTO invoice_repair 
    (register_customer_id,
    title,
    device_type,
    company,
    model,
    description,
    device_condition,
    mrp,
    offerprice,
    delivery_date,
    delivery_time,
    gst) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param(
        "issssssiisss",
        $register_customer_id,
        $title,
        $device,
        $company,
        $model,
        $desc,
        $device_condition,
        $mrp,
        $offer_price,
        $delivery_date,
        $delivery_time,
        $gst
    );

    if ($stmt->execute()) {
        $query_status = "UPDATE quotation_repair SET status = 'Accepted' WHERE register_customer_id = '$register_customer_id'";
        $query_run_status = mysqli_query($con,$query_status);
        $_SESSION['message'] = "Successfully Submitted!";
        // $_SESSION['id'] = $  register_customer_id;
        header("location: fetch-customer.php");
        exit();
    } else {
        $_SESSION['message'] = "Failed".mysqli_errno($con);
        // $_SESSION['id'] = $register_customer_id;
        header("location: new-invoice.php");
        // exit();
    }



    //fetch customer details
    $query1 = "SELECT * FROM register_customer WHERE register_customer_id='$register_customer_id'";
    $query_run1 = mysqli_query($con, $query1);

    if (mysqli_num_rows($query_run1) > 0) {
        $customer = mysqli_fetch_assoc($query_run1);
    } else {
        echo "Customer not found!";
        exit;
    }



   

    $stmt->close();
    $con->close();
    }
    ?>
    