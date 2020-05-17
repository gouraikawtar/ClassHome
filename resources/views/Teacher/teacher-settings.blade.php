@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Settings</title>
@endsection

@section('actions')
<div class="col-md-3 offset-3">
    <a href="#" class="btn btn-success btn-block shadow">
        <i class="fas fa-lock"></i> Save Changes
    </a>
</div>
<div class="col-md-3">
    <a href="#" class="btn btn-danger btn-block shadow">
        <i class="fas fa-trash"></i> Discard Changes
    </a>
</div>
@endsection

@section('content')
<div class="col-md-8">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Edit Class</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="c_name">Class name</label>
                    <input type="text" class="form-control" name="c_name" id="c_name">
                </div>
                <div class="form-group">
                    <label for="c_section">Section</label>
                    <input type="text" class="form-control" name="c_section" id="c_section">
                </div>
                <div class="form-group">
                    <label for="c_object">Object</label>
                    <input type="text" class="form-control" name="c_object" id="c_object">
                </div>
                <div class="form-group">
                    <label for="c_desc">Description</label>
                    <input type="text" class="form-control" name="c_desc" id="c_desc">
                </div>
                <div class="form-group">
                    <label for="c_code">Code <button type="button" class="btn btn-info" id=""><i class="fas fa-edit"></i> Reset Code</button></label>
                    <input type="text" class="form-control" name="c_code" id="c_code">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection