@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Boutiques</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('client') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active">Boutique</li>
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
                            <h5>Créaction d'un restaurant</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <a href="{{ route('restaurant_client.client.index') }}" class="btn " type="button" style="background-color: #fe9003; color: #ffffff"><i class="icofont icofont-arrow-left"></i> <span class="ms-2">Retour</span></a >
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="myLargeModalLabel">Formulaire de création d'un restaurant</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
                                                    <textarea class="form-control" type="text" name="description" id="" cols="5" rows="3"></textarea>  
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