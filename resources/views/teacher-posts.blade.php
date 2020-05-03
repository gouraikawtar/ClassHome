@extends('teacher-class-layout')

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
        <div class="card">
            <div class="post-header d-flex align-items-center bg-transparent p-3">
                <div class="post-profile-photo mr-2">
                    <img src="{{ asset('/images/profile.png') }}" alt="Profile Photo" class="bg-secondary rounded-circle">
                </div>
                <div class="post-details">
                    <h6 class="m-0">Abdessamad BELANGOUR</h6>
                    <p class="text-muted m-0"><small>11 Février 2020, 19:45</small></p>
                </div>
                <div class="dropdown ml-auto">
                    <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addPostModal"><small>Edit</small></a>
                        <a class="dropdown-item" href="#"><small>Delete</small></a>
                    </div>
                </div>
            </div>
            <div class="post-body p-3">
                <p class="m-0 text-justify"> Bonsoir chers étudiants, Je tiens à vous informer que je serai disponible demain à 10h du matin. Je vous recommande vivement de terminer les interfaces afin que vous gagniez du temps pour les prochaines étapes qui sont
                    de base plus difficile. Sur ce, il est préférable de booster mainteant tant que vous êtes moins stréssés et que le travail n'est pas aussi acharné. Je vous conseille aussi de modifier en parallèle le rapport, dont la
                    partie analyse et conception. Ceci vous aidera d'avoir la vision bien claire à propos de votre application. Bon courage !
                </p>
            </div>
            <hr class="m-1 p-0">
            <form class="post-addComment d-flex align-items-center bg-transparent p-3">
                <div class="comment-profile-photo">
                    <img src="{{ asset('/images/profile.png') }}" alt="..." class="bg-secondary rounded-circle">
                </div>
                <div class="w-100 mx-2">
                    <textarea class="form-control addComment d-flex d-block align-items-center" rows="1" placeholder="Add comment.."></textarea>
                </div>
                <div>
                    <button class="btn btn-sm btn-warning" placeholder="Ajouter une commentaire">Post</button>
                </div>
            </form>
            <div class="comment-body-box d-flex d-block align-items-start p-3">
                <div class="comment-profile-photo">
                    <img src="{{ asset('/images/profile.png') }}" alt="..." class="bg-secondary rounded-circle">
                </div>
                <div>
                    <div class="comment-body w-100 mx-2">
                        <div class="m-0">
                            <h6 class="mr-auto"><small class="font-weight-bold"> Salma Bouaouid</small></h6>
                            <span class="text-muted float-right"><small>7j</small></span>
                        </div>
                        <p class="text-justify"><small>D'accord Monsieur, nous serons à l'heure! Merci pour vos efforts!</small></p>
                    </div>
                </div>
            </div>
            <div class="comment-body-box d-flex d-block align-items-start p-3">
                <div class="comment-profile-photo">
                    <img src="{{ asset('/images/profile.png') }}" alt="..." class="bg-secondary rounded-circle">
                </div>
                <div>
                    <div class="comment-body w-100 mx-2">
                        <div class="m-0">
                            <h6 class="mr-auto"><small class="font-weight-bold"> Kawtar Gourai</small></h6>
                            <span class="text-muted float-right"><small>7j</small></span>
                        </div>
                        <p class="text-justify"><small>Bien reçu, merci Monsieur!</small></p>
                    </div>
                </div>
            </div>
        </div>
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
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">To</label>
                        <select class="form-control" id="category">
                            <option value="all">All</option>
                            <option value="groups">Groups</option>
                      </select>
                    </div>
                    <div class="form-group" id="gp">
                        <label for="groups">Choose group</label>
                        <select class="form-control" id="chooseGroups" disabled>
                            <option value="group 1">Group 1</option>
                            <option value="group 2">Group 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload file</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file">
                            <label for="file" class="custom-file-label">Choose File</label>
                        </div>
                        <small class="form-text text-muted">Max Size X</small>
                    </div>
                    <div class="form-group">
                        <label for="anno_body">Body</label>
                        <textarea name="anno_body" class="form-control" cols="20" rows="5"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark" data-dismiss="modal">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- ADD POST MODAL END -->
@endsection