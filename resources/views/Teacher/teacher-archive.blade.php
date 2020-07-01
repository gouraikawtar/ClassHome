@extends('Teacher.layouts.dashboard-layout')

@section('title')
<title>ClassHome - Archive</title>
@endsection

@section('actions')
<div class="col-md-4 offset-4">
    <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
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
            <input type="hidden" name="class_id" id="class_id" value="{{$class->id}}">
            <h4 class="card-title">{{$class->name}}</h4>
            @if ($class->description == null)
            <p class="card-text">{{$class->name}}</p>
            @else
            <p class="card-text">{{$class->description}}</p> 
            @endif
            <table>
                <tr>
                    <td>
                        <form method="POST" action="{{url('/archive/'.$class->id.'/restore')}}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success">Restore</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{url('/archive/'.$class->id.'/delete')}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Attention</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to restore this?</p>
                </div>
                <div class="modal-footer">
                    {{-- <form id="restore_class_form" method="POST" action="">
                        @csrf
                        @method('PATCH')
                        
                    </form> --}}
                    <button class="btn btn-success" type="submit" id="restore_class">Confirm</button>
    
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
    <!-- RESTORE CLASS MODAL END -->

    <!-- DELETE CLASS MODAL -->
    <div class="modal fade" id="deleteClassModal">
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
                    <form id="delete_class_form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" id="delete_class">Confirm</button>
                    </form>
    
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE CLASS MODAL END -->
@endsection