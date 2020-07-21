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
<link rel="stylesheet" href="{{ mix('/css/myCustomTheme.css') }}">
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
                    <li class="nav-item px-2 @if ($active == 'myclasses') active @endif">
                        <a href="{{ route('myclasses.index') }}" class="nav-link ">My Classes</a>
                    </li>
                    <li class="nav-item px-2 @if ($active == 'posts') active @endif">
                        <a href="{{ route('myclasses.posts.index', $teachingClass->id) }}" class="nav-link ">Posts</a>
                    </li>
                    <li class="nav-item px-2 @if ($active == 'homeworks') active @endif">
                        <a href="{{route('myclasses.homeworks.index', $teachingClass->id)}}" class="nav-link ">Homework</a>
                    </li>
                    <li class="nav-item px-2 @if ($active == 'contributions') active @endif">
                        <a href="{{ route('myclasses.contributions.index', $teachingClass->id) }}" class="nav-link">Contibutions</a>
                    </li>
                    <li class="nav-item px-2 @if ($active == 'grades') active @endif">
                        <a href="{{ route('grades',$teachingClass->id) }}" class="nav-link">Grades</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Welcome {{ Auth::user()->first_name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{route('profile', Auth::user()->id)}}" class="dropdown-item">
                                <i class="fas fa-user-circle"></i> Profile Settings
                            </a>
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

    <div class="contentClass">
        <!-- HEADER -->
        <header class="py-1 bg-primary text-white">
            <div class="container ">
                <div class="row " id="main_header">
                    <div class="col-md-6 ">
                        <h4>{{$teachingClass->name}}</h4>
                    </div>
                </div>
            </div>
        </header>


        <!-- SEARCH -->
        <section id="actions" class="py-3 mb-5 bg-light shadow-sm">
            <div class="container">
                <div class="row">
                    @yield('actions')
                </div>
            </div>
        </section>

        <section id="posts">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9">

                        @yield('content')                        
                    
                    </div>
                    <div class="col-md-3 ">
                        <div class="card text-center bg-success text-white mb-3 shadow @if ($active == 'library') active @endif">
                            <div class="card-body">
                                <h4>Library</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-folder"></i>
                                </h4>
                                <a href="{{ route('myclasses.library.index',$teachingClass->id) }}" class="btn btn-outline-light btn-sm">View</a>
                            </div>
                        </div>
                        <div class="card text-center bg-primary text-white mb-3 shadow @if ($active == 'members') active @endif">
                            <div class="card-body">
                                <h4>Members</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-user-check"></i>
                                </h4>
                                <a href="{{ route('myclasses.members.index', $teachingClass->id) }}" class="btn btn-outline-light btn-sm">View</a>
                            </div>
                        </div>

                        <div class="card text-center bg-warning text-white mb-3 shadow @if ($active == 'groups') active @endif">
                            <div class="card-body">
                                <h4>Groups</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-users"></i>
                                </h4>
                                <a href="{{ route('myclasses.groups.index', $teachingClass->id) }}" class="btn btn-outline-light btn-sm">View</a>
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

    <!-- SEND EMAIL MODAL -->
    @yield('SendEmailModal')
    <!---------------------->
    
    <!-- Jquery link -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    
    <!-- Popper link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Bootstrap JS link -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    @yield('custom-js')

</body>

</html>