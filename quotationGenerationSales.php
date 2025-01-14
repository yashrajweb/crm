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
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $device = mysqli_real_escape_string($con, $_POST['device']);
    $desc = $_POST['description'];
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);
    $serial_number = mysqli_real_escape_string($con, $_POST['serial_number']);
    $offer_price = mysqli_real_escape_string($con, $_POST['offerprice']);
    $status = mysqli_real_escape_string($con, $_POST['status']);




    $stmt = $con->prepare("INSERT INTO quotation_sales (register_customer_id,title,device,description,company,model,serial_number,mrp,offerprice,status) VALUES (?,?,?,?,?,?,?,?,?,?)");
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
        $status
    );

    if ($stmt->execute()) {
        $_SESSION['message'] = "Successfully Submitted!";
        // header("location: quotation-web.php");
        // exit();
    } else {
        $_SESSION['message'] = "Failed";
        // header("location: quotation-web.php");
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
        <a style="text-decoration: none; color:white;" href="fetch-customer.php?id=<?= $customer['register_customer_id']; ?>">Quotation</a>
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
                <td colspan="3"><?= $customer['street'] . " " . $customer['area']. " " . $customer['city']. " " . $customer['district']. " " . $customer['state']. " " . $customer['country']. " " . $customer['area']. " " . $customer['pincode']; ?></td>
            </tr>
            <tr>
            <td class="label">Mobile-1:</td>
                <td><?= $customer['mobile_number']?></td>
                <td class="label">Mobile-2:</td>
                <td><?= $customer['whatsapp_number']?></td>
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
                <th style="text-align: center; font-size: larger;" colspan="6" class="header">WEBSITE PACKAGE</th>
            </tr>
            <tr>
                <td colspan="6"><?php echo '<p>' . $desc . '</p>'?></td>
            </tr>
            <tr>
                <td class="header">Device Type: </td>
                <td><b><?=$device?></b></td>
                <td class="header">Company: </td>
                <td><b><?=$company?></b></td>
                <td class="header">Model: </td>
                <td><b><?=$model?></b></td>
            </tr>
        </table>
    </div>

    <div class="description">
        <!-- Description details -->
        <table>
            
            <tr>
                <td class="header">MRP:</td>
                <td><b><?=$mrp?></b> /-</td>
                <td class="header">OFFER PRICE:</td>
                <td><b><?=$offer_price?></b> /-</td>
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