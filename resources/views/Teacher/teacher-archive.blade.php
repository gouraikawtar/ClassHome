@extends('Teacher.layouts.dashboard-layout')

@section('title')
<title>ClassHome - Archive</title>
@endsection

@section('actions')
<div class="col-md-4 offset-4">
    <form method="GET" action="{{route('archive.search')}}">
        <div class="input-group">
            <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </form>
</div>
@endsection

@section('custom-msg')
{{-- Alert for class restored --}}
@if (session()->has('class_restored'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('class_restored') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
{{-- Alert for class deleted --}}
@if (session()->has('class_deleted'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('class_deleted') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endsection

@section('content')
@forelse ($archivedClasses as $class)
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">{{$class->name}}</h4>
            @if ($class->description == null)
            <p class="card-text">{{$class->name}}</p>
            @else
            <p class="card-text">{{$class->description}}</p> 
            @endif
            <table>
                <tr>
                    <td>
                        <input type="hidden" name="class_id" id="class_id" value="{{$class->id}}">
                    </td>
                    <td>
                        <button class="btn btn-success restore-class" data-toggle="modal" data-target="#restoreClassModal">Restore</button>
                        {{-- <form method="POST" action="{{url('/archive/'.$class->id.'/restore')}}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success">Restore</button>
                        </form> --}}
                    </td>
                    <td>
                        <button class="btn btn-danger delete-class" data-toggle="modal" data-target="#deleteClassModal">Delete</button>
                        {{-- <form method="POST" action="{{url('/archive/'.$class->id.'/delete')}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@empty
<div class="alert alert-primary" role="alert">
    <strong>No archived classes yet</strong>
</div>
    
@endforelse
@endsection

@section('pagination')
<div class="pagination justify-content-center">
    {{$archivedClasses->links()}}
</div>
@endsection
@section('custom-modal')
    <!-- RESTORE CLASS MODAL -->
    <div class="modal fade" id="restoreClassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Attention</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to restore this class?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                    <form id="restore_class_form" method="POST" action="">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success" type="submit" id="restore_class">Restore</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- RESTORE CLASS MODAL END -->

    <!-- DELETE CLASS MODAL -->
    <div class="modal fade" id="deleteClassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Attention</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this class? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                    <form id="delete_class_form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" id="delete_class">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE CLASS MODAL END -->
@endsection
@section('custom-js')
<script type="text/javascript">
    function restoreClass() {
        var tr = this.parentElement.parentElement;
        var id = tr.children[0].children[0].value;
        document.getElementById("restore_class_form").action = "/archive/"+id+"/restore";
    }
    function deleteClass() {
        var tr = this.parentElement.parentElement;
        var id = tr.children[0].children[0].value;
        document.getElementById("delete_class_form").action = "/archive/"+id+"/delete";
    }
    $(document).ready(function(){
        var restoreButtons = document.getElementsByClassName('restore-class')
        var deleteButtons = document.getElementsByClassName('delete-class')

        for (let i = 0; i < restoreButtons.length; i++) {
            restoreButtons[i].addEventListener('click',restoreClass);
        }
        for (let i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].addEventListener('click',deleteClass);
        }

    })
</script>
    
@endsection