@extends('Teacher.layouts.dashboard-layout')

@section('title')
<title>ClassHome - My Classes</title>
@endsection

@section('actions')
<div class="col-md-4 offset-1">
    <a href="#" class="btn btn-success btn-block shadow" data-toggle="modal" data-target="#createClassModal">
        <i class="fas fa-plus"></i> Create Class
    </a>
</div>
<div class="col-md-4 offset-2">
    <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
</div>
@endsection

@section('custom-msg')
{{-- Alert for class created --}}
@if (session()->has('class_created'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('class_created') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
{{-- Alert for class archived --}}
@if (session()->has('class_archived'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('class_archived') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endsection

@section('content')
@forelse ($classes as $class)
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
                        <a href="{{route('myclasses.homeworks.index',$class->id)}}" class="btn btn-primary" role="button">Go</a>
                    </td>
                    <td>
                        <form method="POST" action="{{url('/myclasses/'.$class->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-warning">Archive</button>
                        </form>
                    </td>
                </tr>
            </table>
            {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#archiveClassModal">Archive</button> --}}
        </div>
    </div>
</div>
@empty
<div class="alert alert-primary" role="alert">
    <strong>No classes created yet</strong>
</div>
    
@endforelse

@endsection

@section('pagination')
<div class="pagination justify-content-center">
    {{$classes->links()}}
</div>
@endsection

@section('custom-modal')
    <!-- CREATE CLASS MODAL -->
    <div class="modal fade" id="createClassModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Create new class</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('myclasses.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_name">Class name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="class_name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback" id="name_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class_section">Section</label>
                            <select name="section" class="custom-select @error('section') is-invalid @enderror" id="class_section">
                                @if (old('section') != '')
                                <option selected>{{old('section')}}</option>
                                @else
                                <option selected disabled value="">Choose section..</option>
                                @endif
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Highschool">Highschool</option>
                                <option value="University/College">University/College</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('section')
                            <div class="invalid-feedback" id="section_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class_object">Object (optional)</label>
                            <input type="text" name="object" class="form-control @error('object') is-invalid @enderror" id="class_object" value="{{old('object')}}">
                            @error('object')
                            <div class="invalid-feedback" id="object_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class_descr">Description (optional)</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="class_descr"  value="{{old('description')}}">
                            @error('description')
                            <div class="invalid-feedback" id="desc_error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="create" class="btn btn-success" id="create" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CREATE CLASS MODAL END -->

    <!-- ARCHIVE CLASS MODAL -->
    <div class="modal fade" id="archiveClassModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Attention</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to archive this?</p>
                </div>
                <div class="modal-footer">
                    <form id="archive_class_form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-warning" type="submit" id="archive_class">Confirm</button>
                    </form>
    
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ARCHIVE CLASS MODAL END -->
@endsection