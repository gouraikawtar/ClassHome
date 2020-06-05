<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ClassHome - Posts</title>

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
                    <li class="nav-item px-2">
                        <a href="{{ route('myclasses.index') }}" class="nav-link">My classes</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ URL('/posts') }}" class="nav-link">Posts</a>
                    </li>
                    <li class="nav-item px-2 ">
                        <a href="{{ URL('/homework') }}" class="nav-link">Homework</a>
                    </li>
                    <li class="nav-item px-2 ">
                        <a href="{{ URL('/grades') }}" class="nav-link">Grades</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Welcome {{ Auth::user()->first_name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ URL('/profile') }}" class="dropdown-item">
                                <i class="fas fa-user-circle"></i> Profile
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
                        <h4>PFE SMI S6</h4>
                    </div>
                </div>
            </div>
        </header>


        <!-- ACTIONS -->
        <section id="actions" class="py-3 mb-4 bg-light shadow-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <button class="btn btn-primary btn-block shadow" data-toggle="modal" data-target="#addPostModal">
                            <i class="fas fa-plus"></i> Add post
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- END ACTIONS -->

        <!-- POSTS -->
        <section id="posts">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        
                        <!--POSTS AND THEIRS COMMENTS -->
                        @yield('content')                        
                        <!-- END  -->

                    </div>
                    <!-- BOXES -->
                    <div class="col-md-3 ">
                        <div class="card text-center bg-success text-white mb-3 shadow ">
                            <div class="card-body">
                                <h4>Library</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-folder"></i>
                                </h4>
                                <a href="{{ URL('/library') }}" class="btn btn-outline-light btn-sm">View</a>
                            </div>
                        </div>

                        <div class="card text-center bg-primary text-white mb-3 shadow">
                            <div class="card-body">
                                <h4>Members</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-user-check"></i>
                                </h4>
                                <a href="{{ route('users.index') }}" class="btn btn-outline-light btn-sm">View</a>
                            </div>
                        </div>

                        <div class="card text-center bg-warning text-white mb-3 shadow">
                            <div class="card-body">
                                <h4>Groups</h4>
                                <h4 class="display-4">
                                    <i class="fas fa-users"></i>
                                </h4>
                                <a href="{{ route('groups.index') }}" class="btn btn-outline-light btn-sm">View</a>
                            </div>
                        </div>
                        <!-- END BOXES -->
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- Copyrights footter -->
    <footer id="sticky-footer " class="py-4 bg-dark text-white-50 ">
        <div class="container text-center">
            <small>Copyright &copy; Home Classroom <script type="text/JavaScript "> document.write(new Date().getFullYear()) </script></small>
        </div>
    </footer>
    <!-- End copyrights footer -->


    <!-- ADD POST MODAL -->
    <div class="modal fade" id="addPostModal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content ">
                <div class="modal-header bg-primary text-white ">
                    <h5 class="modal-title ">Add post</h5>
                    <button class="close " data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form  method="POST" action="{{ action('PostController@store') }}" >
                    @csrf
                    <div class="modal-body">
                        @include('Student.forms.postsForms')
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-primary"> Create </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ADD POST MODAL END -->

    <!-- EDIT POST MODAL -->
<div class="modal fade " id="editPostModal" role="dialog" >
    <div class="modal-dialog modal-lg " role="document" >
        <div class="modal-content ">
            <div class="modal-header bsg-primary text-white ">
                <h5 class="modal-title ">Edit post</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('posts.update', 'test' ) }}" >
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="postId" id="postId" value="" >
                    @include('Student.forms.postsForms')
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- EDIT POST MODAL END -->

    <script src="{{ mix('/js/theme.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $('#editPostModal').on('show.bs.modal', function (event) {
            console.log('Modal opened');
            var button = $(event.relatedTarget) 
            var title = button.data('mytitle') 
            var content = button.data('mycontent') 
            var postId = button.data('postId') 
            var modal = $(this);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #content').val(content);
            modal.find('.modal-body #postId').val(postId);
        });
    </script>

</body>

</html>