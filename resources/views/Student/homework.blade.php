@extends('Student.myLayouts.layout')

@section('title')
    <title> ClassHome - Homework</title>
@endsection

@section('content')

<div class="card shadow-sm p-0 mb-5 rounded ">
    <div class="card-header bg-light">
        <h5>Homework</h5>
    </div>
    <table class="table table-hover">
        <thead class="thead table-active">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Deadline</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Web </td>
                <td>10-02-2020</td>
                <td>15-02-2020</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#detailsModal">
                        <i class="fas fa-angle-double-right"></i> Details
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#importModal">
                        <i class="fas fa-file-import"></i> Import
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>JAVA</td>
                <td>10-02-2020</td>
                <td>15-02-2020</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#detailsModal">
                        <i class="fas fa-angle-double-right"></i> Details
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#importModal">
                        <i class="fas fa-file-import"></i> Import
                    </a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>PL/SQL</td>
                <td>10-02-2020</td>
                <td>15-02-2020</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#detailsModal">
                        <i class="fas fa-angle-double-right"></i> Details
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#importModal">
                        <i class="fas fa-file-import"></i> Import
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- DETAILS MODAL -->
<div class="modal fade" id="detailsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Details</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" disabled value="Web Development">
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea name="editor1" class="form-control" rows="5" disabled>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum
                        </textarea>
                    </div>
                    <div class="m-4">
                        <a href="#">
                            <h6><i class="fas fa-download"></i> Download File</h6>
                        </a>
                        <small class="form-text text-muted">Size X</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- IMPORT MODAL -->
<div class="modal fade" id="importModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Import contribution</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="image">Upload file</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file">
                            <label for="file" class="custom-file-label">Choose File</label>
                        </div>
                        <small class="form-text text-muted">Max Size X</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection