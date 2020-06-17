@extends('Student.myLayouts.layout')

@section('title')
    <title>ClassHome - Homework</title>
@endsection

@section('content')
@if (session()->has('contribution_imported'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('contribution_imported') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header bg-light">
        <h5>Homework</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead table-active">
            <tr>
                <th></th>
                <th>Title</th>
                <th>Created at</th>
                <th>Deadline</th>
                <th>Expires at</th>
                <th>Status</th>
                <th>Details</th>
                <th>Contribution</th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" name="class_id" id="class_id" value="{{$teachingClass->id}}">
            @foreach ($homeworks as $homework)
            <tr>
                <td>
                    <input type="hidden" id="id_hw" name="id_hw" value="{{$homework->id}}">
                </td>
                <td>{{$homework->title}}</td>
                <td>{{Carbon\Carbon::parse($homework->created_at)->format('Y-m-d')}}</td>
                <td>{{$homework->deadline}}</td>
                <td>{{Carbon\Carbon::parse($homework->expire_at)->format('H:i')}}</td>
                <td>{{$homework->status}}</td>
                <td>
                    <a href="{{route('myclasses.homeworks.show',[$teachingClass->id,$homework->id])}}">
                        <i class="fas fa-angle-double-right"></i> Details
                    </a>
                </td>
                <td>
                    <a href="#" class="import_contr" data-toggle="modal" data-target="#importModal">
                        <i class="fas fa-file-import"></i> Import
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- IMPORT MODAL -->
<div class="modal fade" id="importModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Import contribution</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="import_contr_form" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" name="contributions[]" class="@error('contributions') is-invalid @enderror" id="contributions" multiple="true">
                        @error('contributions')
                        <div class="invalid-feedback" id="files_error">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Max size : 2mb</small>
                        <small class="form-text text-muted">Authorized extensions : pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="import" class="btn btn-dark" type="submit" id="import_contribution">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
    <script src="{{ mix('/js/student-homework.js') }}"></script>
@endsection