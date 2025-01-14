<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    require 'dbcon.php';
    session_start();
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        function saveBase64Image($base64Image, $path)
        {
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
            // if (!$image1Path || !$image2Path || !$image3Path) {
            //     die("Error uploading images. Please try again.");
            // }

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
                    $_SESSION['message'] = "Record inserted successfully!";
                    // header("Location: customer-register.php");
                } else {
                    echo "Error: " . $stmt->error;
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
            } else {
                echo "Error preparing statement: " . $con->error;
            }
        } else {
            echo "Invalid request method.";
        }

        // Close connection
        $con->close();
    }

    ?>
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
        <a style="text-decoration: none; color:white;" href="fetch-customer.php?id=<?= $customer['register_customer_id']; ?>">Quotation</a>
    </div>
    <!-- customer details -->
    <div class="customer">
        <table>
            <tr>
                <td class="label">Customer Name:</td>
                <td><?= $customer['first_name'] . " " . $customer['last_name']; ?></td>
                <td class="label">Date:</td>
                <td><?php echo date("l, F j, Y"); ?></td>
            </tr>
            <tr>
                <td class="label">Address:</td>
                <td colspan="3"><?= $customer['street'] . " " . $customer['area'] . " " . $customer['city'] . " " . $customer['district'] . " " . $customer['state'] . " " . $customer['country'] . " " . $customer['area'] . " " . $customer['pincode']; ?></td>
            </tr>
            <tr>
                <td class="label">Mobile-1:</td>
                <td><?= $customer['mobile_number'] ?></td>
                <td class="label">Mobile-2:</td>
                <td><?= $customer['mobile_number'] ?></td>
            </tr>
            <tr>
                <td class="label">Email:</td>
                <td colspan="3"><?= $customer['email'] ?></td>
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
                <td colspan="4"><?php echo '<p>' . $description . '</p>' ?></td>
            </tr>
            <tr>
                <td class="header">MRP:</td>
                <td><b><?= $mrp ?>/-</b></td>
                <td class="header">OFFER PRICE:</td>
                <td><b><?= $offerprice ?>/-</b></td>
            </tr>
            <tr>
                <!-- <td colspan="2" class="terms"><img src="$image1Path" alt=""></td>
                <td class="terms"></td>
                <td class="terms"></td> -->
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