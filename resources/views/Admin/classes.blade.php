@extends('Admin.layout')

@section('title')
    <title>ClassHome - Classes</title>
@endsection
    
<!---------------------- HEADER-------------------------------->
@section('header')
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4><i class="fas fa-school"></i> Classes</h4>
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
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <h4>Classes</h4>
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
                                        <a href="#" data-toggle="modal" data-target="#detailsModal">
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
                                        <a href="#" data-toggle="modal" data-target="#detailsModal">
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
                                        <a href="#" data-toggle="modal" data-target="#detailsModal">
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
                                        <a href="#" data-toggle="modal" data-target="#detailsModal">
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
                                        <a href="#" data-toggle="modal" data-target="#detailsModal">
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
                                        <a href="#" data-toggle="modal" data-target="#detailsModal">
                                            <i class="fas fa-angle-double-right"></i> Details
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </section>
    @endsection
<!------------------------------- END CONTENT ------------------------------->

<!-- DETAILS MODAL -->
<div class="modal fade" id="detailsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Details</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" disabled value="Web Development">
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea name="editor1" class="form-control" rows="5" disabled>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum
                        </textarea>
                    </div>
                    <div class="m-4">
                        <a href="#">
                            <h6><i class="fas fa-download"></i> Download File</h6>
                        </a>
                        <small class="form-text text-muted">Size X</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>