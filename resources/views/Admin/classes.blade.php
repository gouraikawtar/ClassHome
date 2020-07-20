@extends('Admin.layout')

@section('title')
    <title>ClassHome - Classes</title>
@endsection
    
<!---------------------- HEADER-------------------------------->
@section('header')
<header class="py-1 bg-primary text-white">
    <div class="container ">
        <div class="row " id="main_header">
            <div class="col-md-6 ">
                <h4> <i class="fas fa-school"></i> Classes</h4>
            </div>
        </div>
    </div>
</header>
@endsection
<!---------------------------- END HEADER------------------------------>


<!------------------------------- SEARCH ------------------------------->
@section('search')
    <button class="btn btn-primary">Search</button>
@endsection
<!-- -----------------------------END SEARCH -------------------------------> 



    <!------------------------------- CONTENT ------------------------------->
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Classes</h4>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>Class name</th>
                    <th>Section</th>
                    <th>Created by</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachingClasses as $class)
                <tr>
                    <td></td>
                    <td> {{ $class->name }} </td>
                    <td> {{ $class->section }} </td>
                    <td> {{ App\User::find($class->user_id)->first_name }} {{ App\User::find($class->user_id)->last_name }} </td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
<!------------------------------- END CONTENT ------------------------------->
