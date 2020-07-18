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
                            <form method="POST" action="{{ route('updateInformation', $information->id ) }}" >
                                @method('PUT')
                                @csrf                              
                                <div class="form-group">
                                    <label for="first name">First name</label>
                                    <input type="text" name="firstname" class="form-control" value="{{ $information->first_name }}" required maxlength="12"> 
                                </div>
                                <div class="form-group">
                                    <label for="last name">Last name</label>
                                    <input type="text" name="lastname" class="form-control" value="{{ $information->last_name }}" required maxlength="12">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $information->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="tel" name="phone" class="form-control" value="{{ $information->phone_number }}" required minlength="10" maxlength="10">
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <button class="btn btn-secondary btn-block btn-shadow mt-3 mb-3" type="submit">
                                            Save changes
                                        </button>
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
            <form method="POST" action="{{ route('updatePassword', $information->id) }}">
            @method('PUT')
            @csrf 
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Current password</label>
                        <input type="password" class="form-control" value="{{ $information->password}}" >
                    </div>
                    <div class="form-group">
                        <label for="title">New password</label>
                        <input type="password" name="password" id="password" class="form-control" minlength="8" maxlength="12" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Confirm password</label>
                        <input type="password" id="confirm_password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-shadow" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
<script>

    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

</script>

@endsection