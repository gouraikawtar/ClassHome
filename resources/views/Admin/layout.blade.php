<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootsrap CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/theme.css') }}">
        <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/mesThemes.css') }}">
        <!-- Fontawesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    @yield('title')

</head>

<body style="zoom: 90%">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 shadow">
        <div class="container">
            <a class="navbar-brand">ClassHome</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ route('classes') }}" class="nav-link">Classes</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ route('teachers') }}" class="nav-link">Teachers</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ route('students') }}" class="nav-link">Students</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Welcome Selo
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('settings') }}" class="dropdown-item">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-times"></i> Logout
                            </a>
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
    @yield('content')
    <!-- END CONTENT --> 

    <!-- FOOTER -->
    <footer id="sticky-footer " class="py-4 bg-dark text-white-50 ">
        <div class="container text-center ">
            <small>Copyright &copy; Home Classroom <script type="text/JavaScript "> document.write(new Date().getFullYear()) </script></small>
        </div>
    </footer>
    <!-- END FOOTER -->

    <script src="{{ mix('/js/theme.js') }}"></script>

</body>

</html>

