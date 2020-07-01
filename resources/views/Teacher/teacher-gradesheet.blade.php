@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Grades</title>
@endsection

@section('actions')
<div class="col-md-4 offset-4">
    <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
</div>
@endsection

@section('content')
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header ">
            <h4>Grades</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light ">
                <tr>
                    <th></th>
                    <th>Student</th>
                    <th colspan="2">Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student) 
                {{-- {{$contribution = App\Contribution::where([['user_id','=',$student->id],['homework_id','=',$homework_id],])->first()}} --}}
                <tr>
                    <form id="grade_contribution" method="POST" action="">
                        @csrf
                        @method('UPDATE')
                        <td></td>
                        {{--  --}}
                        <td>{{$student->first_name}} {{$student->last_name}}</td>
                        <td><input type="number" step="0.01" class="form-control" name="grade" id="" value="{{App\Contribution::where([['user_id','=',$student->id],['homework_id','=',$homework_id],])->first()->grade}}"></td>
                        <td><button class="btn btn-success" type="submit">Save</button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection