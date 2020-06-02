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
                @forelse ($users as $user)
                    @if ($user->role == 'teacher')
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user-> first_name }} {{ $user-> last_name }}</td>
                            <td>{{ $user-> email }}</td>
                        </tr>
                    @endif
                @empty
                @endforelse
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
                @forelse ($users as $user)
                    @if ($user->role == 'student')
                    <tr>
                        <td> {{ $user->id }} </td>
                        <td>{{ $user-> first_name }} {{ $user-> last_name }}</td>
                        <td>{{ $user-> email }}</td>
                        <td>
                            <form method="POST" action="{{ route('users.destroy', $user->id ) }}">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-light" type="submit">
                                        <i class="fas fa-ban block_user"></i></i>
                                    </button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('users.destroy', $user->id ) }}">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-light" type="submit">
                                        <i class="fas fa-user-minus delete_user"></i>
                                    </button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-light" data-toggle="modal" data-target="#sendEmailModal">
                                <i class="fas fa-envelope email_user"></i>
                            </button>
                        </td>
                    </tr>
                    @endif
                @empty
                @endforelse
                
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
                        <input type="email" class="form-control" placeholder="Teacher's Email" >
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
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Destination">
                    </div>
                    <div class="form-group">
                        <label for="e_body">Email body</label>
                        <textarea name="e_body" rows="7" id="e_body" class="form-control" placeholder="Email Body"></textarea>
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