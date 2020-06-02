@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Members</title>
@endsection

@section('content')

<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header">
        <h5>Teachers</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                @if ($user->role == 'teacher')
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user-> first_name }} {{ $user-> last_name }}</td>
                        <td>{{ $user-> email }}</td>
                        <td>
                            <button class="btn btn-light" data-toggle="modal" data-target="#sendEmailModal">
                                <i class="fas fa-envelope" style="color:dodgerblue"></i>
                            </button>
                        </td>
                    </tr>
                @endif
            @empty
            @endforelse
            </tr>
        </tbody>
    </table>
</div>
<!-- STUDENTS-->
<div class="card shadow-sm p-0 mb-5 rounded mt-2">
    <div class="card-header">
        <h5>Students</h5>
    </div>
    <table class="table">
        <thead class="thead table-active">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                @if ($user->role == 'student')
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user-> first_name }} {{ $user-> last_name }}</td>
                        <td>{{ $user-> email }}</td>
                        <td>
                            <button class="btn btn-light" data-toggle="modal" data-target="#sendEmailModal">
                                <i class="fas fa-envelope" style="color:dodgerblue"></i>
                            </button>
                        </td>
                    </tr>
                @endif
            @empty
            @endforelse
        </tbody>
    </table>
</div>
    
@endsection

@section('SendEmailModal')

<div class="modal fade" id="sendEmailModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
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
                <button class="btn btn-primary" data-dismiss="modal">Send</button>
            </div>
        </div>
    </div>
</div>
@endsection