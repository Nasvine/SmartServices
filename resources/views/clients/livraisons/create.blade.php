@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Livraisons</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('client') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('livraison.client.index') }}">livraison</a></li>
              <li class="breadcrumb-item active">Acceuil</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-xl-6 xl-100">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Formulaire pour une livraison simple</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('livraison.client.choiseview') }}">Retour</a>
                        {{-- <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Ajouter une livraison</button> --}}
                    </div>
                </div>
              </div>
              <div class="card-body">
                <form class="needs-validation" action="{{ route('livraison.client.store_simple_livraison')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="row mt-3">
                      <div class="col-md-6">
                        <label class="form-label" for="validationCustom01">Adresse de départ</label>
                        <input class="form-control" id="validationCustom01" type="text" name="adresse_depart"  placeholder="Votre adresse de départ">
                        @error('adresse_depart')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="validationCustom01">Adresse de livraison</label>
                        <input class="form-control" id="validationCustom01" type="text" name="adresse_arrivee" placeholder="Votre adresse de livraison">
                        @error('adresse_arrivee')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="row mt-3 g-3">
                    <div class="col-md-6">Type de Colis</label>
                      <select class="form-select col-sm-6" name="type_de_colis" id="validationCustom01">
                        <option value="">Selectionner le type de colis</option>
                        <option value="Document et livre" @selected(old('type_de_colis') == "Document et livre")>Document et livre</option>
                        <option value="Nourriture et boisson" @selected(old('type_de_colis') == "Nourriture et boisson")>Nourriture et boisson</option>
                        <option value="Habit et accessoire" @selected(old('type_de_colis') == "Habit et accessoire")>Habit et accessoire</option>
                        <option value="Fourniture de maison" @selected(old('type_de_colis') == "Fourniture de maison")>Fourniture de maison</option>
                        <option value="Appareil électronique" @selected(old('type_de_colis') == "Appareil électronique")>Appareil électronique</option>
                        <option value="Fourniture de bureau" @selected(old('type_de_colis') == "Fourniture de bureau")>Fourniture de bureau</option>
                        <option value="Produit pharmaceutique" @selected(old('type_de_colis') == "Produit pharmaceutique")>Produit pharmaceutique</option>
                      </select>
                      @error('type_de_colis')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="validationCustom01">Message au livreur</label>
                      <textarea class="form-control" id="validationCustom01" type="text" name="messageLivreur" id="" cols="5" rows="5"></textarea>
                      @error('messageLivreur')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mt-5">
                      <div class="col-md-8">
                      </div>
                      <div class="col-md-4 text-end">
                          <button class="btn" style="background-color: #fe9003; color: #ffffff" type="submit">Valider</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection