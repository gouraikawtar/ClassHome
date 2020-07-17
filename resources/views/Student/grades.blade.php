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