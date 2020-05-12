@extends('Admin.layout')

@section('title')
    <title>ClassHome - Dashboard</title>
@endsection
    
<!---------------------- HEADER-------------------------------->
@section('header')
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4><i class="fas fa-cog"></i> Dashboard</h4>
                </div>
            </div>
        </div>
    </header>
@endsection
<!---------------------------- END HEADER------------------------------>


<!------------------------------- SEARCH ------------------------------->
@section('search')
    <button class="btn btn-primary">Search</button>
@endsection
<!-- -----------------------------END SEARCH -------------------------------> 



    <!------------------------------- CONTENT ------------------------------->
    @section('content')
        <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Post One</td>
                                    <td>Web Development</td>
                                    <td>May 10 2018</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Details
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Post Two</td>
                                    <td>Tech Gadgets</td>
                                    <td>May 11 2018</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Details
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Post Three</td>
                                    <td>Web Development</td>
                                    <td>May 13 2018</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Details
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Post Four</td>
                                    <td>Business</td>
                                    <td>May 15 2018</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Details
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Post Five</td>
                                    <td>Web Development</td>
                                    <td>May 17 2018</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Details
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Post Six</td>
                                    <td>Health & Wellness</td>
                                    <td>May 20 2018</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Details
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center bg-primary text-white mb-3 shadow">
                        <div class="card-body">
                            <h3>Classes</h3>
                            <h4 class="display-4">
                                <i class="fas fa-school"></i> 6
                            </h4>
                            <a href="{{ route('classes') }}" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>

                    <div class="card text-center bg-success text-white mb-3 shadow">
                        <div class="card-body">
                            <h3>Teachers</h3>
                            <h4 class="display-4">
                                <i class="fas fa-chalkboard-teacher"></i> 4
                            </h4>
                            <a href="{{ route('teachers') }}" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>

                    <div class="card text-center bg-warning text-white mb-3 shadow">
                        <div class="card-body">
                            <h3>Students</h3>
                            <h4 class="display-4">
                                <i class="fas fa-user-graduate"></i> 4
                            </h4>
                            <a href="{{ route('students') }}" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
<!------------------------------- END CONTENT ------------------------------->

