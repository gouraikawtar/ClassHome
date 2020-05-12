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
                <th>#</th>
                <th>Title</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>First</td>
                <td>15</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Second</td>
                <td>20</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Third</td>
                <td>18</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Fourth</td>
                <td>17</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Fifth</td>
                <td>16</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Sixth</td>
                <td>19</td>
            </tr>
        </tbody>
    </table>
</div>
    
@endsection