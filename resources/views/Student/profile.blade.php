@extends('Student.myLayouts.firstNavbar')

@section('title')
    <title> ClassHome - Profile</title>
@endsection

@section('content')

<div class="contentClass">

    <!-- ACTIONS -->
    <section id="actions" class="py-4 mb-4 bg-light shadow-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <a href="#" class="btn btn-success btn-block btn-shadow" data-toggle="modal" data-target="#changePassword">
                        <i class="fas fa-lock"></i> Change Password
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFILE -->
    <section id="profile">
        <div class="container mb-4 pb-3">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow-lg p-0 mb-5 rounded mt-3">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="first name">First name</label>
                                    <input type="text" id="first name" class="form-control" placeholder="Salma">
                                </div>
                                <div class="form-group">
                                    <label for="last name">Last name</label>
                                    <input type="text" id="last name" class="form-control" placeholder="Bouaouid">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="salma@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="telephone" id="phone" class="form-control" placeholder="+212641734130">
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-secondary btn-block btn-shadow mt-3 mb-3">
                                            Save changes
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- CHANGE PASSWORD MODAL-->
<div class="modal fade" id="changePassword">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-success text-white btn-shadow">
                <h5 class="modal-title">Change password</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Current password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">New password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Confirm password</label>
                        <input type="password" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-shadow" data-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@endsection