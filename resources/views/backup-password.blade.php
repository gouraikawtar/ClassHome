<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassHome - Account Backup</title>

    <!-- Bootsrap CSS link -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5" id="pwdBackup">
                    <div class="card-body" id="enterEmail">
                        <h5 class="card-title text-center">Backup your password</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="email" class="form-control" placeholder="Email address" aria-describedby="emailHelp" required autofocus>
                                <label for="email">Email address</label>
                                <small id="emailHelp" class="form-text text-muted">Please enter your email</small>
                            </div>

                            <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit" id="emailDone">Next</button>
                        </form>
                    </div>

                    <div class="card-body" id="enterPhone">
                        <h5 class="card-title text-center">Backup your password</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="tel" id="phone" class="form-control" placeholder="Phone number" aria-describedby="phoneHelp" required autofocus>
                                <label for="phone">Phone number</label>
                                <small id="phoneHelp" class="form-text text-muted">Please enter your phone number</small>
                            </div>

                            <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit" id="phoneDone">Next</button>
                        </form>
                    </div>

                    <div class="card-body" id="enterCode">
                        <h5 class="card-title text-center">Backup your password</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="code" class="form-control" placeholder="Code" aria-describedby="codeHelp" required autofocus>
                                <label for="code">Code</label>
                                <small id="codeHelp" class="form-text text-muted">Please enter the code received by SMS</small>
                            </div>

                            <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit" id="codeDone">Next</button>
                        </form>
                    </div>

                    <div class="card-body" id="setPwd">
                        <h5 class="card-title text-center">Backup your password</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="password" id="pwd" class="form-control" placeholder="New password" aria-describedby="pwdHelp" required autofocus>
                                <label for="pwd">New password</label>
                                <small id="pwdHelp" class="form-text text-muted">Please set up a new password</small>
                            </div>

                            <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit" id="pwdDone">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery link -->
    <script src="vendor/jquery/jquery.slim.js"></script>
    <!-- Bootstrap JS link -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/forgotPassword.js"></script>
    
</body>
</html>