<?php
session_start();
require 'dbcon.php'
?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minia/layouts-lts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Dec 2024 12:07:01 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Webmirchi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- font awsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<style>
    /* For Webkit browsers (Chrome, Edge, Safari) */
    ::-webkit-scrollbar {
        width: 8px;
        /* Width of vertical scrollbar */
        height: 8px;
        /* Height of horizontal scrollbar */
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        /* Track color */
        border-radius: 10px;
        /* Rounded corners for track */
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        /* Thumb color */
        border-radius: 10px;
        /* Rounded corners for thumb */
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
        /* Thumb color on hover */
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
                        <a href="index.html" class="logo logo-dark">
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



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ===============================================    =============== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- <a href="new-invoice.php" class="btn btn-primary">Back</a> -->

                    <div class="row">
                        <div class="col-12">


                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <?php
                                        if (isset($_GET['id'])) {
                                            $customer_id = mysqli_real_escape_string($con, $_GET['id']);
                                            $query = "SELECT * FROM register_customer WHERE register_customer_id='$customer_id'";
                                            $query_run = mysqli_query($con, $query);

                                            if (mysqli_num_rows($query_run) > 0) {
                                                $customer = mysqli_fetch_assoc($query_run);
                                            } else {
                                                echo "<h5 class='text-center text-danger'>No records found</h5>";
                                                exit;
                                            }

                                            $query1 = "SELECT * FROM invoice_web WHERE register_customer_id='$customer_id'";
                                            $query_run1 = mysqli_query($con, $query1);

                                            if (mysqli_num_rows($query_run1) > 0) {
                                                $invoice = mysqli_fetch_assoc($query_run1);
                                            } else {
                                                echo "<h5 class='text-center text-danger'>No records found</h5>";
                                                exit;
                                            }
                                        }
                                        ?>

                                        <div class="container d-flex justify-content-center align-items-center">
                                            <div class="card shadow-lg border-0 rounded-4 w-100">
                                                <div class="card-header bg-primary text-white text-center">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <i class="fa-solid fa-user" style="font-size: 4rem;"></i>
                                                        <h5 class="mt-3 text-light"><?= $customer['honorific'] ?> <?= $customer['first_name'] ?> <?= $customer['last_name'] ?></h5>
                                                    </div>
                                                </div>
                                                <div class="card-body d-flex flex-column align-items-center">
                                                    <h4 class="card-title text-center text-primary mb-3">Customer Details</h4>
                                                    <div class="row text-start w-100">
                                                        <div class="row ">
                                                            <div class="col-sm-6 col-12">
                                                                <p><strong>Email:</strong> <?= $customer['email'] ?></p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 text-end">
                                                                <p><strong>Mobile 1:</strong> <?= $customer['mobile_number'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-12">
                                                                <p><strong>Mobile 2:</strong> <?= $customer['alternate_number'] ?></p>
                                                            </div>
                                                            <div class="col-sm-6 col-12 text-end">
                                                                <p><strong>Whatsapp:</strong> <?= $customer['whatsapp_number'] ?></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h4 class="card-title text-center text-primary mb-3">Invoice: <?= $invoice['package'] ?></h4>

                                                        
                                                        <div class="row">
                                                            <div class="col-sm-6 col-12">
                                                                <p><strong>Description</strong></p>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <p style="display: inline;"><?= $invoice['description'] ?></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-12">
                                                                <p><strong>MRP:</strong> <?= $invoice['mrp'] ?></p>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <p><strong>Offer Price:</strong> <?= $invoice['offer_price'] ?></p>
                                                            </div>
                                                        </div>
                                                        <h4 class="card-title text-end text-warning mb-3">Invoice Date: <?= $invoice['gene_date'] ?></h4>

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end cardaa -->

                    </div> <!-- end row -->


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>

    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

<!-- Mirrored from themesbrand.com/minia/layouts-lts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Dec 2024 12:07:01 GMT -->

</html>