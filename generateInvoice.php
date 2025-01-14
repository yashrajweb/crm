

    <?php
    session_start();
    require 'dbcon.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_customer_id'])) {
        $quotation_id = mysqli_real_escape_string($con, $_POST['quotation_id']);
        $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $desc = $_POST['description'];
        $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
        $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
        $domainName = mysqli_real_escape_string($con, $_POST['domainName']);
        $reg_date = mysqli_real_escape_string($con, $_POST['reg-date']);
        $exp_date = mysqli_real_escape_string($con, $_POST['exp-date']);
        $company_name = mysqli_real_escape_string($con, $_POST['companyName']);
        $gst = mysqli_real_escape_string($con, $_POST['gst']);
        // $status = mysqli_real_escape_string($con, $_POST['status']);


        $query_status = "UPDATE quotation_web SET status = 'Accepted' WHERE quotation_id = '$quotation_id'";
        $query_status_run = mysqli_query($con, $query_status);




        $stmt = $con->prepare("INSERT INTO invoice_web 
    (register_customer_id,
    package,
    description,
    mrp,
    offer_price,
    domain_name,
    domain_reg_date,
    domain_exp_date,
    company_name,
    gst_number) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param(
            "issiisssss",
            $register_customer_id,
            $title,
            $desc,
            $mrp,
            $offer_price,
            $domainName,
            $reg_date,
            $exp_date,
            $company_name,
            $gst
        );

        if ($stmt->execute()) {
            $_SESSION['message'] = "Successfully Submitted!";
            // $_SESSION['id'] = $register_customer_id;
            header("location: fetch-customer.php");
            exit();
        } else {
            $_SESSION['message'] = "Failed" . mysqli_errno($con);
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
    