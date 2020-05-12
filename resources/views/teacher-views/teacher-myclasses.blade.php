@extends('./layouts.dashboard-layout')

@section('title')
<title>ClassHome - My Classes</title>
@endsection

@section('actions')
<div class="col-md-4 offset-1">
    <a href="#" class="btn btn-success btn-block shadow" data-toggle="modal" data-target="#createClassModal">
        <i class="fas fa-plus"></i> Create Class
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
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">JEE</h4>
            <p class="card-text">Learn web backend developpement</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">PFE SMI S6</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="{{ url('posts') }}" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Lorem ipsum</h4>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
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
    <div class="modal fade" id="createClassModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Create new class</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="class_Name">Class name</label>
                            <input type="text" class="form-control" id="class_Name" required="true">
                        </div>
                        <div class="form-group">
                            <label for="class_section">Section</label>
                            <select class="custom-select" id="class_section">
                                <option selected disabled value="">Choose section..</option>
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>
                                <option value="highschool">Highschool</option>
                                <option value="university/college">University/College</option>
                            </select>
                            <!-- à rendre select -->
                        </div>
                        <!-- <div class="form-group">
                            <select class="custom-select" id="class_level">
                                <option selected disabled value="">Level</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="class_object">Object</label>
                            <input type="text" class="form-control" id="class_object">
                        </div>
                        <div class="form-group">
                            <label for="class_descr">Description</label>
                            <input type="text" class="form-control" id="class_descr">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" id="create">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./CREATE CLASS MODAL -->
@endsection
