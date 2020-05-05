<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassHome - Login</title>

    <!-- Bootsrap CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/theme.css')}}">
    <!-- Fontawesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/formsTheme.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-link"><i class="fas fa-arrow-circle-left"></i> Back</button>
                        <h5 class="card-title text-center">Welcome back!</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="emailLogin" class="form-control" placeholder="Email address" required autofocus>
                                <label for="emailLogin">Email address</label>
                            </div>
    
                            <div class="form-label-group">
                                <input type="password" id="pwdLogin" class="form-control" placeholder="Password" required>
                                <label for="pwdLogin">Password</label>
                            </div>

                            <!-- <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div> -->
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="sign_in">Sign in</button>
                            <button class="btn btn-lg btn-link btn-block text-uppercase" type="submit" id="forgotPwd">Forgot Password?</button>
                            <hr class="my-4">
                            <button type="button" class="btn btn-lg btn-info btn-block text-uppercase">Not member yet? Sign up</button>
                            <!-- <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->
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
    {{-- <script src="js/login.js"></script> --}}
    
</body>
</html>