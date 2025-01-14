<?php

session_start();
require 'dbcon.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>

<body>
    <style>
        .title {
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

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .label {
            font-weight: bold;
            width: 20%;
        }

        .customer {
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
        <a style="text-decoration: none; color:white;" href="fetch-customer.php">Invoice</a>
    </div>
    <!-- customer details -->
    <div class="customer">
        <?php
        if (isset($_GET['id'])) {
            $invoice_id = mysqli_real_escape_string($con, $_GET['id']);

            $query_invoice = "SELECT * FROM invoice_sales WHERE id  = '$invoice_id'";
            $query_invoice_run = mysqli_query($con, $query_invoice);
            if (mysqli_num_rows($query_invoice_run) > 0) {
                $invoice_details = mysqli_fetch_assoc($query_invoice_run);
            } else {
                echo  "Can't get invoice details";
            }

            $customer_id = $invoice_details['register_customer_id'];
            $query_customer = "SELECT * FROM register_customer WHERE register_customer_id = '$customer_id'";
            $query_customer_run = mysqli_query($con, $query_customer);
            if (mysqli_num_rows($query_customer_run)>0) {
                $customer = mysqli_fetch_assoc($query_customer_run);
            }
            else {
                echo "Customer Details not found";
            }

        ?>
            <table>
                <tr>
                    <td class="label">Customer Name:</td>
                    <td><?= $customer['first_name'] . " " . $customer['last_name']; ?></td>
                    <td class="label">Date:</td>
                    <td><?= $invoice_details['date'] ?></td>
                </tr>
                <tr>
                    <td class="label">Address:</td>
                    <td colspan="3"><?= $customer['street'] . " " . $customer['area'] . " " . $customer['city'] . " " . $customer['district'] . " " . $customer['state'] . " " . $customer['country'] . " " . $customer['pincode']; ?></td>
                </tr>
                <tr>
                    <td class="label">Mobile-1:</td>
                    <td><?= $customer['mobile_number'] ?></td>
                    <td class="label">Mobile-2:</td>
                    <td><?= $customer['alternate_number'] ?></td>
                </tr>
                <tr>
                    <td class="label">Email:</td>
                    <td colspan="3"><?= $customer['email'] ?></td>
                </tr>
            </table>
    </div>
    <!-- 
    <div class="description">
        <table>
            <tr>
                <th style="text-align: center; font-size: larger;" colspan="4" class="header">WEBSITE PACKAGE</th>
            </tr>
            <tr>
                <td colspan="4"><?php echo '<p>' . $desc . '</p>' ?></td>
            </tr>
            <tr>
                <td class="header">MRP:</td>
                <td><b><?= $mrp ?></b> /-</td>
                <td class="header">OFFER PRICE:</td>
                <td><b><?= $offer_price ?></b> /-</td>
            </tr>
            <tr>
                <td colspan="4" class="terms">Terms and conditions</td>
            </tr>
        </table>
    </div> -->

    <div class="description">
        <!-- Description details -->
        <table>
            <tr>
                <th style="text-align: center; font-size: larger;" colspan="6" class="header">DESCRIPTION</th>
            </tr>
            <tr>
                <td colspan="6"><?php echo '<p>' . $invoice_details['description'] . '</p>' ?></td>
            </tr>
            <tr>
                <td class="header">Company </td>
                <td><b><?= $invoice_details['company'] ?></b></td>
                <td class="header">Model</td>
                <td><b><?= $invoice_details['model'] ?></b></td>
                <td class="header">Serial Number</td>
                <td><b><?= $invoice_details['serial_number'] ?></b></td>
            </tr>
        </table>
    </div>

    <div class="description">
        <!-- Description details -->
        <table>

            <tr>
                <td class="header">MRP:</td>
                <td><b><?= $invoice_details['mrp'] ?></b> /-</td>
                <td class="header">OFFER PRICE:</td>
                <td><b><?= $invoice_details['offer_price'] ?></b> /-</td>
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
<?php
        } else {
?>
    <h2>No Id found</h2>

<?php
        }
?>
</body>


</html>