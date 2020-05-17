@extends('Teacher.layouts.dashboard-layout')

@section('title')
<title>ClassHome - Profile</title>
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
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="p_name">Full name</label>
                    <input type="text" class="form-control" name="p_name" id="p_name">
                </div>
                <div class="form-group">
                    <label for="p_email">Email</label>
                    <input type="email" class="form-control" name="p_email" id="p_email">
                </div>
                <div class="form-group">
                    <label for="p_phone">Phone number</label>
                    <input type="tel" class="form-control" name="p_phone" id="p_phone">
                </div>
                <div class="form-group">
                    <label for="p_pwd">Password <button type="button" class="btn btn-info" id=""><i class="fas fa-edit"></i> Edit</button></label>
                    <input type="password" class="form-control" name="p_pwd" id="p_pwd" readonly>
                </div>
                <div class="form-group">
                    <label for="p_gender">Gender</label>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="female" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="female">Female</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="male" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="male">Male</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <div class="col-md-3">
    <h3>Your Avatar</h3>
    <img src="img/avatar.png" alt="" class="d-block img-fluid mb-3">
    <button class="btn btn-primary btn-block">Edit Image</button>
    <button class="btn btn-danger btn-block">Delete Image</button>
</div> --}}
@endsection