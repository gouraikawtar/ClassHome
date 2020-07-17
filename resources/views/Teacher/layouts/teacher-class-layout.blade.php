<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('title')

    <!-- Bootsrap CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/theme.css')}}">
    <!-- Fontawesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ mix('/css/myCustomTheme.css')}}"> 

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 fixed-top">
        <div class="container">
            <span class="navbar-brand">ClassHome</span>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a href="{{ route('myclasses.index') }}" class="nav-link ">My Classes</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ route('myclasses.posts.index', $teachingClass->id) }}" class="nav-link ">Posts</a>
                    </li>
                    <li class="nav-item px-2 ">
                        <a href="{{route('myclasses.homeworks.index', $teachingClass->id)}}" class="nav-link ">Homeworks</a>
                    </li>
                    <li class="nav-item px-2 ">
                        <a href="{{ route('grades',$teachingClass->id) }}" class="nav-link">Grades</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ route('myclasses.contributions.index', $teachingClass->id) }}" class="nav-link">Contibutions</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Welcome {{ Auth::user()->first_name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('profile', Auth::user()->id ) }}" class="dropdown-item">
                                <i class="fas fa-user-circle"></i> Profile Settings
                            </a>
                            <a href="{{ route('myclasses.edit',$teachingClass->id) }}" class="dropdown-item">
                                <i class="fas fa-cog"></i> Class Settings
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
    <!-- ./NAVBAR -->

    <!-- PAGE CONTENT -->
    <div class="contentClass">
        <!-- HEADER -->
        <header class="py-1 bg-primary text-white">
            <div class="container ">
                <div class="row" id="main_header">
                    <div class="col-md-6">
                        <h4>{{$teachingClass->name}}</h4>
                    </div>
                    <div class="col-md-3 offset-md-3">
                        <button class="btn btn-warning btn-block shadow" data-toggle="modal" data-target="#showCode" >
                            Class access code
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <!-- ./HEADER -->

        <!-- ACTIONS -->
        <section id="actions" class="py-4 mb-4 bg-light shadow-sm">
            <div class="container">
                <div class="row">
                    @yield('actions')
                </div>
            </div>
        </section>
        <!-- ./ACTIONS -->

        <!-- MAIN CONTENT -->
        <section id="posts">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- CUSTOM CONTENT -->
                    @yield('content')
                    <!-- ./CUSTOM CONTENT -->

                    <!-- BOXES -->
                    <div class="col-md-3 ">
                        <div class="card text-center bg-success text-white mb-3 shadow">
                            <div class="card-body ">
                                <h3>Library</h3>
                                <h4 class="display-4 ">
                                    <i class="fas fa-folder "></i>
                                </h4>
                                <a href="{{ url('library') }}" class="btn btn-outline-light btn-sm ">View</a>
                            </div>
                        </div>

                        <div class="card text-center bg-primary text-white mb-3 shadow ">
                            <div class="card-body ">
                                <h3>Members</h3>
                                <h4 class="display-4 ">
                                    <i class="fas fa-user-check"></i>
                                </h4>
                                <a href="{{ route('myclasses.members.index', $teachingClass->id) }}" class="btn btn-outline-light btn-sm ">View</a>
                            </div>
                        </div>

                        <div class="card text-center bg-warning text-white mb-3 shadow">
                            <div class="card-body ">
                                <h3>Groups</h3>
                                <h4 class="display-4 ">
                                    <i class="fas fa-users "></i>
                                </h4>
                                <a href="{{ route('myclasses.groups.index', $teachingClass->id) }}" class="btn btn-outline-light btn-sm ">View</a>
                            </div>
                        </div>
                    </div>
                    <!-- ./BOXES -->
                </div>
            </div>
        </section>
        <!-- ./MAIN CONTENT -->
    </div>
    <!-- ./PAGE CONTENT -->

    <!-- COPYRIGHT FOOTER -->
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; ClassHome 2020 - <script type="text/JavaScript"> document.write(new Date().getFullYear()) </script></small>
        </div>
    </footer>
    <!-- ./COPYRIGHT FOOTER -->


    <!----------------------------------------- MODALS ------------------------------------------>

    <!-- CUSTOM MODAL -->
    @yield('custom-modal')
    <!-- ./CUSTOM MODAL -->

    <!-- SHOW CODE MODAL -->
    <div class="modal fade" id="showCode">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Class Access Code </h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1 id="code">{{$teachingClass->code}}</h1>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-dismiss="modal">Go back</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./SHOW CODE MODAL -->

    <!---------------------------------------- END MODALS -------------------------------------->


    <!-- Jquery links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

    <!-- Bootstrap JS link -->
    <script src="{{ mix('js/theme.js')}}"></script>
    
    <!-- Custom JS -->
    @yield('custom-js')

</body>

</html>