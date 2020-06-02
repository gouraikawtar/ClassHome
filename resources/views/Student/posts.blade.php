@extends('Student.myLayouts.posts')
@section('content')

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
                                data-postId="{{$post->id}}" data-toggle="modal" data-target="#editPostModal" >
                            <small>Edit</small>
                        </button>
                        <!---------------END EDIT--------------->

                        <!--------------- DELETE --------------->
                        <form method="POST" action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item" data-toggle="modal" type="submit">
                                <small>Delete</small>
                            </button>
                        <!--------------- END DELETE --------------->
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div class="post-body p-3">
            <h5> {{ $post -> title}} </h5>
            <p class="m-0 text-justify"> {{ $post->content }} </p>
        </div>
        
        <hr class="m-1 p-0 ">
        <form class="post-addComment d-flex align-items-center bg-transparent p-3" method="POST" action=" {{ action('CommentController@store') }}" >
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
                    @if ( App\User::find($comment->user_id)->id == Auth::user()->id )
                        <!--------------- DELETE --------------->
                        <form method="POST" action="{{ route('comments.destroy', $comment->id ) }}">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="close" aria-label="Close" >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </form>
                        <!--------------- END DELETE --------------->
                    @endif
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

@endsection