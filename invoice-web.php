<?php
    session_start();
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

</head>

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



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <?php
        require 'dbcon.php';
        if (isset($_GET['id'])) {
            $customer_id = mysqli_real_escape_string($con, $_GET['id']);
        }

        $query = "SELECT * FROM quotation_web where register_customer_id='$customer_id'";
        $query_run = mysqli_query($con, $query);

        ?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Invoice Website</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Invoice Website</li>
                                    </ol>
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
                                    <form action="invoiceGeneration.php" method="post" class="needs-validation" novalidate>
                                        <!-- honorific -->
                                        <input type="hidden" name="register_customer_id" value="<?= $customer_id; ?>">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Offer Plan</label>
                                                    <select class="form-select" name="offerPlan">
                                                        <?php
                                                        foreach ($query_run as $master) {
                                                        ?>
                                                            <option><?= $master['title'] ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                    <div class="valid-feedback">
                                                        looks good!
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
                                                    <label class="form-label" for="description">Description</label>
                                                    <textarea name="description" class="form-control" id="desc" placeholder="Description" required></textarea>
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
                                                    <?php
                                                    foreach ($query_run as $master) {
                                                    ?>
                                                        <input type="number" name="mrp" id="mrp" value="<?= $master['mrp'] ?>" class="form-control" required>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="mrp">Offer Price</label>
                                                    <?php
                                                    foreach ($query_run as $master) {
                                                    ?>
                                                        <input type="number" name="offerprice" id="mrp" value="<?= $master['offerprice'] ?>" class="form-control" required>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="model">Domain Name</label>
                                                    <input type="text" name="domain_name" class="form-control" id="domain_name" placeholder="Domain Name" required></input>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please provide a Domain Name.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="mrp">Domain Expiry Date</label>
                                                    <input type="date" name="domain_exp_date" class="form-control" id="domain_exp_date" required></input>
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
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="companyName" id="title" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="gst">GST number (If any)</label>
                                                    <input type="text" name="gst" id="gst" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <button class="btn btn-primary" name="master-btn" type="submit">Generate Invoice</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->




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