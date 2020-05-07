@extends('Student.myLayouts.posts')
@section('content')

<div class="actuality shadow-sm mt-2">
    <div class="card">
        <div class="post-header d-flex align-items-center bg-transparent p-3">
            <div class="post-profile-photo mr-2">
                <img src= "{{ asset('images/profile.jpg') }}" alt="Profile Photo" class="bg-dark rounded-circle">
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
                    <a class="dropdown-item" href="#"><small>Edit</small></a>
                    <a class="dropdown-item" href="#"><small>Delete</small></a>
                </div>
            </div>
        </div>
        <div class="post-body p-3">
            <p class="m-0 text-justify"> Bonsoir chers étudiants, Je tiens à vous informer que je serai disponible demain à 10h du matin. Je vous recommande vivement de terminer les interfaces afin que vous gagniez du temps pour les prochaines étapes qui sont
                de base plus difficile. Sur ce, il est préférable de booster mainteant tant que vous êtes moins stréssés et que le travail n'est pas aussi acharné. Je vous conseille aussi de modifier en parallèle le rapport, dont
                la partie analyse et conception. Ceci vous aidera d'avoir la vision bien claire à propos de votre application. Bon courage !
            </p>
        </div>
        
        <hr class="m-1 p-0 ">
        <form class="post-addComment d-flex align-items-center bg-transparent p-3 ">
            <div class="comment-profile-photo ">
                <img src="{{ asset('images/profile.jpg') }} " alt="... " class="bg-dark rounded-circle ">
            </div>
            <div class="w-100 mx-2 ">
                <textarea style="font-size: 0.9rem; " class="form-control addComment d-flex d-block align-items-center " rows="1 " placeholder="Add a comment "></textarea>
            </div>
            <div>
                <button class="btn btn-sm btn-warning " placeholder="Add a comment ">Post</button>
            </div>
        </form>
        <div class="comment-body-box d-flex d-block align-items-start p-3 ">
            <div class="comment-profile-photo ">
                <img src=" {{ asset('images/profile.jpg') }} " alt="... " class="bg-dark rounded-circle ">
            </div>
            <div>
                <div class="comment-body w-100 mx-2 ">
                    <div class="m-0 ">
                        <h6 class="mr-auto "><small class="font-weight-bold "> Salma Bouaouid</small>
                        </h6>
                        <span class="text-muted float-right "><small>7j</small></span>
                    </div>
                    <p class="text-justify "><small>D'accord Monsieur, nous serons à l'heure! Merci pour vos efforts!</small>
                    </p>
                </div>
            </div>
        </div>
        <div class="comment-body-box d-flex d-block align-items-start p-3 ">
            <div class="comment-profile-photo ">
                <img src="{{ asset('images/profile.jpg') }}" alt="... " class="bg-dark rounded-circle ">
            </div>
            <div>
                <div class="comment-body w-100 mx-2 ">
                    <div class="m-0 ">
                        <h6 class="mr-auto "><small class="font-weight-bold "> Kawtar Gourai</small>
                        </h6>
                        <span class="text-muted float-right "><small>7j</small></span>
                    </div>
                    <p class="text-justify "><small>Bien reçu, merci Monsieur!</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection