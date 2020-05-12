@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Members</title>
@endsection

@section('content')

<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header">
        <h5>Teachers</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Abdessamad BELANGOUR</td>
                <td>belangour@gmail.com </td>
                <td>
                    <a href="#">
                        <i class="fas fa-envelope"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- STUDENTS-->
<div class="card shadow-sm p-0 mb-5 rounded mt-2">
    <div class="card-header">
        <h5>Students</h5>
    </div>
    <table class="table">
        <thead class="thead table-active">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Salma BOUAOUID</td>
                <td>salmabouaouid57@gmail.com </td>
                <td>
                    <a href="#">
                        <i class="fas fa-envelope"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Kawtar GOURAI</td>
                <td>k.gourai@gmail.com</td>
                <td>
                    <a href="#">
                        <i class="fas fa-envelope"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
    
@endsection