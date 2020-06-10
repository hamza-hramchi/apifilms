@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link  active show" href="#critiques" data-toggle="tab">La liste des critiques</a></li>
                    <li class="nav-item"><a class="nav-link" href="#profil" data-toggle="tab">Mon profil</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="bg-gray-600 card-body">
                    <div class="tab-content">
                        <!-- profil Tab -->
                        <div class="tab-pane" id="profil">
                            <div class="card text-black" style="width: 18rem;">
                                <img class="card-img-top" src="{{asset('images/user.png')}}" alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title">{{$user->name}}</h5>
                                  <p class="card-text">{{$user->email}}</p>
                                </div>
                              </div>
                        </div>

                        <!-- Setting Tab -->
                        <div class="tab-pane active show" id="critiques">
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                            </ul>
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