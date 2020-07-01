@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Grades</title>
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
                <td>15</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$homeworks->links()}}
    </div>
</div>
    
@endsection