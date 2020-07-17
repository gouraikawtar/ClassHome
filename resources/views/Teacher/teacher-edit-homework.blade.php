@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Edit Homework</title>
@endsection

@section('content')
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Edit homework</h4>
        </div>
        <div class="card-body">
            <form id="edit_homework_form" method="POST" action="{{route('myclasses.homeworks.update',[$teachingClass->id,$homework->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="new_title">Title</label>
                    <input type="text" name="new_title" class="form-control @error('new_title') is-invalid @enderror" id="new_title" value="{{old('new_title',$homework->title)}}">
                    @error('new_title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_desc">Description</label>
                    <textarea name="new_desc" class="form-control @error('new_desc') is-invalid @enderror" id="new_desc">{{old('new_desc',$homework->description)}}</textarea>
                    @error('new_desc')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_deadline">Deadline</label>
                    <input type="date" name="new_deadline" class="form-control @error('new_deadline') is-invalid @enderror" id="new_deadline" value="{{old('new_deadline',$homework->deadline)}}">
                    @error('new_deadline')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="joined_files">Files</label>
                    <table>
                        @foreach ($files as $file)
                            <tr>
                                <td>
                                    <input type="hidden" id="" name="file_id" value="{{$file->id}}">
                                    <input type="hidden" id="" name="class_id" value="{{$teachingClass->id}}">
                                    <input type="hidden" id="" name="homework_id" value="{{$homework->id}}">
                                </td>
                                <td><a href="#"><i class="far fa-file-alt"></i> {{$file->title}}</a></td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-danger delete_file" data-toggle="modal" data-target="#deleteFileModal"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="form-group">
                    <input type="file" class="@error('new_files') is-invalid @enderror" name="new_files[]" id="file" multiple="true">
                    <small class="form-text text-muted">Max size : 2mb</small>
                    <small class="form-text text-muted">Authorized extensions : pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip</small>
                    @error('new_files')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <hr>
                <div class="text-center">
                    <button class="btn btn-success btn-block" type="submit">
                        <i class="fas fa-lock"></i> Save Changes
                    </button>
                    <a href="{{route('myclasses.homeworks.index',$teachingClass->id)}}" class="btn btn-danger btn-block">
                        <i class="fas fa-trash"></i> Discard Changes
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-modal')
<div class="modal fade" id="deleteFileModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Attention</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this file? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark" data-dismiss="modal">Back</button>
                <form id="delete_file_form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('custom-js')
<script type="text/javascript">
    function deleteFile() {
        var tr = this.parentElement.parentElement;
        var file_id = tr.children[0].children[0].value;
        var class_id = tr.children[0].children[1].value;
        var homework_id = tr.children[0].children[2].value;
    
        //Setting up the action for the delete form 
        document.getElementById("delete_file_form").action = "/myclasses/"+class_id+"/homeworks/"+homework_id+"/documents/"+file_id;
    }
    $(document).ready(function(){
        var deleteFileButtons = document.getElementsByClassName('delete_file');
        for (let i = 0; i < deleteFileButtons.length; i++) {
            deleteFileButtons[i].addEventListener('click',deleteFile);
        }
    })
</script>
@endsection