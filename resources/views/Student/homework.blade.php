@extends('Student.myLayouts.layout')

@section('title')
    <title>ClassHome - Homework</title>
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <form method="GET" action="{{route('homeworks.search',$teachingClass->id)}}">
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
        <h5>Homework</h5>
    </div>
    <table class="table table-hover">
        <input type="hidden" name="class_id" id="class_id" value="{{$teachingClass->id}}">
        <thead class="thead table-active">
            <tr>
                <th></th>
                <th>Title</th>
                <th>Created at</th>
                <th>Deadline</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($homeworks as $homework)
            <tr>
                <td>
                    <input type="hidden" id="id_hw" name="id_hw" value="{{$homework->id}}">
                </td>
                <td>{{$homework->title}}</td>
                <td>{{Carbon\Carbon::parse($homework->created_at)->format('Y-m-d')}}</td>
                <td>{{$homework->deadline}}</td>
                <td>
                    <a href="{{route('myclasses.homeworks.show',[$teachingClass->id,$homework->id])}}" class="btn btn-light">
                        <i class="fas fa-info-circle"></i> Details
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$homeworks->links()}}
    </div>
</div>
@endsection
@section('custom-js')
@endsection