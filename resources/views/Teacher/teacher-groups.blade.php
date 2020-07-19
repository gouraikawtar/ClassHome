@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Groups</title>
@endsection

@section('actions')
<div class="col-md-4 offset-1">
    <a href="#" class="btn btn-warning btn-block shadow" data-toggle="modal" data-target="#addGroupModal">
        <i class="fas fa-plus"></i> Add Group
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
            <h4>Groups</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Group leader</th>
                    <th>Email</th>
                    <th colspan="4">Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($groups as $group)
                    <tr>
                        <td></td>
                        <td>{{ $group->name }}</td>
                        <td>{{ App\User::find($group->user_id)->first_name }} {{ App\User::find($group->user_id)->last_name }}</td>
                        <td>{{ App\User::find($group->user_id)->email }}</td>
                        <td>
                        <button class="btn btn-light" data-toggle="modal" data-target="#viewGroupModal" data-groupname="{{ $group->name }}"
                            data-firststudentname="{{ $group->users[0]->first_name }} {{ $group->users[0]->last_name }}"
                            data-firststudentemail="{{ $group->users[0]->email }}"
                            data-secondstudentname="{{ $group->users[1]->first_name }} {{ $group->users[1]->last_name }}" 
                            data-secondstudentemail="{{ $group->users[1]->email }}"
                            data-thirdstudentname="{{ $group->users[2]->first_name }} {{ $group->users[2]->last_name }}" 
                            data-thirdstudentemail="{{ $group->users[2]->email }}" >
                                <i class="fas fa-info-circle group_inf"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-light" data-toggle="modal" data-target="#editNameGroupModal" data-groupid="{{ $group->id }}" 
                                data-groupname="{{ $group->name }}">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-light" data-toggle="modal" data-target="#emailGpModal">
                                <i class="fas fa-envelope group_em"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-light" data-groupid="{{$group->id}}" data-toggle="modal" data-target="#deleteGroupModal">
                                    <i class="fas fa-trash group_del"></i>
                                </button>
                            </td>
                    </tr>
                @empty
                    
                @endforelse
                
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('custom-modal')

    <!-- ADD GROUP MODAL -->
<div class="modal fade" id="addGroupModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Add Group</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            
            <form method="POST" action="{{ action('GroupController@store', $teachingClass->id) }}" >
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="groupName" placeholder="Enter name of the group" required>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" class="form-control" name="groupLeader" required>
                            <option selected disabled value="">Group leader</option>
                            @forelse ($members as $member)
                                <option value="{{ $member->id }}"> {{$member->first_name}} {{ $member->last_name }} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" class="form-control" name="member2" required>
                            <option selected disabled value="">Member 2</option>
                            @forelse ($members as $member)
                                <option value="{{ $member->id }}"> {{$member->first_name}} {{ $member->last_name }} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" class="form-control" name="member3" required>
                            <option selected disabled value="">Member 3</option>
                            @forelse ($members as $member)
                                <option value="{{ $member->id }}"> {{$member->first_name}} {{ $member->last_name }} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-warning" value="Create group">
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- ./ADD GROUP MODAL -->

    <!-- VIEW GROUP DETAILS MODAL -->
<div class="modal fade" id="viewGroupModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Group details</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Group members</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="gpInfo">
                        <tr>
                            <td>1</td>
                            <td><input type="text" id="firststudentName" value="" class="form-control" readonly /></td>
                            <td><input type="text" id="firststudentEmail" value="" class="form-control" disabled /></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input type="text" id="secondstudentName" value="" class="form-control" disabled /></td>
                            <td><input type="email" id="secondstudentEmail" value="" class="form-control" disabled /></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><input type="text" id="thirdstudentName" value="" class="form-control" disabled /></td>
                            <td><input type="email" id="thirdstudentEmail" value="" class="form-control" disabled /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark btn-md" data-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>
    <!-- ./VIEW GROUP DETAILS -->

    <!-- EDIT GROUP'S NAME MODAL -->
<div class="modal fade" id="editNameGroupModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Attention</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('updateName') }}" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Group's Name</label>
                        <input type="text" class="form-control" name="groupName" id="groupName" required>
                        <input type="hidden" class="form-control" name="groupId" id="groupId">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END EDIT GROUP'S NAME MODAL -->   

    <!-- SEND EMAIL TO GROUP MODAL -->
    <div class="modal fade" id="emailGpModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Send email</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form method="GET" action="{{ route('sendingEmail') }}" >
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
                            <textarea name="body" class="form-control" id="body" rows="7" placeholder="E-mail body" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark" type="submit" >Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./SEND EMAIL TO GROUP MODAL -->

    <!-- DELETE GROUP MODAL -->
<div class="modal fade" id="deleteGroupModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Attention</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this group ?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('deleteGroup') }}">
                    @csrf
                    <input type="hidden" name="classId" value="{{ $teachingClass->id}}" >
                    <input type="hidden" name="groupId" id="groupId" value="" >
                    <button class="btn btn-warning" type="submit">Confirm</button>
                </form>

                <button class="btn btn-dark" data-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>
    <!-- END DELETE GROUP MODAL -->
@endsection

@section('custom-js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

<script>
    $('#viewGroupModal').on('show.bs.modal', function (event) {
        console.log('Modal opened');
        var button = $(event.relatedTarget) 
        var groupName = button.data('groupname')
        var firststudentName = button.data('firststudentname') 
        var firststudentEmail = button.data('firststudentemail') 
        var secondstudentName = button.data('secondstudentname') 
        var secondstudentEmail= button.data('secondstudentemail')
        var thirdstudentName= button.data('thirdstudentname')
        var thirdstudentEmail= button.data('thirdstudentemail')

        var modal = $(this)

        modal.find('.modal-body #groupName').val(groupName);
        modal.find('.modal-body #firststudentName').val(firststudentName);
        modal.find('.modal-body #firststudentEmail').val(firststudentEmail);
        modal.find('.modal-body #secondstudentName').val(secondstudentName);
        modal.find('.modal-body #secondstudentEmail').val(secondstudentEmail); 
        modal.find('.modal-body #thirdstudentName').val(thirdstudentName);
        modal.find('.modal-body #thirdstudentEmail').val(thirdstudentEmail);  
    });

    $('#deleteGroupModal').on('shown.bs.modal', function(event){
        var button = $(event.relatedTarget) 
        var groupId = button.data('groupid') 

        var modal = $(this);

        modal.find('.modal-footer #groupId').val(groupId);
    });

    $('#editNameGroupModal').on('shown.bs.modal', function(event){
        var button = $(event.relatedTarget) 
        var groupName = button.data('groupname') 
        var groupId = button.data('groupid')

        var modal = $(this);

        modal.find('.modal-body #groupName').val(groupName);
        modal.find('.modal-body #groupId').val(groupId);
    });

</script>

@endsection