@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Library</title>
@endsection

@section('actions')
<div class="col-md-4 offset-1">
    <a href="#" class="btn btn-success btn-block shadow" data-toggle="modal" data-target="#addFileModal">
        <i class="fas fa-plus"></i> Upload File
    </a>
</div>
<div class="col-md-4 offset-2">
   <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
</div>
@endsection

@section('content')
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Library</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Download file</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>First</td>
                    <td>03/01/2020</td>
                    <td><i class="fas fa-download"></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Second</td>
                    <td>02/26/2020</td>
                    <td><i class="fas fa-download"></i></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Third</td>
                    <td>01/10/2020</td>
                    <td><i class="fas fa-download"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('custom-modal')
<!-- ADD FILE MODAL -->
<div class="modal fade" id="addFileModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Upload File</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">File title</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file">
                            <label for="file" class="custom-file-label">Choose File</label>
                        </div>
                        <small class="form-text text-muted">Max Size X</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal">Upload</button>
            </div>
        </div>
    </div>
</div>
<!-- ADD FILE MODAL END -->
@endsection