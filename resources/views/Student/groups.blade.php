@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Groups</title>
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <form method="GET" action="{{route('groups.search',$teachingClass->id)}}">
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
        <h5>Groups</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Group leader</th>
                <th>Email</th>
                <th colspan="3">Options</th>
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
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
</div>
    
@endsection

@section('SendEmailModal')

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
                            <td><input type="text" id="firststudentName" value="" class="form-control" disabled /></td>
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

</script>

@endsection