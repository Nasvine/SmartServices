@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Restaurants</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('client') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active">Restaurant</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Liste des restaurants</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <a href="{{ route('restaurant_client.client.create') }}" class="btn " type="button" style="background-color: #fe9003; color: #ffffff" >Créer une restaurant</a>
{{--                             <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-whatever="@fat">Créer une restaurant</button>
 --}}                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Photo du restaurant</th>
                        <th scope="col" class="text-center">Nom du restaurant</th>
                        <th scope="col" class="text-center">Description</th>
                        <th scope="col" class="text-center">Adresse</th>
                        <th scope="col" class="text-center">Téléphone</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Ville</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($restaurants as $k => $restaurant )
                            <tr>
                                <th class="text-center" scope="row">{{ $k + 1 }}</th>
                                <td class="text-center"> <img src="{{ asset('restaurants/images/'.$restaurant->photo) }}" height="30px" width="30px" alt=""></td>
                                <td class="text-center">{{ $restaurant->nom_restaurant }}</td>
                                <td class="text-center">{{ $restaurant->description }}</td>
                                <td class="text-center">{{ $restaurant->adresse_restaurant }}</td>
                                <td class="text-center">{{ $restaurant->telephone }}</td>
                                <td class="text-center">{{ $restaurant->email }}</td>
                                <td class="text-center">{{ $restaurant->ville }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('restaurant_client.client.edit', $restaurant->id) }}" class="btn text-primary"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                        <a href="{{ route('restaurant_client.client.show', $restaurant->id) }}" class="btn text-dark"><i class="icon-eye" style="font-size: 20px;"></i></a>
                                        
                                        <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('restaurant_client.client.destroy', $restaurant->id) }}">
                                            @csrf
                                            @method('DELETE')
                                                <button class="btn text-danger" style="font-size: 20px;"><i class="icon-trash"></i></button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade editrestaurant_{{ $restaurant->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Formulaire pour modifier un restaurant</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>      
                                        <form action="{{ route('restaurant_client.client.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Name</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="nom_restaurant" value="{{ $restaurant->nom_restaurant }}">
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Adresse</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="adresse_restaurant" value="{{ $restaurant->adresse_restaurant }}">
                                                            @error('adresse_restaurant')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Ville</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="ville" value="{{ $restaurant->ville }}">
                                                            @error('ville')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Téléphone</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="telephone" value="{{ $restaurant->telephone }}">
                                                            @error('telephone')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">email</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="email" value="{{ $restaurant->email }}">
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Photo</label>
                                                            <input class="form-control" type="file" name="photo" aria-label="file example">   
                                                            @error('photo')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Description</label>
                                                            <textarea class="form-control" type="text" name="description" cols="3" rows="5" value="{{ $restaurant->description }}"></textarea> 
                                                            @error('description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button class="btn" style="background-color: #fe9003; color: #ffffff" type="submit">Valider</button>
                                                </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>

    



    <div class="col-sm-12">
        <div class="">
          <div class="">
          </div>
          <div class="card-body btn-showcase">
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Formulaire d'ajout d'un restaurant</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('restaurant_client.client.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Name</label>
                                            <input class="form-control" id="recipient-name" type="text" name="nom_restaurant" placeholder="Entrer le nom du restaurant">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Adresse</label>
                                            <input class="form-control" id="recipient-name" type="text" name="adresse_restaurant" placeholder="Entrer l'adresse du restaurant">
                                            @error('adresse_restaurant')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Ville</label>
                                            <input class="form-control" id="recipient-name" type="text" name="ville" placeholder="Entrer la ville du restaurant">
                                            @error('ville')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Téléphone</label>
                                            <input class="form-control" id="recipient-name" type="text" name="telephone" placeholder="Entrer le numéro du restaurant">
                                            @error('telephone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">email</label>
                                            <input class="form-control" id="recipient-name" type="text" name="email" placeholder="Entrer l'email du restaurant">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Photo</label>
                                            <input class="form-control" type="file" name="photo" aria-label="file example">   
                                            @error('photo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Description</label>
                                            <textarea class="form-control" type="text" name="description" id="" cols="5" rows="3"></textarea>  
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" style="background-color: #fe9003; color: #ffffff" type="submit">Valider</button>
                            </div>
                    </form>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
@endsection