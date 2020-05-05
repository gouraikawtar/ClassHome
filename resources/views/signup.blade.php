<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ClassHome - Sign Up</title>

    <!-- Bootsrap CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/theme.css')}}">
    <!-- Fontawesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/formsTheme.css')}}">
</head>
<body>
    <div class="container">
        <div class="row" id="signupForm">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-link"><i class="fas fa-arrow-circle-left"></i> Back</button>
                        <h5 class="card-title text-center">Join Us Now</h5>
                        <form class="form-signin">
                            <div class="form-group" id="role">
                                <label for="role">Sign up as</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="teacher" name="role" class="custom-control-input">
                                    <label class="custom-control-label" for="teacher">Teacher</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="student" name="role" class="custom-control-input">
                                    <label class="custom-control-label" for="student">Student</label>
                                </div>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="fname" class="form-control" placeholder="First name">
                                <label for="fname">First name</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="sname" class="form-control" placeholder="Surname">
                                <label for="sname">Surname</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="email" class="form-control" placeholder="Email address">
                                <label for="email">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="tel" id="phone" class="form-control" placeholder="Phone number">
                                <label for="phone">Phone number</label>
                            </div>
    
                            <div class="form-label-group">
                                <input type="password" id="pwd" class="form-control" placeholder="Password">
                                <label for="pwd">Password</label>
                            </div>

                            <div class="form-group" id="gender">
                                <label for="gender">Gender</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="female" name="gender" class="custom-control-input">
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="male" name="gender" class="custom-control-input">
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                            </div>

                            <!-- <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div> -->
                            <button class="btn btn-lg btn-success btn-block text-uppercase" type="button" id="signup">Sign up</button>
                            {{-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button> --}}
                            <hr class="my-4">
                            <button type="button" class="btn btn-lg btn-info btn-block text-uppercase">Already member? Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery link -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.slim.js"></script>
    <!-- Popper link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Bootstrap JS link -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/signup.js"></script>
</body>
</html>