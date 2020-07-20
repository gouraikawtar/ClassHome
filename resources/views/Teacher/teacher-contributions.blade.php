@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Contributions</title>    
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <form method="GET" action="{{route('contributions.search',$teachingClass->id)}}">
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
            <h4>Homework contributions</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Deadline</th>
                    <th>Contributions folder</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($homeworks as $homework)
                <tr>
                    <td></td>
                    <td><i class="fas fa-file-archive"></i> {{$homework->title}}</td>
                    <td>{{Carbon\Carbon::parse($homework->created_at)->format('Y-m-d')}}</td>
                    <td>{{$homework->deadline}}</td>
                    @if (Carbon\Carbon::now()->format('Y-m-d') <= $homework->deadline)
                    <td>No contributions to download yet</td>
                    @else
                    <td><a href=" {{ route('contributions.download', $homework->id) }} " class="btn btn-light"><i class="fas fa-download"></i> Download</a></td>
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