@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Grades</title>
@endsection

@section('actions')
<div class="col-md-4 offset-4">
    <form method="GET" action="{{route('gradesheet.search',[$teachingClass->id, $homework->id])}}">
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
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>All grades must be out of 20 (grade/20)</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header ">
            <h4>Grades</h4>
            <h6>{{$homework->title}}</h6>
        </div>
        <table class="table table-hover">
            <thead class="thead-light ">
                <tr>
                    <th></th>
                    <th>Student</th>
                    <th>Contribution status</th>
                    <th>Grade</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student) 
                <form method="POST" action="{{ url('/grading/'.$homework->contributions()->where('user_id','=',$student->id)->first()['id']) }}">
                    @csrf
                    @method('PUT')
                    <tr>
                        <td></td>
                        <td>{{$student->first_name}} {{$student->last_name}}</td>
                        <td>{{$homework->contributions()->where('user_id','=',$student->id)->first()['status']}}</td>
                        <td>
                            <div class="input-group">
                                <input type="number" step="0.01"  min="0" max="20" class="form-control" name="grade" value="{{ old('grade',$homework->contributions()->where('user_id','=',$student->id)->first()['grade']) }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="submit">Save</button>
                                </span>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-center">
            {{$students->links()}}
        </div>
    </div>
</div>
@endsection

@section('custom-js')

@endsection