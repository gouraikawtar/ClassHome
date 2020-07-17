@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Posts</title>
@endsection

@section('actions')
<div class="col-md-4 offset-md-4">
    <a href="#" class="btn btn-dark btn-block shadow" data-toggle="modal" data-target="#addPostModal">
        <i class="fas fa-plus"></i> Add post
    </a>
</div>
@endsection

@section('content')
<div class="col-md-7">
    <!-- POSTS AND THEIR COMMENTS -->
    <div class="actuality shadow-sm mt-2">
        @forelse($posts as $post)
        <div class="card mt-4 shadow">
            <div class="post-header d-flex align-items-center bg-transparent p-3">
                <div class="post-profile-photo mr-2">
                    @if ( App\User::find($post->user_id)->role=='student' && App\User::find($post->user_id)->gender=='female')
                        <img src="{{ asset('images/student_female.jpg') }} " alt="... " class="bg-dark rounded-circle ">
                    @elseif ( App\User::find($post->user_id)->role == 'student'&& App\User::find($post->user_id)->gender == 'male')
                        <img src="{{ asset('images/student_male.jpg') }} " alt="... " class="bg-dark rounded-circle ">
                    @elseif ( App\User::find($post->user_id)->role == 'teacher')
                        <img src="{{ asset('images/teacher.jpg') }} " alt="... " class="bg-dark rounded-circle ">
                    @endif
                </div>
                <div class="post-details">
                    <h6 class="m-0">{{ App\User::find($post->user_id)->first_name }} {{ App\User::find($post->user_id)->last_name }}</h6>
                    <p class="text-muted m-0"><small> {{ $post -> updated_at}} </small></p>
                </div>
                @if ( App\User::find($post->user_id)->id == Auth::user()->id )
                    <div class="dropdown ml-auto">
                        <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <!---------------EDIT--------------->
                            <button class="dropdown-item" data-mytitle="{{$post->title}}" data-mycontent="{{$post->content}}"
                            data-id="{{$post->id}}" data-status="{{$post->status}}" data-destination="{{$post->destination}}" 
                            data-toggle="modal" data-target="#editPostModal" >
                                <small>Edit</small>
                            </button>
                            <!---------------END EDIT--------------->

                            <!--------------- DELETE --------------->
                            <button class="dropdown-item" data-postid="{{$post->id}}" data-toggle="modal" data-target="#deletePostModal" >
                                <small>Delete</small>
                            </button>
                            <!--------------- END DELETE --------------->
                            </form>
                        </div>
                    </div>
                @else
                    <!--------------- DELETE --------------->
                    <div class="dropdown ml-auto">
                        <div class="form-group"> 
                            <button class="btn btn-light" data-postid="{{$post->id}}" data-toggle="modal" data-target="#deletePostModal" >
                                <b><span class="glyphicon" aria-hidden="true">&times;</span></b>
                            </button>
                        </div>
                    </div>
                    <!--------------- END DELETE --------------->
                @endif
            </div>
            <div class="post-body p-3">
                <h5> {{ $post -> title}} </h5>
                <p class="m-0 text-justify"> {{ $post->content }} </p>
                <!------------------------ FILES --------------------->
                @forelse ($post->files as $file)
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="card p-0 bg-light">
                            <div class="card-body d-flex justify-content-between align-items-center p-2">
                                    <p class="m-0">{{ $file->title }}</p>
                                    <a href="{{route('files.download',$file->title)}}" class="p-1"><i class="fas fa-upload" style="font-size: 1.3rem"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
                <!------------------------END FILES --------------------->
            </div>
            
            <hr class="m-1 p-0 ">
            <form class="post-addComment d-flex align-items-center bg-transparent p-3" method="POST" action=" {{ route('myclasses.comments.store', $teachingClass->id) }}" >
                @csrf
                <div class="comment-profile-photo ">
                    @if ( Auth::user()->role == 'student' && Auth::user()->gender == 'female')
                        <img src="{{ asset('images/student_female.jpg') }} " alt="... " class="bg-dark rounded-circle ">
                    @elseif ( Auth::user()->role == 'student' && Auth::user()->gender == 'male')
                        <img src="{{ asset('images/student_male.jpg') }} " alt="... " class="bg-dark rounded-circle ">
                    @endif
                </div>
                <div class="w-100 mx-2 ">
                    <textarea style="font-size: 0.9rem; " class="form-control addComment d-flex d-block align-items-center " rows="1 " placeholder="Add a comment" name="content" ></textarea>
                    <input name="post_id" value="{{ $post->id }}" type="hidden">
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-warning">Post</button>
                </div>
            </form>
            @forelse ($post->comments()->get() as $comment)
            <div class="comment-body-box d-flex d-block align-items-start p-3 ">
                <div class="comment-profile-photo ">
                    @if ( App\User::find($comment->user_id)->role=='student' && App\User::find($comment->user_id)->gender=='female')
                        <img src="{{ asset('images/student_female.jpg') }} " alt="... " class="bg-dark rounded-circle ">
                    @elseif ( App\User::find($comment->user_id)->role == 'student'&& App\User::find($comment->user_id)->gender == 'male')
                        <img src="{{ asset('images/student_male.jpg') }} " alt="... " class="bg-dark rounded-circle ">
                    @elseif ( App\User::find($comment->user_id)->role == 'teacher')
                        <img src="{{ asset('images/teacher.jpg') }} " alt="... " class="bg-dark rounded-circle ">
                    @endif
                </div>
                <div>
                    <div class="comment-body w-100 mx-2 ">
                        <button type="submit" class="close" aria-label="Close" data-commentid="{{$comment->id}}" data-toggle="modal" data-target="#deleteCommentModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="m-0 ">
                            <h6 class="mr-auto "><small class="font-weight-bold "> 
                                {{  App\User::find($comment->user_id)->first_name }} {{  App\User::find($comment->user_id)->last_name }} </small>
                            </h6>
                        </div>
                        <p class="text-justify "><small> {{ $comment -> content}} </small>
                        <span class="text-muted float-right "><small> {{ $comment -> created_at-> diffForHumans() }} </small></span>
                        </p>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
    
        </div>
        @empty
            <p> No posts yet!</p>
        @endforelse
    </div>
