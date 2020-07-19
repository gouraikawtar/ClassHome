@extends('Teacher.layouts.dashboard-layout')

@section('title')
<title>ClassHome - My Classes</title>
@endsection

@section('actions')
<div class="col-md-3 offset-0">
    <a href="#" class="btn btn-success btn-block shadow" data-toggle="modal" data-target="#createClassModal">
        <i class="fas fa-plus"></i> Create Class
    </a>
</div>
<div class="col-md-3">
    <a href="#" class="btn btn-primary btn-block shadow" data-toggle="modal" data-target="#collaborateModal">
        <i class="fas fa-plus"></i> Co-teach Class
    </a>
</div>
<div class="col-md-4 offset-2">
    <form method="GET" action="{{route('myclasses.search')}}">
        <div class="input-group">
            <input type="text" name="search" id="search" class="form-control shadow" placeholder="Search">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </form>
</div>
@endsection

@section('custom-msg')
{{-- Alert for class created --}}
<div class="alert alert-success alert-dismissible fade show" role="alert" id="success-msg" style="display: none;">
    <strong>Class created successfully</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{-- Alert for class archived --}}
@if (session()->has('class_archived'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('class_archived') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endsection

@section('content')
@forelse ($classes as $class)
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">{{$class->name}}</h4>
            @if ($class->description == null)
            <p class="card-text">{{$class->name}}</p>
            @else
            <p class="card-text">{{$class->description}}</p> 
            @endif
            <table>
                <tr>
                    <td>
                        <input type="hidden" name="class_id" id="class_id" value="{{$class->id}}">
                    </td>
                    <td>
                        <a href="{{route('myclasses.posts.index',$class->id)}}" class="btn btn-primary" role="button">Go</a>
                    </td>
                    <td>
                        <button class="btn btn-warning archive-class" data-toggle="modal" data-target="#archiveClassModal">Archive</button>
                    </td>
                </tr>
            </table>
            {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#archiveClassModal">Archive</button> --}}
        </div>
    </div>
</div>
@empty
@endforelse

@forelse ($collaboration as $class)
<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-80 shadow-sm">
        <div class="card-body">
            <input type="hidden" name="class_id" id="class_id" value="{{$class->id}}">
            <h4 class="card-title">{{$class->name}}</h4>
            @if ($class->description == null)
            <p class="card-text">{{$class->name}}</p>
            @else
            <p class="card-text">{{$class->description}}</p> 
            @endif
            <table>
                <tr>
                    <td>
                        <input type="hidden" name="class_id" id="class_id" value="{{$class->id}}">
                    </td>
                    <td>
                        <a href="{{route('myclasses.posts.index',$class->id)}}" class="btn btn-primary" role="button">Go</a>
                    </td>
                    <td>
                        <button class="btn btn-warning archive-class" data-toggle="modal" data-target="#archiveClassModal">Archive</button>
                    </td>
                </tr>
            </table>
            {{-- <div class="btn-group">
                <a href="{{route('myclasses.posts.index',$class->id)}}" class="btn btn-primary" role="button">Go</a>
                <form method="POST" action="{{url('/myclasses/'.$class->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning">Archive</button>
                </form>
            </div> --}}
            {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#archiveClassModal">Archive</button> --}}
        </div>
    </div>
</div>
@empty
@endforelse

@endsection

@section('pagination')
<div class="pagination justify-content-center">
    {{$classes->links()}}
</div>
@endsection

@section('custom-modal')
    <!-- CREATE CLASS MODAL -->
    <div class="modal fade" id="createClassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Create new class</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="create_class_form" method="POST" action="{{ route('myclasses.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_name">Class name</label>
                            <input type="text" name="name" class="form-control" id="class_name" value="{{old('name')}}">
                            <span class="invalid-feedback">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="class_section">Section</label>
                            <select name="section" class="custom-select" id="class_section">
                                @if (old('section') != '')
                                <option selected>{{old('section')}}</option>
                                @else
                                <option selected disabled value="">Choose section..</option>
                                @endif
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Highschool">Highschool</option>
                                <option value="University/College">University/College</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="invalid-feedback">
                                <strong id="section-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="class_object">Object (optional)</label>
                            <input type="text" name="object" class="form-control" id="class_object" value="{{old('object')}}">
                            <span class="invalid-feedback">
                                <strong id="object-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="class_descr">Description (optional)</label>
                            <input type="text" name="description" class="form-control" id="class_descr"  value="{{old('description')}}">
                            <span class="invalid-feedback">
                                <strong id="description-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="create" class="btn btn-success" id="create" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CREATE CLASS MODAL END -->

     <!-- CREATE CLASS MODAL -->
    <div class="modal fade" id="createClassModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Create new class</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('myclasses.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_name">Class name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="class_name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback" id="name_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class_section">Section</label>
                            <select name="section" class="custom-select @error('section') is-invalid @enderror" id="class_section">
                                @if (old('section') != '')
                                <option selected>{{old('section')}}</option>
                                @else
                                <option selected disabled value="">Choose section..</option>
                                @endif
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Highschool">Highschool</option>
                                <option value="University/College">University/College</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('section')
                            <div class="invalid-feedback" id="section_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class_object">Object (optional)</label>
                            <input type="text" name="object" class="form-control @error('object') is-invalid @enderror" id="class_object" value="{{old('object')}}">
                            @error('object')
                            <div class="invalid-feedback" id="object_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class_descr">Description (optional)</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="class_descr"  value="{{old('description')}}">
                            @error('description')
                            <div class="invalid-feedback" id="desc_error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="create" class="btn btn-success" id="create" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CREATE CLASS MODAL END -->

    <!-- CO-TEACH CLASS MODAL -->
    <div class="modal fade" id="collaborateModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Co-teach class</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('collaboration')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_code">Enter class code to co-teach</label>
                            <input type="text" class="form-control" placeholder="Enter code" id="class_code" name="code">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="join" type="submit">Join</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./JOIN CLASS MODAL -->

    <!-- ARCHIVE CLASS MODAL -->
    <div class="modal fade" id="archiveClassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Attention</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to archive this class?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Back</button>
                    <form id="archive_class_form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-warning" type="submit" id="archive_class">Archive</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ARCHIVE CLASS MODAL END -->
@endsection
@section('custom-js')

<script type="text/javascript">
    function archiveClass() {
        var tr = this.parentElement.parentElement;
        var id = tr.children[0].children[0].value;
        document.getElementById("archive_class_form").action = "/myclasses/"+id;
    }

    $(document).ready(function(){
        if(localStorage.getItem("success")){
            $('#success-msg').css('display', 'block')
            localStorage.clear();
        }
        $('#create_class_form').on('submit', function(e){
            e.preventDefault();
            $('#name-error').html("");
            $('#class_name').removeClass('is-invalid');
            $('#section-error').html("");
            $('#class_section').removeClass('is-invalid');
            $('#object-error').html("");
            $('#class_object').removeClass('is-invalid');
            $('#description-error').html("");
            $('#class_descr').removeClass('is-invalid');
            $.ajax({
                type:'POST',
                url:'/myclasses',
                data:$('#create_class_form').serialize(),
                success:function(data){
                    if(data.errors) {
                        if(data.errors.name){
                            $('#name-error').html(data.errors.name[0]);
                            $('#class_name').addClass('is-invalid');
                        }
                        if(data.errors.section){
                            $('#section-error').html(data.errors.section[0]);
                            $('#class_section').addClass('is-invalid');
                        }
                        if(data.errors.object){
                            $('#object-error').html(data.errors.object[0]);
                            $('#class_object').addClass('is-invalid');
                        }
                        if(data.errors.description){
                            $('#description-error').html(data.errors.description[0]);
                            $('#class_descr').addClass('is-invalid');
                        }
                    }
                    if(data.success) {
                        $('#createClassModal').modal('hide');
                        localStorage.setItem("success",data.OperationStatus)
                        window.location.reload();
                    }
                },
            })
        })
        //alert(1);
        var archiveButtons = document.getElementsByClassName('archive-class')
        for (let i = 0; i < archiveButtons.length; i++) {
            archiveButtons[i].addEventListener('click',archiveClass); 
        }
    })
</script>

@endsection