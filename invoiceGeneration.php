<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    session_start();
    require 'dbcon.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_customer_id'])) {
    $register_customer_id = mysqli_real_escape_string($con, $_POST['register_customer_id']);
    $package = mysqli_real_escape_string($con, $_POST['offerPlan']);
    $description = $_POST['description'];
    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
    $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
    $domain_name = mysqli_real_escape_string($con, $_POST['domain_name']);
    $domain_exp_date = mysqli_real_escape_string($con, $_POST['domain_exp_date']);
    $company_name = mysqli_real_escape_string($con, $_POST['companyName']);
    $gst_number = mysqli_real_escape_string($con, $_POST['gst']);


    

    $stmt = $con->prepare("INSERT INTO invoice_web (register_customer_id,package,description,mrp,offer_price,domain_name,domain_exp_date,company_name,gst_number) VALUES (?,?,?,?,?,?,?,?,?)");

    $query2 = "SELECT * FROM quotation_web WHERE register_customer_id='$register_customer_id'";
    $query_run2 = mysqli_query($con, $query2);

    if (mysqli_num_rows($query_run2) > 0) {
        $web = mysqli_fetch_assoc($query_run2);
    } else {
        echo "No Description found!";
        exit;
    }


    // $query = "SELECT * FROM quotation_web_master WHERE title='$description'";
    // $query_run = mysqli_query($con, $query);

    // if (mysqli_num_rows($query_run) > 0) {
    //     $master = mysqli_fetch_assoc($query_run);
    // } else {
    //     echo "No Description found!";
    //     exit;
    // }

    $description = $web['description'];

    //fetch customer details
    $query1 = "SELECT * FROM register_customer WHERE register_customer_id='$register_customer_id'";
    $query_run1 = mysqli_query($con, $query1);

    if (mysqli_num_rows($query_run1) > 0) {
        $customer = mysqli_fetch_assoc($query_run1);
    } else {
        echo "Customer not found!";
        exit;
    }




    $stmt->bind_param(
        "issiissss",
        $register_customer_id,
        $package,
        $description,
        $mrp,
        $offer_price,
        $domain_name,
        $domain_exp_date,
        $company_name,
        $gst_number
    );




    if ($stmt->execute()) {
        $query_status = "UPDATE quotation_web SET status = 'Accepted' WHERE      = '$register_customer_id'";
        $query_run_status = mysqli_query($con,$query_status);
        $_SESSION['message'] = "Successfully Submitted!";
        // header("location: quotation-web.php");
        // exit();
    } else {
        $_SESSION['message'] = "Failed";
        // header("location: quotation-web.php");
        // exit();
    }

    $stmt->close();
    $con->close();
    }
    else{
        header("location:invoice-web.php");
    }
    ?>
    <style>
        .title{
            font-family: 'Times New Roman', Times, serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60px;
            background-color: rgb(10, 10, 179);
            font-size: 40px;
            font-weight: bold;
            color: white;
            margin-bottom: 3rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .label {
            font-weight: bold;
            width: 20%;
        }

        .customer{
            margin-bottom: 3rem;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f8f8;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            border-top: 1px solid #ddd;
        }

        /* footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f8f8;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            border-top: 1px solid #ddd;
        } */
        .footer-header {
            width: 90%;
            position: fixed;
            bottom: 90px;
            text-align: right;
            font-weight: bold;
            margin-bottom: 5px;
            margin-inline-end: 80px;
        }
        
        
    </style>
    <div class="title">
        Invoice
    </div>
        <!-- customer details -->
    <div class="customer">
        <table>
            <tr>
                <td class="label">Customer Name:</td>
                <td><?=$customer['first_name']." ".$customer['last_name']; ?></td>
                <td class="label">Date:</td>
                <td><?php echo date("l, F j, Y"); ?></td>
            </tr>
            <tr>
                <td class="label">Address:</td>
                <td colspan="3"><?= $customer['street'] . " " . $customer['area']. " " . $customer['city']. " " . $customer['district']. " " . $customer['state']. " " . $customer['country']. " " . $customer['pincode']; ?></td>
            </tr>
            <tr>
                <td class="label">Mobile-1:</td>
                <td><?= $customer['mobile_number']?></td>
                <td class="label">Mobile-2:</td>
                <td><?= $customer['alternate_number']?></td>
            </tr>
            <tr>
                <td class="label">Email:</td>
                <td colspan="3"><?= $customer['email']?></td>
            </tr>
        </table>
    </div>

    <div class="description">
        <!-- Description details -->
        <table>
            <tr>
                <th style="text-align: center; font-size: larger;" colspan="4" class="header">WEBSITE PACKAGE</th>
            </tr>
            <tr>
                <td colspan="4"><?php echo '<p>' . $description . '</p>'?></td>
            </tr>
            <tr>
                <td class="header">MRP:</td>
                <td><b><?= $mrp?></b> /-</td>
                <td class="header">OFFER PRICE:</td>
                <td><b><?= $offer_price?></b> /-</td>
            </tr>
            <tr>
                <td colspan="4" class="terms">Terms and conditions</td>
            </tr>
        </table>
    </div>

    <div class="bottom">
        <div class="footer-header">FOR WEBMIRCHI IT SOLUTIONS</div>
        <footer>
            
            <div class="footer-content">
                Webmirchi IT Solutions, Sr.No.43/14, Prasad Apartment, Ground Floor, Near Bank of India, Erandwane, Pune, Maharashtra 411004<br>
                Mobile No: 9850639994, 9325229999<br>
                Email ID: <a href="mailto:info@webmirchi.com">info@webmirchi.com</a>, Website: <a href="http://www.webmirchi.com" target="_blank">www.webmirchi.com</a><br>
                <i>quotation generated by Webmirchi Pvt. Ltd.</i>
            </div>
        </footer>
        <!-- <div class="sign">
            <strong>FOR WEBMIRCHI IT SOLUTIONS</strong><br>
        </div>
        <div class="footer">
            Webmirchi IT Solutions, Sr.No.43/14, Prasad Apartment, Ground Floor, Near Bank of India, Erandwane, Pune, Maharashtra 411004<br>
            Mobile No: 9850639994, 9325229999<br>
            Email ID: <a href="mailto:info@webmirchi.com">info@webmirchi.com</a>, Website: <a href="http://www.webmirchi.com" target="_blank">www.webmirchi.com</a><br>
            <i>quotation generated by Webmirchi Pvt. Ltd.</i>
        </div> -->
        
    </div>
</body>
</html>