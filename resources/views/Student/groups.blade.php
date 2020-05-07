@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Groups</title>
@endsection

@section('content')

<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header">
        <h5>Groups</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Group's name</th>
                <th>Responsible</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>First</td>
                <td>Salma Bouaouid</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#groupMembers">
                        <i class="fas fa-angle-double-right"></i> Details
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Second</td>
                <td>Kawtar Gourai</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#groupMembers">
                        <i class="fas fa-angle-double-right"></i> Details
                    </a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Third</td>
                <td>Lamiaa Jazouli</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#groupMembers">
                        <i class="fas fa-angle-double-right"></i> Details
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- GROUP MEMBERS MODAL -->
<div class="modal fade" id="groupMembers">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white btn-shadow">
                <h5 class="modal-title">Group members</h5>
                <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>haha hahaha</td>
                            <td>haha@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>haha hahaha</td>
                            <td>haha@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>haha hahaha</td>
                            <td>haha@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>haha hahaha</td>
                            <td>haha@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection