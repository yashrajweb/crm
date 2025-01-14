<?php
    require 'dbcon.php';
    session_start();
    if(isset($_GET['id'])){
        $customer_id = mysqli_real_escape_string($con,$_GET['id']);
        $preview_id = mysqli_real_escape_string($con,$_GET['preview_id']);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Email Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awsome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        body {
            background-color: #f5f5f5;  
        }
        .profile-card {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .profile-header {
            background-color: #5a67d8;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .profile-header .profile-icon {
            font-size: 60px;
            margin-bottom: 10px;
        }
        .profile-header .profile-name {
            font-size: 24px;
            font-weight: 600;
        }
        .profile-body {
            padding: 20px;
        }
        .profile-body h5 {
            font-size: 20px;
            font-weight: 600;
            color: #5a67d8;
            margin-bottom: 20px;
            text-align: center;
        }
        .details-table {
            margin-top: 20px;
        }
        .details-table th, .details-table td {
            font-size: 14px;
            padding: 8px 12px;
            text-align: left;
        }
        .details-table th {
            background-color: #f0f0f0;
            font-weight: 600;
        }
    </style>
</head>
<body>
<?php
    // Fetch email details
    $query_email = "SELECT * FROM hosting WHERE id = '$preview_id'";
    $query_email_run = mysqli_query($con, $query_email);

    if(mysqli_num_rows($query_email_run) > 0) {
        $hosting_details = mysqli_fetch_assoc($query_email_run);
    } else {
        echo "No email details found!";
        exit; // Stop further processing if no email data is found
    }

    // Fetch customer details
    $query_customer = "SELECT * FROM register_customer WHERE register_customer_id = '$customer_id'";
    $query_customer_run = mysqli_query($con, $query_customer);

    if(mysqli_num_rows($query_customer_run) > 0) {
        $customer = mysqli_fetch_assoc($query_customer_run);
    } else {
        echo "No customer details found!";
        exit; // Stop further processing if no customer data is found
    }
?>

    
    <div class="profile-card">
        <div class="btn">
            <a style="background-color: #5a67d8;" class="btn btn-primary" href="hosting-reg.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Back</a>
        </div>
        <div class="profile-header">
            <div class="profile-icon">
                <i class="bi bi-person-circle"></i> <!-- Placeholder icon -->
            </div>
            <div class="profile-name"><?=$customer['first_name']?> <?=$customer['last_name']?></div>
        </div>
        <div class="profile-body">
            <h5>Customer Email Configuration Details</h5>
            <table class="table details-table">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td><?=$hosting_details['title']?></td>
                    </tr>
                    <tr>
                        <td>Domain Name</td>
                        <td><?=$hosting_details['domain']?></td>
                    </tr>
                    <tr>
                        <td>Service Provider</td>
                        <td><?=$hosting_details['service_provider']?></td>
                    </tr>
                    <tr>
                        <td>Register Date</td>
                        <td><?=$hosting_details['reg_date']?></td>
                    </tr>
                    <tr>
                        <td>Expiry Date</td>
                        <td><?=$hosting_details['exp_date']?></td>
                    </tr>
                    <tr>
                        <td>MRP</td>
                        <td><?=$hosting_details['mrp']?></td>
                    </tr>
                    <tr>
                        <td>Offer Price</td>
                        <td><?=$hosting_details['offerprice']?></td>
                    </tr>
                    <tr>
                        <td>Activity Status</td>
                        <td><?=$hosting_details['status']?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
