@extends('layouts.main')

@section('content')
    
    <div>
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                @if($film['poster_path'])
                    <img src="{{'https://image.tmdb.org/t/p/w500/'.$film['poster_path']}}" alt="poster" class="w-64 lg:w-96" width="24rem">
                @else
                    <img src="{{asset('images/default.jpg')}}" alt="poster" class="w-64 lg:w-96" width="24rem">
                @endif
                <p>
                    <div class="placeholder" style="color: yellow;">
                        <i class="fa fa-star"></i>
                        <span class="small">( 5 )</span>
                    </div>
                </p>
            </div>

        <div class="md:ml-24 divFilm" id="{{$film['id']}}">
                <h2 class="text-4xl" id="film_titre">{{$film['title']}}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    <span class="ml-1">{{$film['vote_count']}} votes</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($film['release_date'])->format('d M Y')}}</span>
                    <span class="mx-2">|</span>
                    <span>{{$film['tagline']}}</span>
                </div>
                <p class="text-gray-300 mt-8">{{$film['overview']}}</p>
                @if(Auth::user())
                    <button class="btn btn-success" data-toggle="modal" data-target="#ModalCritic">Ajouter une critique</button>
                @else
                    <span class="badge badge-warning">Veuillez vous connecter pour laisser une critique</span>
                @endif
            </div>
        </div>

        <div class="container" id="criticsList">
            <h1>Les critiques pour : {{$film['title']}}</h1>
            <hr>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalCritic" tabindex="-1" role="dialog" aria-labelledby="ModalCriticLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="bg-secondary modal-content text-black">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalCriticLabel">Ajouter une critique</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="text" name="titre" id=titre class="form-control" placeholder="Le titre">
                    </div>

                    <div class="form-group">
                        <input type="number" min="1" min="3" id="rate" name="rate" class="form-control" placeholder="Noter le film">
                    </div>

                    <div class="form-group">
                        <textarea name="contenu" id="contenu" cols="20" rows="10" class="form-control" placeholder="Le contenu"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success form-control" id="send">Enregistrer</button>
                            <button type="button" class="btn btn-warning form-control" data-dismiss="modal">Fermer</button>
                            </div>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
    </div>

@endsection

<!------ Javascript --------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/script.js')}}">
</script>
<!------/ Javascript --------->