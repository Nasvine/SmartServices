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
                            <h5>Modification des Infos d'un restaurant</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <a href="{{ route('restaurant_client.client.index') }}" class="btn " type="button" style="background-color: #fe9003; color: #ffffff"><i class="icofont icofont-arrow-left"></i> <span class="ms-2">Retour</span></a >
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="myLargeModalLabel">Formulaire pour modifier un restaurant</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
                                                <label class="form-label" for="validationCustom01">Selectionner le(s) catégories de produits</label>
                                                <select class="form-select js-example-placeholder-multiple col-sm-6" name="category_plats[]" id="validationCustom01" data-placeholder="Selectionner le(s) permissions" multiple="multiple">
                                                    @foreach ($category_plats as $k => $category_plat)
                                                        <option value="{{ $category_plat->id }}">{{ $k + 1 }} - {{ $category_plat->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_plats')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Description</label>
                                                <textarea class="form-control" type="text" name="description" cols="3" rows="5" value="{{ $restaurant->description }}"></textarea> 
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
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