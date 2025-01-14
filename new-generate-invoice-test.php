<?php
session_start();
require 'dbcon.php';

if (isset($_GET['type'])) {

    $type = $_GET['type'];
    $quotation_id = mysqli_real_escape_string($con, $_GET['quotation_id']);
}
?>




<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Starter Page | Minia - Minimal Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>


    <script>
        src = "https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
        integrity = "sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
        crossorigin = "anonymous"
        referrerpolicy = "no-referrer" >
    </script>


</head>

<style>
    .photo-section {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .photo-container {
        border: 2px dashed #6c757d;
        padding: 15px;
        border-radius: 8px;
        background-color: #f8f9fa;
        text-align: center;
        position: relative;
    }

    .photo-container div {
        font-size: 14px;
        color: #6c757d;
        margin-top: 10px;
    }

    .photo-container button {
        padding: 10px 20px;
        border: none;
        /* background-color: #007bff; */
        color: #fff;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .photo-container button:hover {
        /* background-color: #0056b3; */
        transform: scale(105%);
    }

    .photo-preview {
        margin-top: 10px;
        text-align: center;
    }

    .photo-preview img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .hidden-input {
        display: none;
    }
</style>

<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.php" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Webmirchi</span>
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Webmirchi</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                        </div>
                    </form>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="search" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">Shawn L.</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="auth-logout.html"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu">Menu</li>

                        <li>
                            <a href="index.php">
                                <i data-feather="home"></i>
                                <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                       
                        <!-- Actions -->
                        <li class="menu-title mt-2" data-key="t-components">Action</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="users"></i>
                                <span data-key="t-tables">Customer</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="customer-register.php" data-key="t-basic-tables">Register Customer</a></li>
                                <li><a href="fetch-customer.php" data-key="t-data-tables">Fetch Customer</a></li>
                                <li><a href="fetch-enquiry.php" data-key="t-data-tables">Customer Enquires</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="users"></i>
                                <span data-key="t-tables">Domain</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="domain-reg.php" data-key="t-basic-tables">Domain Register</a></li>
                                <li><a href="hosting-reg.php" data-key="t-data-tables">Hosting</a></li>
                                <li><a href="ssl-reg.php" data-key="t-data-tables">SSL</a></li>
                                <li><a href="fetch-email-details.php" data-key="t-data-tables">Email</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="users"></i>
                                <span data-key="t-tables">Primary Services</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="quotation-web-master.php" data-key="t-basic-tables">Website Master</a></li>
                                <li><a href="quotation-sales-master.php" data-key="t-data-tables">Sales Master</a></li>
                                <li><a href="quotation-repair-master.php" data-key="t-data-tables">Repair Master</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="users"></i>
                                <span data-key="t-tables">Web Demo</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="web-demo-master.php" data-key="t-basic-tables">Web Demo Master</a></li>
                                <li><a href="category.php" data-key="t-data-tables">Category</a></li>
                                <li><a href="view-demo-list.php" data-key="t-data-tables">View Demo Masters</a></li>
                            </ul>
                        </li>

                        



                    </ul>


                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->


        <?php

        $typeWebsite = "website";
        $typeSales = "sales";
        $typeRepair = "repair";

        if ($type === $typeWebsite) {
            if (isset($_GET['type'])) {


                $query_quotation = "SELECT * FROM quotation_web WHERE quotation_id = '$quotation_id'";
                $query_run_quotation = mysqli_query($con, $query_quotation);
                if (mysqli_num_rows($query_run_quotation) > 0) {
                    $quotation_details = mysqli_fetch_assoc($query_run_quotation);
                    $customer_id = $quotation_details['register_customer_id'];
                }
            }
        ?>
            <div class="main-content">


                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Invoice</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="new-select.php">Invoice Details</a></li>
                                            <li class="breadcrumb-item active">Website Invoice</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>" . $_SESSION['message'] . "
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                unset($_SESSION['message']);
                            }
                            ?>
                            <div class="col-lg-12">

                                <form action="generateInvoice.php" method="post" class="needs-validation" novalidate>
                                    <!-- honorific -->
                                    <input type="hidden" name="register_customer_id" value="<?= $customer_id; ?>">
                                    <input type="hidden" name="quotation_id" value="<?= $quotation_id; ?>">
                                    <input type="hidden" name="title" value="<?= $quotation_details['title']; ?>">


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea name="description" id="editor" readonly><?= $quotation_details['description'] ?></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="mrp">MRP</label>
                                                <input type="number" name="mrp" id="mrp" value="<?= $quotation_details['mrp'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="mrp">Offer Price</label>
                                                <input type="number" name="offerprice" id="offer" value="<?= $quotation_details['offerprice'] ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="domain-name" class="form-label">Domain Name</label>
                                                <input type="text" name="domainName" id="domain" placeholder="Domain Name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label for="reg-date" class="form-label">Domain Register date</label>
                                                <input type="date" name="reg-date" id="reg-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label for="domain-name" class="form-label">Domain Expiry date</label>
                                                <input type="date" name="exp-date" id="exp-date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="domain-name" class="form-label">Company Name</label>
                                                <input type="text" name="companyName" id="domain" placeholder="Company Name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="domain-name" class="form-label">GST number</label>
                                                <input type="text" name="gst" id="domain" placeholder="GST number" class="form-control">
                                            </div>
                                        </div>
                                    </div>




                                    <button class="btn btn-primary" type="submit">Submit</button>

                                </form>
                            </div>
                        </div>
                        <!-- end page title -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



            </div>
        <?php







        } else if ($type === $typeSales) {

            // echo"$quotation_id";
            $query_quotation = "SELECT * FROM quotation_sales WHERE id = '$quotation_id'";
            $query_run_quotation = mysqli_query($con, $query_quotation);
            if (mysqli_num_rows($query_run_quotation) > 0) {
                $quotation_details = mysqli_fetch_assoc($query_run_quotation);
                $customer_id = $quotation_details['register_customer_id'];
            }



        ?>
            <div class="main-content">


                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Invoice Sales</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="fetch-customer.php">Customer Details</a></li>
                                            <li class="breadcrumb-item active">Invoice Sales</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>" . $_SESSION['message'] . "
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                unset($_SESSION['message']);
                            }
                            ?>
                            <div class="col-lg-12">

                                <form action="invoiceGenerationSales.php" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                    <!-- honorific -->
                                    <input type="hidden" name="register_customer_id" value="<?= $customer_id; ?>">
                                    <input type="hidden" name="title" value="<?= $quotation_details['title']; ?>">
                                    <input type="hidden" name="quotation_id" value="<?= $quotation_id; ?>">


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Device Type</label>
                                                <input type="text" name="device" value="<?= $quotation_details['device']; ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea name="description" id="editor">
                                            <?= $quotation_details['description'] ?>
                                        </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="company">Company</label>
                                                <input type="text" name="company" class="form-control" id="company" value="<?= $quotation_details['company']; ?>" required></input>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Can't be empty!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="model">Model</label>
                                                <input type="text" name="model" class="form-control" id="model" value="<?= $quotation_details['model']; ?>" required></input>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Can't be empty!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="model">Serial Number</label>
                                                <input type="text" name="serial_number" class="form-control" id="model" value="<?= $quotation_details['serial_number']; ?>" required></input>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Can't be empty!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="mrp">MRP</label>
                                                <input type="number" name="mrp" id="mrp" value="<?= $quotation_details['mrp']; ?>" class="form-control" required>
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Can't be empty!
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="mrp">Offer Price</label>
                                                <input type="number" name="offerprice" id="offer" value="<?= $quotation_details['offerprice']; ?>" class="form-control" required>
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Can't be empty!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="model">GST number</label>
                                                <input type="text" name="gst" class="form-control" id="gst" placeholder="GST Number"></input>
                                                <!-- <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid first name.
                                            </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="model">Status</label>
                                                <input type="text" name="status" value="Accepted" readonly class="form-control"></input>
                                                <!-- <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid first name.
                                            </div> -->
                                            </div>
                                        </div>
                                    </div>


                                    <button class="btn btn-primary" type="submit">Submit</button>



                                </form>
                            </div>
                        </div>
                        <!-- end page title -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



            </div>
        <?php





        } else if ($type === $typeRepair) {
            $query_quotation = "SELECT * FROM quotation_repair WHERE id = '$quotation_id'";
            $query_run_quotation = mysqli_query($con, $query_quotation);
            if (mysqli_num_rows($query_run_quotation) > 0) {
                $quotation_details = mysqli_fetch_assoc($query_run_quotation);
                $customer_id = $quotation_details['register_customer_id'];
            }
        ?>
            <div class="main-content">


                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Invoice Repair</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="fetch-customer.php">Customer Details</a></li>
                                            <li class="breadcrumb-item active">Invoice Repair</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>" . $_SESSION['message'] . "
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                unset($_SESSION['message']);
                            }
                            ?>
                            <div class="col-lg-12">

                                <form action="invoiceGenerationRepair.php" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                    <!-- honorific -->
                                    <input type="hidden" name="register_customer_id" value="<?= $customer_id; ?>">
                                    <input type="hidden" name="title" value="<?= $quotation_details['title']; ?>">
                                    <input type="hidden" name="quotation_id" value="<?= $quotation_id; ?>">


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Device Type</label>
                                                <input type="text" name="device" class="form-control" value="<?= $quotation_details['device']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea name="description" id="editor"><?= $quotation_details['description'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="company">Company</label>
                                                <input type="text" name="company" class="form-control" value="<?= $quotation_details['company'] ?>" id="company" placeholder="Company"></input>
                                                <!-- <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid first name.
                                        </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="model">Model</label>
                                                <input type="text" name="model" class="form-control" id="model" value="<?= $quotation_details['model'] ?>" placeholder="Model"></input>
                                                <!-- <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid first name.
                                        </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="mrp">MRP</label>
                                                <input type="number" name="mrp" id="mrp" value="<?= $quotation_details['mrp'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="mrp">Offer Price</label>
                                                <input type="number" name="offerprice" id="offer" value="<?= $quotation_details['offerprice'] ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="model">Device condition</label>
                                                <input type="text" name="deviceCondition" class="form-control" id="device-condition" value="<?= $quotation_details['device_condition'] ?>" placeholder="Device Condition"></input>
                                                <!-- <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid first name.
                                        </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="mrp">Delivery Date</label>
                                                <input type="date" name="delivery_date" id="delivery_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="mrp">Delivery Time</label>
                                                <input type="time" name="delivery_time" id="delivery_time" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Status</label>
                                                <input type="text" name="status" value="Accepted" readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="model">GST number</label>
                                                <input type="text" name="gst" class="form-control" id="gst" placeholder="GST Number"></input>
                                                <!-- <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid first name.
                                        </div> -->
                                            </div>
                                        </div>
                                    </div>


                                    <button class="btn btn-primary" type="submit">Submit</button>

                                </form>
                            </div>
                        </div>
                        <!-- end page title -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



            </div>
        <?php





        } else {
            echo "Type is not valid.";
        }

        ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <script>
        CKEDITOR.replace('editor');
    </script>

    <script>
        let cameraOpen = false;

        Webcam.set({
            width: 500,
            height: 390,
            image_format: 'png',
            jpeg_quality: 100
        });

        function toggleCamera() {
            const cameraDiv = document.getElementById("my_camera");
            const toggleBtn = document.getElementById("toggleCameraBtn");

            if (!cameraOpen) {
                Webcam.attach('#my_camera');
                cameraDiv.style.display = "block";
                toggleBtn.innerText = "Close Camera";
                toggleBtn.classList.remove("btn-success");
                toggleBtn.classList.add("btn-danger");
            } else {
                Webcam.reset();
                cameraDiv.style.display = "none";
                toggleBtn.innerText = "Open Camera";
                toggleBtn.classList.remove("btn-danger");
                toggleBtn.classList.add("btn-success");
            }
            cameraOpen = !cameraOpen;
        }

        function takeSnapshot(imageIndex) {
            Webcam.snap(function(dataUri) {
                // Assign the captured data URI to the appropriate hidden input and preview element
                document.getElementById(`image${imageIndex}`).value = dataUri;
                document.getElementById(`photo${imageIndex}`).innerHTML = `<img src="${dataUri}" alt="Captured Image" style="width: 100px;">`;
            });
        }
    </script>



    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>