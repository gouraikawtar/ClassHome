@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Members</title>
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <form method="GET" action=" {{route('members.search',$teachingClass->id)}} ">
        <div class="input-group">
            <input type="text" name="search" id="search" class="form-control shadow-sm" placeholder="Search">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </form>
</div>
@endsection

@section('content')

<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header">
        <h5>Teachers</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th></th>
                <th>Full Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>{{ App\User::find($teachingClass->user_id)->first_name }} {{ App\User::find($teachingClass->user_id)->last_name }}</td>
                <td>{{ App\User::find($teachingClass->user_id)->email }}</td>
                <td>
                    <button class="btn btn-light" data-toggle="modal" data-target="#sendEmailModal">
                        <i class="fas fa-envelope" style="color:dodgerblue"></i>
                    </button>
                </td>
            </tr>
            @forelse ($teachers as $teacher)
                <tr>
                    <td></td>
                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>
                        @if ( $teacher->id != Auth::user()->id)
                            <button class="btn btn-light" data-useremail="{{$teacher->email}}" data-toggle="modal" data-target="#sendEmailModal">
                                <i class="fas fa-envelope" style="color:dodgerblue"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
            @endforelse
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
                <th></th>
                <th>Full Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $student)
                @if ($student->role == 'student')
                    <tr>
                        <td></td>
                        <td>{{ $student-> first_name }} {{ $student-> last_name }}</td>
                        <td>{{ $student-> email }}</td>
                        @if ($student->id != Auth::user()->id)
                            <td>
                                <button class="btn btn-light" data-toggle="modal" data-target="#sendEmailModal">
                                    <i class="fas fa-envelope" style="color:dodgerblue"></i>
                                </button>
                            </td>
                        @else 
                        <td></td>
                        @endif
                    </tr>
                @endif
            @empty
            @endforelse
        </tbody>
    </table>
</div>
    
@endsection

@section('SendEmailModal')
    <!-- SEND EMAIL MODAL -->
<div class="modal fade" id="sendEmailModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Send Email</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="GET" action="{{ route('sendingEmail', $teachingClass->id) }}" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="destination">Email destination</label>
                        <input type="email" name="destination" id="destination" class="form-control" placeholder="Email destination" required>
                        <input type="hidden" name="senderName" value=" {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" >
                        <input type="hidden" name="senderEmail" value=" {{ Auth::user()->email}}" >
                    </div>
                    <div class="form-group">
                        <label for="body">Email body</label>
                        <textarea name="body" rows="7" id="body" class="form-control" placeholder="E-mail Body" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ./SEND EMAIL MODAL -->
@endsection