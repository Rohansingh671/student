<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Preskool - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Preskool Admin Template</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/feather.css">

    <link rel="stylesheet" href="css/tabler-icons.css">

    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/select2.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="container-fuild">
            <div class="login-wrapper w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
                <div class="row">
                    <div class="col-lg-6">
                        <div
                            class="d-lg-flex align-items-center justify-content-center bg-light-300 d-lg-block d-none flex-wrap vh-100 overflowy-auto bg-01">
                            <div>
                                <img src="images/authentication-06.svg" alt="Img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                            <div class="col-md-8 mx-auto p-4">
                                <form method="POST" action="php/register_sms.php" data-parsley-validate>
                                    <div>
                                        <div class=" mx-auto mb-5 text-center">
                                            <img src="images/authentication-logo.svg" class="img-fluid" alt="Logo">
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-4">
                                                <div class=" mb-4">
                                                    <h2 class="mb-2">Register</h2>
                                                    <p class="mb-0">Please enter your details to sign up</p>
                                                </div>
                                                <div class="mt-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center flex-wrap">
                                                        <div class="text-center me-2 flex-fill">
                                                            <a href="javascript:void(0);"
                                                                class="bg-primary br-10 p-2 btn btn-primary  d-flex align-items-center justify-content-center">
                                                                <img class="img-fluid m-1"
                                                                    src="images/facebook-logo.svg" alt="Facebook">
                                                            </a>
                                                        </div>
                                                        <div class="text-center me-2 flex-fill">
                                                            <a href="javascript:void(0);"
                                                                class=" br-10 p-2 btn btn-outline-light  d-flex align-items-center justify-content-center">
                                                                <img class="img-fluid  m-1" src="images/google-logo.svg"
                                                                    alt="Facebook">
                                                            </a>
                                                        </div>
                                                        <div class="text-center flex-fill">
                                                            <a href="javascript:void(0);"
                                                                class="bg-dark br-10 p-2 btn btn-dark d-flex align-items-center justify-content-center">
                                                                <img class="img-fluid  m-1" src="images/apple-logo.svg"
                                                                    alt="Apple">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="login-or">
                                                        <span class="span-or">Or</span>
                                                    </div>
                                                    <div class="mb-3 ">
                                                        <label class="form-label">Name</label>
                                                        <div class="input-icon mb-3 position-relative">
                                                            <span class="input-icon-addon">
                                                                <i class="ti ti-user"></i>
                                                            </span>
                                                            <input type="text" value="" class="form-control" name="smsUsername" data-parsley-required="true" data-parsley-error-message="Username is required.">
                                                        </div>
                                                        <label class="form-label">Email Address</label>
                                                        <div class="input-icon mb-3 position-relative">
                                                            <span class="input-icon-addon">
                                                                <i class="ti ti-mail"></i>
                                                            </span>
                                                            <input type="text" value="" class="form-control" name="smsEmail" data-parsley-required="true" data-parsley-error-message="Email is required.">
                                                        </div>
                                                        <label class="form-label">Password</label>
                                                        <div class="pass-group mb-3">
                                                            <input type="password" class="pass-input form-control" name="smsPassword" data-parsley-required="true" data-parsley-error-message="Password is required.">
                                                            <span class="ti toggle-password ti-eye-off"></span>
                                                        </div>
                                                        <label class="form-label">Confirm Password</label>
                                                        <div class="pass-group">
                                                            <input type="password" class="pass-input form-control" name="smsConfirmPassword" data-parsley-required="true" data-parsley-error-message="Confirm Password is required.">
                                                            <span class="ti toggle-password ti-eye-off"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-wrap form-wrap-checkbox mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="form-check form-check-md mb-0 me-2">
                                                                <input class="form-check-input mt-0" type="checkbox">
                                                            </div>
                                                            <h6 class="fw-normal text-dark mb-0">I Agree to<a href="#"
                                                                    class="hover-a "> Terms &amp; Privacy</a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                                </div>
                                                <div class="text-center">
                                                    <h6 class="fw-normal text-dark mb-0">Already have an account?<a
                                                            href="login-2.php" class="hover-a "> Sign In</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <p class="mb-0 ">Copyright © 2024 - Preskool</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.7.1.min.js" type="d673d9e37cb0977917711998-text/javascript"></script>

    <script src="js/bootstrap.bundle.min.js" type="d673d9e37cb0977917711998-text/javascript"></script>

    <script src="js/feather.min.js" type="d673d9e37cb0977917711998-text/javascript"></script>

    <script src="js/jquery.slimscroll.min.js" type="d673d9e37cb0977917711998-text/javascript"></script>

    <script src="js/select2.min.js" type="d673d9e37cb0977917711998-text/javascript"></script>

    <script src="js/script.js" type="d673d9e37cb0977917711998-text/javascript"></script>
    <script src="js/rocket-loader.min.js" data-cf-settings="d673d9e37cb0977917711998-|49" defer=""></script>
</body>

</html>