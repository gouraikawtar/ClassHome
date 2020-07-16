@extends('Student.myLayouts.dashboard')

@section('title')
<title>ClassHome - My Classes</title>
@endsection

@section('actions')
<div class="col-md-4 offset-1">
    <a href="#" class="btn btn-warning btn-block shadow" data-toggle="modal" data-target="#joinClassModal">
        <i class="fas fa-plus"></i> Join Class
    </a>
</div>
<div class="col-md-4 offset-2">
    <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
</div>
@endsection

@section('custom-msg')
@if (session()->has('class_joined'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('class_joined') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session()->has('junction_failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('junction_failed') }}</strong>
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
            <a href="{{route('myclasses.posts.index',$class->id)}}" class="btn btn-primary">Go</a>
        </div>
    </div>
</div>
@empty
<div class="alert alert-primary" role="alert">
    <strong>No classes joined yet</strong>
</div>
@endforelse
@endsection

@section('pagination')
<div class="pagination justify-content-center">
    {{$classes->links()}}
</div>
@endsection

@section('custom-modal')
    <!-- JOIN CLASS MODAL -->
    <div class="modal fade" id="joinClassModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Join class</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('/join')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_code">Enter class code to join</label>
                            <input type="text" class="form-control" id="class_code" name="code">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" id="join" type="submit">Join</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./JOIN CLASS MODAL -->
@endsection