</div>
@endsection

@section('custom-modal')
<!-- ADD POST MODAL -->
<div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Add Post</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ route('myclasses.posts.store', $teachingClass->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @include('teacher-posts-form')
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" type="submit" >Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD POST MODAL END -->

<!-- EDIT POST MODAL -->
<div class="modal fade" id="editPostModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Edit Post</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('editPost')}}" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="classId" value="{{ $teachingClass->id}}" >
                    <input type="hidden" name="postId" id="postId" value="" >
                    @include('teacher-posts-form')
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" type="submit" >Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- EDIT POST MODAL END -->

<!-- DELETE POST MODAL -->
<div class="modal fade" id="deletePostModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Attention</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('deletePost') }}">
                    @csrf
                    <input type="hidden" name="classId" value="{{ $teachingClass->id}}" >
                    <input type="hidden" name="postId" id="postId" value="" >
                    <button class="btn btn-warning" type="submit">Confirm</button>
                </form>

                <button class="btn btn-dark" data-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>
<!-- END DELETE POST MODAL --> 

<!-- DELETE COMMENT MODAL -->
<div class="modal fade" id="deleteCommentModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Attention</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('deleteComment') }}">
                    @csrf
                    <input type="hidden" name="classId" value="{{ $teachingClass->id}}" >
                    <input type="hidden" name="commentId" id="commentId" value="" >
                    <button class="btn btn-warning" type="submit">Confirm</button>
                </form>

                <button class="btn btn-dark" data-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>
<!-- END DELETE POST MODAL -->

@endsection

@section('custom-js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

<!------------------------------------------ POST DESTINATION ---------------------------------->
<script type="text/javascript">
    function chooseDestination()
        {
            if (document.getElementById("status").value === "public") {
                document.getElementById("destination").disabled='true';
            } else {
                document.getElementById("destination").disabled='';
            }
        }
</script>
<!--------------------------------------- POST DESTINATION END --------------------------------->

<!-------------------------------------------- EDIT POST--------------------------------------->
<script>
    
    $('#editPostModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var postId = button.data('id') 
        var title = button.data('mytitle') 
        var content = button.data('mycontent') 
        var status= button.data('status')
        var destination= button.data('destination')

        var modal = $(this);

        modal.find('.modal-body #postId').val(postId);
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #content').val(content);
        modal.find('.modal-body #status').val(status); 
        modal.find('.modal-body #destination').val(destination); 

    });

    $('#deletePostModal').on('shown.bs.modal', function(event){
        var button = $(event.relatedTarget) 
        var postId = button.data('postid') 

        var modal = $(this);

        modal.find('.modal-footer #postId').val(postId);
    });

    $('#deleteCommentModal').on('shown.bs.modal', function(event){
        var button = $(event.relatedTarget) 
        var commentId = button.data('commentid') 

        var modal = $(this);

        modal.find('.modal-footer #commentId').val(commentId);
    });

</script>
<!--------------------------------------EDIT POST END------------------------------------------>
@endsection