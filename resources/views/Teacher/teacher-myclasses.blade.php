@extends('Teacher.layouts.dashboard-layout')

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

@forelse ($classes as $class)
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">{{$class->name}}</h4>
            @if ($class->description == null)
            <p class="card-text">{{$class->name}}</p>
            @else
            <p class="card-text">{{$class->description}}</p> 
            @endif
            <a href="#" class="btn btn-primary">Go</a>
            <a href="#" class="btn btn-warning">Archive</a>
        </div>
    </div>
</div>
@empty
<div class="alert alert-primary" role="alert">
  No classes created yet
</div>
    
@endforelse

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
                <form method="POST" action="{{ route('myclasses.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_Name">Class name</label>
                            <input type="text" name="name" class="form-control" id="class_Name" required="true">
                        </div>
                        <div class="form-group">
                            <label for="class_section">Section</label>
                            <select name="section" class="custom-select" id="class_section">
                                <option selected disabled value="">Choose section..</option>
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>
                                <option value="highschool">Highschool</option>
                                <option value="university/college">University/College</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class_object">Object</label>
                            <input type="text" name="object" class="form-control" id="class_object">
                        </div>
                        <div class="form-group">
                            <label for="class_descr">Description</label>
                            <input type="text" name="description" class="form-control" id="class_descr">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="create" class="btn btn-success" id="create" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./CREATE CLASS MODAL -->
@endsection
