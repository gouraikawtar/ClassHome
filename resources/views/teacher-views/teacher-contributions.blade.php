@extends('./layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Contributions</title>    
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
</div>    
@endsection

@section('content')
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Homework contributions</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Creation date</th>
                    <th>Deadline</th>
                    <th>Download folder</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Web developpement</td>
                    <td>02/10/2020</td>
                    <td>02/18/2020</td>
                    <td><i class="fas fa-download"></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Java</td>
                    <td>02/22/2020</td>
                    <td>02/28/2020</td>
                    <td><i class="fas fa-download"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection