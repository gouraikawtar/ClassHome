@extends('Student.myLayouts.dashboard')

@section('title')
<title>ClassHome - My Classes</title>
@endsection

@section('actions')
<div class="col-md-4 offset-1">
    <a href="#" class="btn btn-primary btn-block shadow" data-toggle="modal" data-target="#joinClassModal">
        <i class="fas fa-plus"></i> Join Class
    </a>
</div>
<div class="col-md-4 offset-2">
    <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
</div>
@endsection

@section('content')
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">JAVA</h4>
            <p class="card-text">Learn Java programming</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">JEE</h4>
            <p class="card-text">Learn web backend developpement</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">PFE SMI S6</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="{{ url('/posts') }}" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-warning">Go</a>
        </div>
    </div>
</div>
@endsection

@section('pagination')
<ul class="pagination justify-content-center">
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
</ul>
@endsection

@section('custom-modal')
    <!-- CREATE CLASS MODAL -->
    <div class="modal fade" id="joinClassModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Join class</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="class_Name">Class code</label>
                            <input type="text" class="form-control" id="class_Name" required="true">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" id="create">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./CREATE CLASS MODAL -->
@endsection
