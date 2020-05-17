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
<div class="col-md-9 ">
    <div class="card shadow-sm">
        <div class="card-header ">
            <h4>Grades</h4>
        </div>
        <table class="table table-hover table-responsive ">
            <thead class="thead-light ">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Homework 1
                        <a href="# " class="btn btn-secondary ">
                            <i class="fas fa-angle-double-down "></i>
                        </a>
                    </th>
                    <th>Homework 2
                        <a href="# " class="btn btn-secondary ">
                            <i class="fas fa-angle-double-down "></i>
                        </a>
                    </th>
                    <th>Homework 3
                        <a href="# " class="btn btn-secondary ">
                            <i class="fas fa-angle-double-down "></i>
                        </a>
                    </th>
                    <th>Homework 4
                        <a href="# " class="btn btn-secondary ">
                            <i class="fas fa-angle-double-down "></i>
                        </a>
                    </th>
                    <th>Homework 5
                        <a href="# " class="btn btn-secondary ">
                            <i class="fas fa-angle-double-down "></i>
                        </a>
                    </th>
                    <th>Homework 6
                        <a href="# " class="btn btn-secondary ">
                            <i class="fas fa-angle-double-down "></i>
                        </a>
                    </th>
                    <th>Homework 7
                        <a href="# " class="btn btn-secondary ">
                            <i class="fas fa-angle-double-down "></i>
                        </a>
                    </th>
                    <th>Homework 8
                        <a href="# " class="btn btn-secondary ">
                            <i class="fas fa-angle-double-down "></i>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>First</td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Second</td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            <div class="form-group ">
                                <input type="number " class="form-control form-control-sm " placeholder="Score " id="Score ">
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection