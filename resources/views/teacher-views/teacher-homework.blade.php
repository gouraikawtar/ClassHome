@extends('./layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Homework</title>
@endsection

@section('actions')
<div class="col-md-4 offset-1">
    <a href="#" class="btn btn-dark btn-block shadow" data-toggle="modal" data-target="#addHomeworkModal">
        <i class="fas fa-plus"></i> Add homework
    </a>
</div>
<div class="col-md-4 offset-2">
    <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
</div>
@endsection

@section('content')
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Homework</h4>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Deadline</th>
                    <th>At</th>
                    <th colspan="3">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Web Development</td>
                    <td>February 10 2020</td>
                    <td>February 22 2020</td>
                    <td>15h30</td>
                    <td><i class="edit_hw fas fa-edit" id="" data-toggle="modal" data-target="#addHomeworkModal"></i></td>
                    <td><i class="delete_hw fas fa-trash" id=""></i></td>
                    <td><i class="view_hw fas fa-eye" id="" data-toggle="modal" data-target="#viewHwModal"></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>JAVA</td>
                    <td>February 11 2020</td>
                    <td>February 15 2020</td>
                    <td>18h</td>
                    <td><i class="edit_hw fas fa-edit" id="" data-toggle="modal" data-target="#addHomeworkModal"></i></td>
                    <td><i class="delete_hw fas fa-trash" id=""></i></td>
                    <td><i class="view_hw fas fa-eye" id="" data-toggle="modal" data-target="#viewHwModal"></i></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Web Development</td>
                    <td>February 13 2020</td>
                    <td>February 20 2020</td>
                    <td>09h</td>
                    <td><i class="edit_hw fas fa-edit" id="" data-toggle="modal" data-target="#addHomeworkModal"></i></td>
                    <td><i class="delete_hw fas fa-trash" id=""></i></td>
                    <td><i class="view_hw fas fa-eye" id="" data-toggle="modal" data-target="#viewHwModal"></i></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>PL/SQL</td>
                    <td>February 15 2020</td>
                    <td>February 26 2020</td>
                    <td>11h</td>
                    <td><i class="edit_hw fas fa-edit" id="" data-toggle="modal" data-target="#addHomeworkModal"></i></td>
                    <td><i class="delete_hw fas fa-trash" id=""></i></td>
                    <td><i class="view_hw fas fa-eye" id="" data-toggle="modal" data-target="#viewHwModal"></i></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>DBA</td>
                    <td>February 17 2020</td>
                    <td>February 19 2020</td>
                    <td>20h</td>
                    <td><i class="edit_hw fas fa-edit" id="" data-toggle="modal" data-target="#addHomeworkModal"></i></td>
                    <td><i class="delete_hw fas fa-trash" id=""></i></td>
                    <td><i class="view_hw fas fa-eye" id="" data-toggle="modal" data-target="#viewHwModal"></i></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Web Development</td>
                    <td>February 18 2020</td>
                    <td>February 23 2020</td>
                    <td>18h</td>
                    <td><i class="edit_hw fas fa-edit" id="" data-toggle="modal" data-target="#addHomeworkModal"></i></td>
                    <td><i class="delete_hw fas fa-trash" id=""></i></td>
                    <td><i class="view_hw fas fa-eye" id="" data-toggle="modal" data-target="#viewHwModal"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('custom-modal')
    <!-- ADD HOMEWORK MODAL -->
    <div class="modal fade" id="addHomeworkModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Add Homework</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="hw_desc">Description</label>
                            <textarea name="hw_desc"  id="hw_desc" class="form-control" cols="" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline">
                        </div>
                        <div class="form-group">
                            <label for="at">At</label>
                            <input type="time" class="form-control" id="at" name="at">
                        </div>
                        <div class="form-group">
                            <label for="image">Upload file</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label for="file" class="custom-file-label">Choose File</label>
                            </div>
                            <small class="form-text text-muted">Max Size X</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Post</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD HOMEWORK MODAL END -->
    <!-- EDIT HOMEWORK MODAL -->
    <div class="modal fade" id="editHwModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Edit Homework</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" name="deadline" class="form-control" id="deadline">
                        </div>
                        <div class="form-group">
                            <label for="descr">Description</label>
                            <textarea name="descr" class="form-control" id="descr"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT HOMEWORK MODAL END -->

    <!-- VIEW HOMEWORK MODAL -->
    <div class="modal fade" id="viewHwModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Homework details</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="titleView">Title</label>
                            <input type="text" name ="titleView" class="form-control" id="titleView" readonly>
                        </div>
                        <div class="form-group">
                            <label for="creatDateView">Creation date</label>
                            <input type="date" name="creatDateView" class="form-control" id="creatDateView" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deadlineView">Deadline</label>
                            <input type="date" name="deadlineView"class="form-control" id="deadlineView" readonly>
                        </div>
                        <div class="form-group">
                            <label for="atView">At</label>
                            <input type="time" name="atView"class="form-control" id="atView" readonly>
                        </div>
                        <div class="form-group">
                            <label for="descrView">Description</label>
                            <textarea name="descrView" class="form-control" id="descrView" readonly></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
    <!-- VIEW HOMEWORK MODAL END -->
@endsection