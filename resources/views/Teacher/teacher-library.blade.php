@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Library</title>
@endsection

@section('actions')
<div class="col-md-4 offset-4">
    <form method="GET" action="{{route('library.search',$teachingClass->id)}}">
        <div class="input-group">
            <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </form>
</div>
@endsection

@section('content')
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Library</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                <tr>
                    <td></td>
                    <td>{{$file->title}}</td>
                    <td>{{Carbon\Carbon::parse($file->created_at)->format('Y-m-d')}}</td>
                    <td>
                        <a href="{{route('homeworks.download',$file->title)}}" class="btn btn-light">
                            <i class="fas fa-download"></i> Download 
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-center">
            {{$files->links()}}
        </div>
    </div>
</div>
@endsection

@section('custom-modal')
@endsection