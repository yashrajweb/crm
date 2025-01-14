<?php
require 'dbcon.php';
session_start();
?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minia/layouts-lts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Dec 2024 12:07:01 GMT -->

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
    <link rel="stylesheet" href="/assets/css/mycss.css">

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
                            </ul>
                        </li>

                        <!-- <li class="menu-title mt-2" data-key="t-components">Elements</li> -->

                        <!-- <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="briefcase"></i>
                                <span data-key="t-components">Components</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-alerts.html" data-key="t-alerts">Alerts</a></li>
                                <li><a href="ui-buttons.html" data-key="t-buttons">Buttons</a></li>
                                <li><a href="ui-cards.html" data-key="t-cards">Cards</a></li>
                                <li><a href="ui-carousel.html" data-key="t-carousel">Carousel</a></li>
                                <li><a href="ui-dropdowns.html" data-key="t-dropdowns">Dropdowns</a></li>
                                <li><a href="ui-grid.html" data-key="t-grid">Grid</a></li>
                                <li><a href="ui-images.html" data-key="t-images">Images</a></li>
                                <li><a href="ui-modals.html" data-key="t-modals">Modals</a></li>
                                <li><a href="ui-offcanvas.html" data-key="t-offcanvas">Offcanvas</a></li>
                                <li><a href="ui-progressbars.html" data-key="t-progress-bars">Progress Bars</a></li>
                                <li><a href="ui-placeholders.html" data-key="t-progress-bars">Placeholders</a></li>
                                <li><a href="ui-tabs-accordions.html" data-key="t-tabs-accordions">Tabs & Accordions</a></li>
                                <li><a href="ui-typography.html" data-key="t-typography">Typography</a></li>
                                <li><a href="ui-toasts.html" data-key="t-typography">Toasts</a></li>
                                <li><a href="ui-video.html" data-key="t-video">Video</a></li>
                                <li><a href="ui-general.html" data-key="t-general">General</a></li>
                                <li><a href="ui-colors.html" data-key="t-colors">Colors</a></li>
                                <li><a href="ui-utilities.html" data-key="t-colors">Utilities</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="gift"></i>
                                <span data-key="t-ui-elements">Extended</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                                <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>
                                <li><a href="extended-sweet-alert.html" data-key="t-sweet-alert">SweetAlert 2</a></li>
                                <li><a href="extended-session-timeout.html" data-key="t-session-timeout">Session Timeout</a></li>
                                <li><a href="extended-rating.html" data-key="t-rating">Rating</a></li>
                                <li><a href="extended-notifications.html" data-key="t-notifications">Notifications</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i data-feather="box"></i>
                                <span class="badge rounded-pill badge-soft-danger  text-danger float-end">7</span>
                                <span data-key="t-forms">Forms</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="form-elements.html" data-key="t-form-elements">Basic Elements</a></li>
                                <li><a href="form-validation.html" data-key="t-form-validation">Validation</a></li>
                                <li><a href="form-advanced.html" data-key="t-form-advanced">Advanced Plugins</a></li>
                                <li><a href="form-editors.html" data-key="t-form-editors">Editors</a></li>
                                <li><a href="form-uploads.html" data-key="t-form-upload">File Upload</a></li>
                                <li><a href="form-wizard.html" data-key="t-form-wizard">Wizard</a></li>
                                <li><a href="form-mask.html" data-key="t-form-mask">Mask</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="sliders"></i>
                                <span data-key="t-tables">Tables</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="tables-basic.html" data-key="t-basic-tables">Bootstrap Basic</a></li>
                                <li><a href="tables-datatable.html" data-key="t-data-tables">DataTables</a></li>
                                <li><a href="tables-responsive.html" data-key="t-responsive-table">Responsive</a></li>
                                <li><a href="tables-editable.html" data-key="t-editable-table">Editable</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="pie-chart"></i>
                                <span data-key="t-charts">Charts</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="charts-apex.html" data-key="t-apex-charts">Apexcharts</a></li>
                                <li><a href="charts-echart.html" data-key="t-e-charts">Echarts</a></li>
                                <li><a href="charts-chartjs.html" data-key="t-chartjs-charts">Chartjs</a></li>
                                <li><a href="charts-knob.html" data-key="t-knob-charts">Jquery Knob</a></li>
                                <li><a href="charts-sparkline.html" data-key="t-sparkline-charts">Sparkline</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="cpu"></i>
                                <span data-key="t-icons">Icons</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="icons-boxicons.html" data-key="t-boxicons">Boxicons</a></li>
                                <li><a href="icons-materialdesign.html" data-key="t-material-design">Material Design</a></li>
                                <li><a href="icons-dripicons.html" data-key="t-dripicons">Dripicons</a></li>
                                <li><a href="icons-fontawesome.html" data-key="t-font-awesome">Font Awesome 5</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="map"></i>
                                <span data-key="t-maps">Maps</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="maps-google.html" data-key="t-g-maps">Google</a></li>
                                <li><a href="maps-vector.html" data-key="t-v-maps">Vector</a></li>
                                <li><a href="maps-leaflet.html" data-key="t-l-maps">Leaflet</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="share-2"></i>
                                <span data-key="t-multi-level">Multi Level</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-1-1">Level 1.1</a></li>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Level 1.2</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="javascript: void(0);" data-key="t-level-2-1">Level 2.1</a></li>
                                        <li><a href="javascript: void(0);" data-key="t-level-2-2">Level 2.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->



                    </ul>


                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
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
                    }
                    ?>

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Personal Details</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                        <li class="breadcrumb-item active">Register Customer</li>
                                    </ol>
                                </div>



                            </div>
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>" . $_SESSION['message'] . "
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>";
                                unset($_SESSION['message']);
                            }
                            ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="customer-edit_code.php" method="post" class="needs-validation" novalidate>
                                        <!-- honorific -->
                                         <input type="hidden" name="register_customer_id" id="" value="<?= $customer_id ?>">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Honorific</label>
                                                    <select class="form-select" name="honorific">
                                                        <option>Mr.</option>
                                                        <option>Mrs.</option>
                                                        <option>Miss</option>
                                                        <option>Sir</option>
                                                        <option>Dr.</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="firstname">First name</label>
                                                    <input type="text" class="form-control" id="firstname" placeholder="First name" name="fname" value="<?= $customer['first_name'] ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid first name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="lastname">Last name</label>
                                                    <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lname" value="<?= $customer['last_name'] ?>"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid last name.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- honorific end -->

                                        <!-- name start -->
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-12">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="xyz@gmail.com" id="email" value="<?= $customer['email'] ?>" required>
                                                <div class="valid-feedback">
                                                    looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter valid email address!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 g-3">
                                            <div class="col-md-3 col-12">
                                                <label class="form-label" for="mobile-1">Mobile Number</label>
                                                <input type="tel" name="number-1" class="form-control" id="number-1" placeholder="00000 00000" value="<?= $customer['mobile_number'] ?>" required>
                                                <div class="valid-feedback">
                                                    looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide valid Mobile number!
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <label class="form-label" for="mobile-1">Alternate Number</label>
                                                <input type="tel" name="number-2" class="form-control" id="number-2" placeholder="00000 00000" value="<?= $customer['alternate_number'] ?>">
                                                <div class="valid-feedback">
                                                    looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide valid Mobile number!
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <label class="form-label" for="mobile-1">Whatsapp Number</label>
                                                <input type="tel" name="whatsapp" class="form-control" id="whatsapp" placeholder="00000 00000" required value="<?= $customer['whatsapp_number'] ?>">
                                                <div class="valid-feedback">
                                                    looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide valid Whatsapp number!
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-3">

                                        <div class="row mb-3">
                                            <h4 class="mb-3 font-size-18">Address</h4>
                                            <div class="col-md-6 col-12">
                                                <label for="Street" class="form-label">Street</label>
                                                <input type="text" name="street" class="form-control" id="street" placeholder="Any street" value="<?= $customer['street'] ?>">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="Area" class="form-label">Area</label>
                                                <input type="text" name="area" class="form-control" id="area" placeholder="Area / Location" value="<?= $customer['area'] ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-12">
                                                <label for="city" class="form-label">City / Town</label>
                                                <input type="text" name="city" class="form-control" id="city" placeholder="City / Town" value="<?= $customer['city'] ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-12">
                                                <label for="district" class="form-label">District</label>
                                                <input type="text" name="district" class="form-control" id="district" placeholder="District" value="<?= $customer['district'] ?>">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="state" class="form-label">State</label>
                                                <input type="text" name="state" class="form-control" id="state" placeholder="State" value="<?= $customer['state'] ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-12">
                                                <label for="country" class="form-label">Country</label>
                                                <input type="text" name="country" class="form-control" id="country" placeholder="Country" value="<?= $customer['country'] ?>">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="pincode" class="form-label">Pincode</label>
                                                <input type="number" name="pincode" class="form-control" id="pincode" placeholder="Pincode" value="<?= $customer['pincode'] ?>">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <script>
        // Bootstrap Client-side Validation Script
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

<!-- Mirrored from themesbrand.com/minia/layouts-lts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Dec 2024 12:07:01 GMT -->

</html>