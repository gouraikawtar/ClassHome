@extends('teacher-class-layout')

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
                    <th>#</th>
                    <th>Name</th>
                    <th>Group leader</th>
                    <th>Email</th>
                    <th colspan="3">Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($groups as $group)
                    <tr>
                        <td>{{ $group->id }} </td>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->users()->where('responsible', true) }}</td>
                        <td>{{ $group->users()->where('responsible', true)->email->get() }}</td>
                        <td><i class="fas fa-info-circle group_inf" id="" data-toggle="modal"></i></td>
                        <td><i class="fas fa-trash group_del" id=""></i></td>
                        <td><i class="fas fa-envelope group_em" data-toggle="modal"></i></td>
                    </tr>
                @empty
                    
                @endforelse
                
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('custom-modal')
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
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="emailGp">Email</label>
                            <input type="email" name="emailGp" class="form-control" id="emailGp">
                        </div>
                        <div class="form-group">
                            <label for="bodyGp">Email body</label>
                            <textarea name="bodyGp" class="form-control" id="bodyGp" cols="" rows="10" ></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Send</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./SEND EMAIL TO GROUP MODAL -->

    <!-- VIEW GROUP DETAILS MODAL -->
    <div class="modal fade" id="viewGpModal">
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
                            <tr><th colspan="4" id="gpName"></th></tr>
                            <tr>
                                <th>#</th>
                                <th>Group members</th>
                                <th>Email</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody id="gpInfo">
                            <tr>
                                <td>1</td>
                                <td>Student x</td>
                                <td>studentx@gmail.com</td>
                                <td>Leader</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Student x</td>
                                <td>studentx@gmail.com</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Student x</td>
                                <td>studentx@gmail.com</td>
                                <td>Member</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./VIEW GROUP DETAILS -->
    
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
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="gpNameCreate">Name</label>
                            <input type="text" class="form-control" name="gpNameCreate" id="gpNameCreate">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" id="leader" required>
                                <option selected disabled value="">Group leader</option>
                                <option value="1">Student 1</option>
                                <option value="2">Student 2</option>
                                <option value="3">Student 3</option>
                                <option value="4">Student 4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" id="member2" required>
                                <option selected disabled value="">Member 2</option>
                                <option value="1">Student 1</option>
                                <option value="2">Student 2</option>
                                <option value="3">Student 3</option>
                                <option value="4">Student 4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <select class="custom-select" id="member" required>
                                    <option selected disabled value="">Member 3</option>
                                    <option value="1">Student 1</option>
                                    <option value="2">Student 2</option>
                                    <option value="3">Student 3</option>
                                    <option value="4">Student 4</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-dismiss="modal">Create group</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ADD GROUP MODAL -->
@endsection