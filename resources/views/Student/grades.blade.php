@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Grades</title>
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <form method="GET" action="{{route('grades.search',$teachingClass->id)}}">
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
    <div class="card-header">
        <h5>Grades</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th></th>
                <th>Title</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($homeworks as $homework)
            <tr>
                <td></td>
                <td>{{$homework->title}}</td>
                @if ($homework->contributions()->where('user_id','=',Auth::user()->id)->first()!=null)
                <td>{{$homework->contributions()->where('user_id','=',Auth::user()->id)->first()['grade']}}</td>
                @else
                <td>Not graded yet</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$homeworks->links()}}
    </div>
</div>
    
@endsection