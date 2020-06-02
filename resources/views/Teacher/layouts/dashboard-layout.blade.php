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
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 fixed-top">
        <div class="container">
            <span class="navbar-brand">ClassHome</span>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">                   
                    <li class="nav-item px-2 @if ($active == 'index') active @endif" id="myClasses">
                        <a href="{{ route('myclasses.index') }}" class="nav-link">My Classes</a>
                    </li>
                    <li class="nav-item px-2 @if ($active == 'archive') active @endif" id="archivedClasses">
                        <a href="{{ route('myclasses.archive') }}" class="nav-link ">Archived Classes</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Welcome {{ Auth::user()->first_name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ url('profile') }}" class="dropdown-item">
                                <i class="fas fa-user-circle"></i> Profile Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-user-times"></i>{{ __('Logout') }}
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

    <!-- PAGE CONTENT -->
    <div class="content">
        <section id="actions" class="py-4 mb-4 bg-light shadow-sm">
            <div class="container">
                <div class="row">
                    @yield('actions')
                </div>
            </div>
        </section>
        <div class="container" id="taught">
            <div class="row d-flex justify-content-center">
                @yield('custom-msg')
            </div>
            <div class="row justify-content-center">
                @yield('content')
            </div>
            <!-- /.row -->

            <!-- Pagination -->
            @yield('pagination')
        </div>
    </div>
    
    <!-- /.container -->

    <!-- Copyrights footter -->
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; ClassHome 2020 - <script type="text/JavaScript">document.write(new Date().getFullYear()) </script></small>
        </div>
    </footer>
    <!-- End copyrights footer -->

    <!-- MODALS -->
    @yield('custom-modal')
    <!-- MODALS END -->

    <!-- Jquery link 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.slim.js"></script>-->
    <!-- Popper link 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    --> 
    <!-- Bootstrap JS link -->
    <script src="{{ mix('js/theme.js')}}"></script>
    <!-- Custom JS -->
    @yield('custom-js')

</body>

</html>