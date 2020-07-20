@extends('Admin.layout')

@section('title')
    <title>ClassHome - Students</title>
@endsection
    
<!---------------------- HEADER-------------------------------->
@section('header')
<header class="py-1 bg-warning text-white">
    <div class="container ">
        <div class="row " id="main_header">
            <div class="col-md-6 ">
                <h4><i class="fas fa-user-graduate"></i> Students</h4>
            </div>
        </div>
    </div>
</header>
@endsection
<!---------------------------- END HEADER------------------------------>


<!------------------------------- SEARCH ------------------------------->
@section('search')
    <button class="btn btn-warning">Search</button>
@endsection
<!-- -----------------------------END SEARCH -------------------------------> 



    <!------------------------------- CONTENT ------------------------------->
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Students</h4>
        </div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Number of classes joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                    <tr>
                        <td></td>
                        <td> {{ $student->first_name }} {{ $student->last_name }} </td>
                        <td> {{ $student->email }} </td>
                        <td> {{ DB::table('class_subscriptions')->where('user_id', $student->id)->count() }} </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
    </div>
@endsection
<!------------------------------- END CONTENT ------------------------------->

