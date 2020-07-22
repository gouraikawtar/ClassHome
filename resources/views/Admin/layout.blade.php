<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootsrap CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/theme.css') }}">
        <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/myCustomTheme.css')}}"> 
        <!-- Fontawesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    @yield('title')

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 shadow">
        <div class="container">
            <a class="navbar-brand">ClassHome</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a href="{{ url('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ url('classes') }}" class="nav-link">Classes</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ url('teachers') }}" class="nav-link">Teachers</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ url('students') }}" class="nav-link">Students</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Admin
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-user-times"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HEADER -->
        @yield('header')
    <!-- END HEADER -->

    <!-- SEARCH -->
    <section id="search" class="py-4 mb-4 bg-light shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ...">
                        <div class="input-group-append">
                            <!-- SEARCH BUTTON --> 
                                @yield('search')
                            <!-- END SEARCH BUTTON --> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SEARCH --> 

    <!-- CONTENT -->    
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @yield('content')
                </div>
                <!------------------------- BOXES---------------------->
                <div class="col-md-3">
                    <div class="card text-center bg-primary text-white mb-3 shadow">
                        <div class="card-body">
                            <h3>Classes</h3>
                            <h4 class="display-4">
                                <i class="fas fa-school"></i> {{ $nbClasses }}
                            </h4>
                            <a href="{{ url('classes') }}" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card text-center bg-success text-white mb-3 shadow">
                        <div class="card-body">
                            <h3>Teachers</h3>
                            <h4 class="display-4">
                                <i class="fas fa-chalkboard-teacher"></i> {{ $nbTeachers }}
                            </h4>
                            <a href="{{ url('teachers') }}" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card text-center bg-warning text-white mb-3 shadow">
                        <div class="card-body">
                            <h3>Students</h3>
                            <h4 class="display-4">
                                <i class="fas fa-user-graduate"></i> {{ $nbStudents }}
                            </h4>
                            <a href="{{ url('students') }}" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                </div>
                <!-------------------------END BOXES---------------------->
            </div>
        </div>
    </section>
    <!-- END CONTENT --> 

    <!-- FOOTER -->
    <footer id="sticky-footer " class="py-4 bg-dark text-white-50 ">
        <div class="container text-center ">
            <small>Copyright &copy; Home Classroom <script type="text/JavaScript "> document.write(new Date().getFullYear()) </script></small>
        </div>
    </footer>
    <!-- END FOOTER -->


    <!-- Jquery link -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    
    <!-- Popper link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Bootstrap JS link -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>

