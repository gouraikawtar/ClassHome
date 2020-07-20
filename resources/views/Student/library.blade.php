@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Library</title>
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <form method="GET" action="{{route('library.search',$teachingClass->id)}}">
        <div class="input-group">
            <input type="text" name="search" id="search" class="form-control shadow-sm" placeholder="Search">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </form>
</div>
@endsection

@section('content')
    
<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header bg-light">
        <h5>Homeworks Library</h5>
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
            @foreach ($homework_files as $homework_file)
            <tr>
                <td></td>
                <td>{{$homework_file->title}}</td>
                <td>{{Carbon\Carbon::parse($homework_file->created_at)->format('Y-m-d')}}</td>
                <td>
                    <a href="{{ route('homeworks.download',$homework_file->title) }}" class="btn btn-light">
                        <i class="fas fa-download"></i> Download
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$homework_files->links()}}
    </div>
</div>
<br>
<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header bg-light">
        <h5>Posts Library</h5>
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
            @foreach ($post_files as $post_file)
            <tr>
                <td></td>
                <td>{{$post_file->title}}</td>
                <td>{{Carbon\Carbon::parse($post_file->created_at)->format('Y-m-d')}}</td>
                <td>
                    <a href="{{ route('files.download',$post_file->title) }}" class="btn btn-light">
                        <i class="fas fa-download"></i> Download
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$post_files->links()}}
    </div>
</div>
@endsection