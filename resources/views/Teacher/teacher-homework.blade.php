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
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-msg" style="display: none;">
        <strong>Homework created successfully</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
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
                    <td>{{$homework->deadline}}</td>
                    <td><a href="{{route('myclasses.homeworks.show',[$teachingClass->id,$homework->id])}}"><i class="view_hw fas fa-info-circle" id=""></i></a></td>
                    <td><i class="delete_hw fas fa-trash" id="" data-toggle="modal" data-target="#deleteHwModal"></i></td>
                    @if (Carbon\Carbon::now()->format('Y-m-d') > $homework->deadline)
                    <td></td>
                    @else
                    <td><a href="{{route('myclasses.homeworks.edit',[$teachingClass->id,$homework->id])}}"><i class="edit_hw fas fa-edit" id=""></i></a></td>
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

@section('custom-modal')
    <!-- ADD HOMEWORK MODAL -->
    <div class="modal fade" id="addHomeworkModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Add Homework</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                  </button>
                </div>
                <form id="create_homework_form" method="POST" action="{{route('myclasses.homeworks.store',$teachingClass->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }} ">
                            <span class="invalid-feedback">
                                <strong id="title-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc"  id="desc" class="form-control" cols="" rows="5">{{ old('desc') }} </textarea>
                            <span class="invalid-feedback">
                                <strong id="description-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline') }} ">
                            <span class="invalid-feedback">
                                <strong id="deadline-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="file" class="" name="files[]" id="file" multiple="true">
                            <small class="form-text text-muted">Max size : 2mb</small>
                            <small class="form-text text-muted">Authorized extensions : pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip</small>
                            <span class="invalid-feedback">
                                <strong id="files-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="create" class="btn btn-dark" type="submit">Create</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- ADD HOMEWORK MODAL END -->

    {{-- DELETE HOMEWORK MODAL --}}
<div class="modal fade" id="deleteHwModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Attention</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this homework? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark" data-dismiss="modal">Back</button>
                <form id="delete_homework_form" method="POST" action="/homeworks/">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- DELETE HOMEWORK MODAL END --}}
@endsection
@section('custom-js')
<script type="text/javascript">
    function deleteHomework() {
        var class_id = document.getElementById("class_id").value;
        var tr = this.parentElement.parentElement;
        var homework_id = tr.children[0].children[0].value;
    
        //Setting up the action for the delete form 
        document.getElementById("delete_homework_form").action = "/myclasses/"+class_id+"/homeworks/"+homework_id;
    }

    $(document).ready(function(){
        if(localStorage.getItem("success")){
            $('#success-msg').css('display', 'block')
            localStorage.clear();
        }
        //Store data using Ajax
        var class_id = document.getElementById("class_id").value;
        $('#create_homework_form').on('submit', function(e){
            e.preventDefault();
            $('#title-error').html("");
            $('#title').removeClass('is-invalid');
            $('#description-error').html("");
            $('#desc').removeClass('is-invalid');
            $('#deadline-error').html("");
            $('#deadline').removeClass('is-invalid');
            $('#files-error').html("");
            $('#file').removeClass('is-invalid');
            
            $.ajax({
                type:'POST',
                url:'/myclasses/'+class_id+'/homeworks',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    if(data.errors) {
                        if(data.errors.title){
                            $('#title-error').html(data.errors.title[0]);
                            $('#title').addClass('is-invalid');
                        }
                        if(data.errors.desc){
                            $('#description-error').html(data.errors.desc[0]);
                            $('#desc').addClass('is-invalid');
                        }
                        if(data.errors.deadline){
                            $('#deadline-error').html(data.errors.deadline[0]);
                            $('#deadline').addClass('is-invalid');
                        }
                        if(data.errors.files){
                            $('#files-error').html(data.errors.files[0]);
                            $('#file').addClass('is-invalid');
                        }
                    }
                    if(data.success) {
                        $('#addHomeworkModal').modal('hide');
                        localStorage.setItem("success",data.OperationStatus)
                        window.location.reload();
                    }
                },
            })
        })
        //alert(1);

        var delete_icon = document.getElementsByClassName("delete_hw");

        for (let i = 0; i < delete_icon.length; i++) {
            delete_icon[i].addEventListener("click",deleteHomework);
        }
    })
</script>
@endsection