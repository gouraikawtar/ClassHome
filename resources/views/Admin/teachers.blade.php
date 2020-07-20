@extends('Admin.layout')

@section('title')
    <title>ClassHome - Teachers</title>
@endsection
    
<!---------------------- HEADER-------------------------------->
@section('header')
<header class="py-1 bg-success text-white">
    <div class="container ">
        <div class="row " id="main_header">
            <div class="col-md-6 ">
                <h4><i class="fas fa-chalkboard-teacher"></i> Teachers </h4>
            </div>
        </div>
    </div>
</header>
@endsection
<!---------------------------- END HEADER------------------------------>


<!------------------------------- SEARCH ------------------------------->
@section('search')
    <button class="btn btn-success">Search</button>
@endsection
<!-- -----------------------------END SEARCH -------------------------------> 



    <!------------------------------- CONTENT ------------------------------->
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Teachers</h4>
        </div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Number of classes created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                    <tr>
                        <td></td>
                        <td> {{ $teacher->first_name }} {{ $teacher->last_name }} </td>
                        <td> {{ $teacher->email }} </td>
                        <td> {{ DB::table('teaching_classes')->where('user_id', $teacher->id)->count() }} </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
    </div>
@endsection
<!------------------------------- END CONTENT ------------------------------->

