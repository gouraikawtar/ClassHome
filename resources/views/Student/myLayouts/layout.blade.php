<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('title')

<!-- Bootsrap CSS link -->
<link rel="stylesheet" href="{{ mix('/css/theme.css') }}">
<!-- Custom CSS link -->
<link rel="stylesheet" href="{{ mix('/css/mesThemes.css') }}">
<!-- Fontawesome CSS link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 fixed-top shadow">
        <div class="container">
            <span class="navbar-brand">ClassHome</span>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a href="{{ route('dashboard') }}" class="nav-link ">My classes</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ route('posts') }}" class="nav-link ">Posts</a>
                    </li>
                    <li class="nav-item px-2 ">
                        <a href="{{ route('homework') }}" class="nav-link ">Homework</a>
                    </li>
                    <li class="nav-item px-2 ">
                        <a href="{{ route('grades') }}" class="nav-link ">Grades</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Welcome Selo
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('profile') }}" class="dropdown-item">
                                <i class="fas fa-user-circle"></i> Profile
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

    <div class="contentClass">
        <!-- HEADER -->
        <header class="py-1 bg-primary text-white">
            <div class="container ">
                <div class="row " id="main_header">
                    <div class="col-md-6 ">
                        <h4>PFE SMI S6</h4>
                    </div>
                </div>
            </div>
        </header>


        <!-- SEARCH -->
        <section id="actions" class="py-3 mb-5 bg-light shadow-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control shadow-sm" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="posts">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">

                        @yield('content')                        
                    
                    </div>
                    <div class="col-md-3 ">
                        <div class="card text-center bg-success text-white mb-3 shadow ">
                            <div class="card-body">
                                <h4>Library</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-folder"></i>
                                </h4>
                                <a href="{{ route('library') }}" class="btn btn-outline-light btn-sm">View</a>
                            </div>
                        </div>
                        <div class="card text-center bg-primary text-white mb-3 shadow">
                            <div class="card-body">
                                <h4>Members</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-user-check"></i>
                                </h4>
                                <a href="{{ route('members') }}" class="btn btn-outline-light btn-sm">View</a>
                            </div>
                        </div>

                        <div class="card text-center bg-warning text-white mb-3 shadow">
                            <div class="card-body">
                                <h4>Groups</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-users"></i>
                                </h4>
                                <a href="{{ route('groups') }}" class="btn btn-outline-light btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- Copyrights footter -->
    <footer id="sticky-footer " class="py-4 bg-dark text-white-50 ">
        <div class="container text-center ">
            <small>Copyright &copy; Home Classroom <script type="text/JavaScript "> document.write(new Date().getFullYear()) </script></small>
        </div>
    </footer>
    <!-- End copyrights footer -->


    <script src="{{ mix('/js/theme.js') }}"></script>

</body>

</html>