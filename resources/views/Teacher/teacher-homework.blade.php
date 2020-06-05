@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Homework</title>
@endsection

@section('actions')
<div class="col-md-4 offset-1">
    <a href="#" class="btn btn-dark btn-block shadow" data-toggle="modal" data-target="#addHomeworkModal">
        <i class="fas fa-plus"></i> Add homework
    </a>
</div>
<div class="col-md-4 offset-2">
    <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
</div>
@endsection

@section('content')
<div class="col-md-9">
    @if (session()->has('homework_created'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('homework_created') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session()->has('homework_edited'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('homework_edited') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Homework</h4>
        </div>
        <table class="table table-hover" id="datatable">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Deadline</th>
                    <th>Expires at</th>
                    <th>Status</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" name="class_id" id="class_id" value="{{$teachingClass->id}}">
                @foreach ($homeworks as $homework)
                <tr>
                    <td>
                        <input type="hidden" id="id_hw" name="id_hw" value="{{$homework->id}}">
                        <input type="hidden" id="desc_hw" name="desc_hw" value="{{$homework->description}}">
                    </td>
                    <td>{{$homework->title}}</td>
                    <td>{{Carbon\Carbon::parse($homework->created_at)->format('Y-m-d')}}</td>
                    {{-- <td>{{$homework->created_at->format('Y-m-d')}}</td> --}}
                    <td>{{$homework->deadline}}</td>
                    <td>{{Carbon\Carbon::parse($homework->expire_at)->format('H:i')}}</td>
                    <td>{{$homework->status}}</td>
                    <td><a href="{{route('myclasses.homeworks.show',[$teachingClass->id,$homework->id])}}"><i class="view_hw fas fa-info-circle" id=""></i></a></td>
                    <td><i class="delete_hw fas fa-trash" id="" data-toggle="modal" data-target="#deleteHwModal"></i></td>
                    @if ($homework->status == 'Active')
                    <td><i class="edit_hw fas fa-edit" id="" data-toggle="modal" data-target="#editHwModal"></i></td>
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-center">
            {{$homeworks->links()}}
        </div>
    </div>
</div>
@endsection
{{-- {{route('homeworks.show',$homework->id)}} 
{{ route('homeworks.store') }}--}}

@section('custom-modal')
    <!-- ADD HOMEWORK MODAL -->
    <div class="modal fade" id="addHomeworkModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Add Homework</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{route('myclasses.homeworks.store',$teachingClass->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }} ">
                            @error('title')
                                <div class="invalid-feedback" id="title_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc"  id="desc" class="form-control @error('desc') is-invalid @enderror" cols="" rows="5">{{ old('desc') }} </textarea>
                            @error('desc')
                                <div class="invalid-feedback" id="desc_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }} ">
                            @error('deadline')
                                <div class="invalid-feedback" id="deadline_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="expires_at">Expires at</label>
                            <input type="time" class="form-control @error('expires_at') is-invalid @enderror" id="expires_at" name="expires_at" value="{{ old('expires_at') }} ">
                            @error('expires_at')
                                <div class="invalid-feedback" id="exp_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class="@error('files') is-invalid @enderror" name="files[]" id="file" multiple="true">
                            <small class="form-text text-muted">Max size : 2mb</small>
                            <small class="form-text text-muted">Authorized extensions : pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip</small>
                            @error('files')
                                <div class="invalid-feedback" id="files_error">{{ $message }}</div>
                            @enderror
                            {{-- <label for="image">Upload file</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label for="file" id="file_input" class="custom-file-label">Choose File</label>
                            </div>
                            <small class="form-text text-muted">Max Size X</small> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="create" class="btn btn-dark" type="submit" id="create_homework">Create</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- ADD HOMEWORK MODAL END -->

    <!-- EDIT HOMEWORK MODAL -->
    <div class="modal fade" id="editHwModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Edit Homework</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="edit_homework_form" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="new_title">Title</label>
                            <input type="text" name="new_title" class="form-control" id="new_title">
                        </div>
                        <div class="form-group">
                            <label for="new_desc">Description</label>
                            <textarea name="new_desc" class="form-control" id="new_desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="new_deadline">Deadline</label>
                            <input type="date" name="new_deadline" class="form-control" id="new_deadline">
                        </div>
                        <div class="form-group">
                            <label for="new_exp_at">Expires at</label>
                            <input type="time" name="new_exp_at" class="form-control" id="new_exp_at">
                        </div>
                        <div class="form-group">
                            <label for="image">Upload file</label>
                            <div class="custom-file">
                                <input type="file" name="new_file" class="custom-file-input" id="new_file">
                                <label for="new_file" class="custom-file-label">Choose File</label>
                            </div>
                            <small class="form-text text-muted">Max Size X</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EDIT HOMEWORK MODAL END -->

    <!-- VIEW HOMEWORK MODAL -->
    {{-- <div class="modal fade" id="viewHwModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Homework details</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <tbody id="hwInfo">
                            <tr>
                                <th>Title</th>
                                <td id="titleView"></td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td id="creatDateView"></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td id="descrView"></td>
                            </tr>
                            <tr>
                                <th>Deadline</th>
                                <td id="deadlineView"></td>
                            </tr>
                            <tr>
                                <th>Expires at</th>
                                <td id="expView"></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td id="statusView"></td>
                            </tr>
                            <tr>
                                <th>Joined files</th>
                                <td id="joinedFiles"><a href="#" class="btn btn-warning">Download files</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- VIEW HOMEWORK MODAL END -->

<div class="modal fade" id="deleteHwModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Attention</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer">
                <form id="delete_homework_form" method="POST" action="/homeworks/">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Confirm</button>
                </form>

                <button class="btn btn-dark" data-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script src="{{ mix('js/homework.js')}}"></script>
{{-- @if(Session::has('errors'))
<script>
jQuery(document).ready(function(){
    jQuery("#addHomeworkModal").modal("show");
});
</script>
@endif --}}
@endsection