@extends('Student.myLayouts.layout')

@section('title')
    <title>ClassHome - Contributions</title>
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <form method="GET" action="{{route('contributions.search',$teachingClass->id)}}">
        <div class="input-group">
            <input type="text" name="search" id="search" class="form-control shadow-sm" placeholder="Search">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </form>
</div>
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
@if (session()->has('contribution_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('contribution_deleted') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header bg-light">
        <h5>Contributions</h5>
    </div>
    <table class="table table-hover">
        <input type="hidden" name="class_id" id="class_id" value="{{$teachingClass->id}}">
        <thead class="thead table-active">
            <tr>
                <th></th>
                <th>Title</th>
                <th>Status</th>
                <th>Import</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($homeworks as $homework)
            <tr>
                <td>
                    <input type="hidden" id="id_hw" name="id_hw" value="{{$homework->id}}">
                    <input type="hidden" id="id_ctrb" name="id_ctrb" value="{{$homework->contributions()->where('user_id','=',Auth::user()->id)->first()['id']}}">
                </td>
                <td>{{$homework->title}}</td>
                <td>{{$homework->contributions()->where('user_id','=',Auth::user()->id)->first()['status']}}</td>
                @if (Carbon\Carbon::now()->format('Y-m-d') > $homework->deadline)
                <td>
                    Deadline expired
                </td>
                @else
                    @if ($homework->contributions()->where('user_id','=',Auth::user()->id)->first()['status'] == 'Issued')
                    <td>
                        <a href="#" class="btn btn-light edit_contr" data-toggle="modal" data-target="#editModal">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </td>                     
                    @else
                    <td>
                        <a href="#" class="btn btn-light import_contr" data-toggle="modal" data-target="#importModal">
                            <i class="fas fa-file-import"></i> Import
                        </a>
                    </td>
                    @endif
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$homeworks->links()}}
    </div>
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
                @method('PUT')
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

<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Delete contribution</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this contribution and replace it with another one? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark" data-dismiss="modal">Back</button>
                <form id="delete_contr_form" method="POST" action="/myclasses/">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script type="text/javascript">
    function importContribution() {
        var tr = this.parentElement.parentElement;
        var homework_id = tr.children[0].children[0].value;

        document.getElementById("import_contr_form").action = "/import/"+homework_id;
    }
    function deleteContribution() {
        var tr = this.parentElement.parentElement;
        var homework_id = tr.children[0].children[0].value;
        var contribution_id = tr.children[0].children[1].value;
        
        document.getElementById("delete_contr_form").action = "/delete/"+homework_id+"/contribution/"+contribution_id;
    }
    $(document).ready(function(){
        //Get class id
        var class_id = document.getElementById("class_id").value;
        //
        var importContr = document.getElementsByClassName('import_contr');
        var deleteContr = document.getElementsByClassName('edit_contr');
        for (let i = 0; i < importContr.length; i++) {
            importContr[i].addEventListener("click", importContribution);
        }
        for (let i = 0; i < deleteContr.length; i++) {
            deleteContr[i].addEventListener("click", deleteContribution);
        }
    })
</script>
@endsection