@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link  active show" href="#critiques" data-toggle="tab">
                        <i class="fas fa-stream"></i>
                        La liste des critiques
                    </a></li>
                    <li class="nav-item"><a class="nav-link" href="#profil" data-toggle="tab">
                        <i class="fas fa-user"></i>
                        Mon profil
                    </a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="bg-gray-600 card-body">
                    <div class="tab-content">
                        <!-- profil Tab -->
                        <div class="tab-pane" id="profil">
                            <div class="card text-black mx-auto" style="width: 16rem;">
                                <img class="card-img-top" src="{{asset('images/user.png')}}" alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $data[0]->name }}</h5>
                                  <p class="card-text">{{ $data[0]->email }}</p>
                                  <a href="#critiques" class="badge badge-info" data-toggle="tab">Vous avez {{ $data[1]->count()}} critique(s)</a>
                                </div>
                              </div>
                        </div>
                        
                        
                        <!-- Setting Tab -->
                        <div class="tab-pane active show" id="critiques">
                        @if($data[1]->count() >0)
                            <!-- Card -->
                            @foreach($data[1] as $critic)
                                <div class="card promoting-card">

                                    <!-- Card content -->
                                    <div class="card-body d-flex flex-row">                               
                                    <!-- Content -->
                                        <div id="{{$critic->id}}">
                                            <!-- Title -->
                                            <h5 class="card-title text-black font-weight mb-2">{{$critic->titre}}</h5>
                                            <!-- Subtitle -->
                                            <p class="card-text text-black">{{ $critic->contenu }}</p>
                                            <p class="card-text text-black">{{$critic->created_at->diffForHumans()}}</p>

                                            <form method="POST" action="{{route('delete',$critic->id)}}">
                                                @csrf
                                                <button class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            @endforeach
                        @else
                        <span class="badge badge-warning">Vous avez aucune critique !</span>
                        @endif
                        </div>
                        
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
      </div>
    </div>
@endsection
