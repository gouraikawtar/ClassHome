@extends('Teacher.layouts.teacher-class-layout')

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
                    <th>Full Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ App\User::find($teachingClass->user_id)->first_name }} {{ App\User::find($teachingClass->user_id)->last_name }}</td>
                    <td>{{ App\User::find($teachingClass->user_id)->email }}</td>
                    <td>
                        @if ( App\User::find($teachingClass->user_id)->id != Auth::user()->id)
                            <button class="btn btn-light" data-toggle="modal" data-target="#sendEmailModal">
                                <i class="fas fa-envelope email_user"></i>
                            </button>
                        @endif
                    </td>
                </tr>
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>
                            @if ( $teacher->id != Auth::user()->id)
                                <button class="btn btn-light" data-useremail="{{$teacher->email}}" data-toggle="modal" data-target="#sendEmailModal">
                                    <i class="fas fa-envelope email_user"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
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
                    <th>Full Name</th>
                    <th>Email</th>
                    <th colspan="2">Options</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($members as $student)
                        @if ($student->role == 'student')     
                            <tr>
                                <td>{{ $student-> first_name }} {{ $student-> last_name }}</td>
                                <td>{{ $student-> email }}</td>
                                <td>
                                    <button class="btn btn-light" data-userid="{{$student->id}}" data-toggle="modal" data-target="#deleteStudentModal">
                                        <i class="fas fa-user-minus delete_user"></i>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-light" data-useremail="{{$student->email}}" data-toggle="modal" data-target="#sendEmailModal">
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
            <form method="GET" action="{{ route('invitation', $teachingClass->id) }}" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Teacher's Email" >
                        <input type="hidden" name="senderName" value=" {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" >
                        <input type="hidden" name="senderEmail" value=" {{ Auth::user()->email}}" >
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Send invitation</button>
                </div>
            </form>
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
            <form method="GET" action="{{ route('sendingEmail', $teachingClass->id) }}" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="destination">Email destination</label>
                        <input type="email" name="destination" id="destination" class="form-control" placeholder="Email destination" >
                        <input type="hidden" name="senderName" value=" {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" >
                        <input type="hidden" name="senderEmail" value=" {{ Auth::user()->email}}" >
                    </div>
                    <div class="form-group">
                        <label for="body">Email body</label>
                        <textarea name="body" rows="7" id="body" class="form-control" placeholder="E-mail Body"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ./SEND EMAIL MODAL -->

<!-- DELETE STUDENT MODAL -->
<div class="modal fade" id="deleteStudentModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Attention</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('deleteStudent') }}">
                    @csrf
                    <input type="hidden" name="classId" value="{{ $teachingClass->id}}" >
                    <input type="hidden" name="userId" id="userId" value="" >
                    <button class="btn btn-warning" type="submit">Confirm</button>
                </form>

                <button class="btn btn-dark" data-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>
<!-- END DELETE POST MODAL -->

@endsection

@section('scripts')
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

<script>   

    $('#deleteStudentModal').on('shown.bs.modal', function(event){
        var button = $(event.relatedTarget) 
        var userId = button.data('userid') 

        var modal = $(this);

        modal.find('.modal-footer #userId').val(userId);
    });


</script>

@endsection