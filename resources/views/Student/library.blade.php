@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Library</title>
@endsection

@section('content')
    
<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header bg-light">
        <h5>Library</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>First</td>
                <td>10-02-2020</td>
                <td>
                    <a href="#">
                        <i class="fas fa-download"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Second</td>
                <td>11-02-2020</td>
                <td>
                    <a href="details.html">
                        <i class="fas fa-download"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection