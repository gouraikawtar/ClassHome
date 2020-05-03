@extends('teacher-class-layout')

@section('title')
<title>ClassHome - Members</title>
@endsection

@section('actions')
<div class="col-md-4 offset-md-1">
    <a href="#" class="btn btn-primary btn-block shadow" data-toggle="modal" data-target="#addTeacherModal">
        <i class="fas fa-plus"></i> Invite Teacher
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
            <h4>Teachers</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Abdessamad BELANGOUR</td>
                    <td>belangour@gmail.com </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Students</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th colspan="3">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Salma BOUAOUID</td>
                    <td>salmabouaouid57@gmail.com</td>
                    <td><i class="fas fa-ban block_user"></i></td>
                    <td><i class="fas fa-user-minus delete_user"></i></td>
                    <td><i class="fas fa-envelope email_user" data-toggle="modal"></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kawtar GOURAI</td>
                    <td>k.gourai14@gmail.com</td>
                    <td><i class="fas fa-ban block_user"></i></td>
                    <td><i class="fas fa-user-minus delete_user"></i></td>
                    <td><i class="fas fa-envelope email_user" data-toggle="modal"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('custom-modal')
<!-- ADD TEACHER MODAL -->
<div class="modal fade" id="addTeacherModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Invite Teacher</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Send invitation</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ADD TEACHER -->

<!-- SEND EMAIL MODAL -->
<div class="modal fade" id="sendEmailModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Send Email</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="e_body">Email body</label>
                        <textarea name="e_body" id="e_body" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark" data-dismiss="modal">Send</button>
            </div>
        </div>
    </div>
</div>
<!-- ./SEND EMAIL MODAL -->
@endsection