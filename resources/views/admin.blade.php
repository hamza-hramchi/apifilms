@extends('layouts.main')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="#critiques" data-toggle="tab">
                    <i class="fas fa-stream"></i>
                    La liste des critiques
                </a></li>
                <li class="nav-item"><a class="nav-link active show" href="#users" data-toggle="tab">
                    <i class="fas fa-user"></i>
                    Les utilisateurs
                </a></li>
                </ul>
            </div><!-- /.card-header -->

            <div class="container tab-content">

                <!--- les critiques --->
                <div class="tab-pane" id="critiques">
                    <div class="table-responsive{-sm|-md|-lg|-xl}">
                        <table class="table table-hover border border-30">
                            <thead class="thead-light">
                                <th scope="col">Id critique</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Film</th>
                                <th scope="col">Contenu de la critique</th>
                                <th scope="col">Action</th>
                            </thead>
                
                            <tbody>
                            @forelse($data as $d)
                                <tr id="{{$d[0]}}">
                                <td class="text-black">{{$d[0]}}</td>
                                <td class="text-lg text-black">{{$d[1]}}</td>
                                <td class="text-lg text-black">{{$d[2]}}</td>
                                <td class="text-lg text-black">{{$d[3]}}</td>
                                <td>
                                    <form method="POST" action="{{route('delete',$d[0])}}">
                                        @csrf
                                        <button class="btn btn-danger" onclick= " return confirm('Vous confirmez la suppression ?');">Supprimer</button>
                                    </form>
                                </td>
                                </tr>
                                @empty
                                <h3 class="badge-danger text-center">Pas de critiques !</h3>
                            @endforelse
                            </tbody>
            
                        </table>
                    </div>
                </div>
            
                <!--- les utilisateurs --->
                <div class="tab-pane active show" id="users">
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </thead>

                        <tbody id="contenu">
                            @foreach ($users as $user)
                                <tr class="ligneUser" id="{{$user->id}}">
                                    <td class="text-black">{{$user->id}}</td>
                                    <td class="text-black text-lg">{{$user->name}}</td>
                                    <td class="text-black text-lg">{{$user->email}}</td>
                                    <td class="text-black text-lg">{{$user->type}}</td>
                                    <td class="text-black text-lg">
                                        <form onsubmit="return confirm('Vous voulez confirmer la suppression ?');" method="POST" action="{{route('deleteUser',$user->id)}}">
                                            @csrf
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                        <button onclick="getUser({{$user->id}})" class="btn btn-warning" data-toggle="modal" data-target="#UserModal">Modifier</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="UserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content text-black">
                    <div class="modal-header">
                    <h5 class="modal-title" id="UserModalLabel">Modifier l'utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input type="text" name="nom" id="nom" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <select name="type" id="type" class="form-control">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="modal-footer">
                                    <div class="form-group"></div>
                                    <button type="submit" onclick="save({{$user->id}})" class="btn btn-success form-control">Enregistrer</button>
                                    <button type="button" class="btn btn-warning form-control" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
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