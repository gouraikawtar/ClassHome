@extends('Student.myLayouts.dashboard')

@section('title')
<title>ClassHome - Archive</title>
@endsection

@section('actions')
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
            <strong class="card-text">This class has been archived by its creator</strong>
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