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
        <a style="text-decoration: none; color:white;" href="fetch-customer.php">Quotation</a>
    </div>
    <!-- customer details -->
    <div class="customer">
        <?php
        if (isset($_GET['id'])) {
            $quotation_id = mysqli_real_escape_string($con, $_GET['id']);

            $query_quotation = "SELECT * FROM quotation_repair WHERE id  = '$quotation_id'";
            $query_quotation_run = mysqli_query($con, $query_quotation);
            if (mysqli_num_rows($query_quotation_run) > 0) {
                $quotation_details = mysqli_fetch_assoc($query_quotation_run);
            } else {
                echo  "Can't get invoice details";
            }

            $customer_id = $quotation_details['register_customer_id'];
            $query_customer = "SELECT * FROM register_customer WHERE register_customer_id = '$customer_id'";
            $query_customer_run = mysqli_query($con, $query_customer);
            if (mysqli_num_rows($query_customer_run) > 0) {
                $customer = mysqli_fetch_assoc($query_customer_run);
            } else {
                echo "Customer Details not found";
            }

        ?>
            <table>
                <tr>
                    <td class="label">Customer Name:</td>
                    <td><?= $customer['first_name'] . " " . $customer['last_name']; ?></td>
                    <td class="label">Date:</td>
                    <td><?= $quotation_details['datetime'] ?></td>
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


    <div class="description">
        <!-- Description details -->
        <table class="mb-3">
            <tr>
                <th style="text-align: center; font-size: larger;" colspan="4" class="header">DESCRIPTION</th>
            </tr>
            <tr>
                <td colspan="4"><?= $quotation_details['description'] ?></td>
            </tr>
            <tr>
                <td class="header">MRP:</td>
                <td><b><?= $quotation_details['mrp'] ?></b> /-</td>
                <td class="header">OFFER PRICE:</td>
                <td><b><?= $quotation_details['offerprice'] ?></b> /-</td>
            </tr>
            <tr>
                <td colspan="4" class="terms">Terms and conditions</td>
            </tr>
        </table>
        <!-- <div class="row" style="display: flex; justify-content: space-evenly; margin-top: 3rem;">
            <div class="col-4 mb-3">
                <img src="<?= $quotation_details['image1'] ?>" alt="Image 1" class="img-fluid" height="250">
            </div>
            <div class="col-4 mb-3">
                <img src="<?= $quotation_details['image2'] ?>" alt="Image 2" class="img-fluid" height="250">
            </div>
            <div class="col-4 mb-3">
                <img src="<?= $quotation_details['image3'] ?>" alt="Image 3" class="img-fluid" height="250">
            </div>
        </div> -->
        <div class="row" style="display: flex; justify-content: space-evenly; margin-top: 3rem;">
    <div class="col-4 mb-3">
        <?php if (!empty($quotation_details['image1'])): ?>
            <img src="<?= $quotation_details['image1'] ?>" alt="Image 1" class="img-fluid" height="250">
        <?php else: ?>
            <div class="img-fluid" style="height: 250px; background-color: #f0f0f0;"></div> <!-- Blank div with background color -->
        <?php endif; ?>
    </div>
    <div class="col-4 mb-3">
        <?php if (!empty($quotation_details['image2'])): ?>
            <img src="<?= $quotation_details['image2'] ?>" alt="Image 2" class="img-fluid" height="250">
        <?php else: ?>
            <div class="img-fluid" style="height: 250px; background-color: #f0f0f0;"></div> <!-- Blank div with background color -->
        <?php endif; ?>
    </div>
    <div class="col-4 mb-3">
        <?php if (!empty($quotation_details['image3'])): ?>
            <img src="<?= $quotation_details['image3'] ?>" alt="Image 3" class="img-fluid" height="250">
        <?php else: ?>
            <div class="img-fluid" style="height: 250px; background-color: #f0f0f0;"></div> <!-- Blank div with background color -->
        <?php endif; ?>
    </div>
</div>

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