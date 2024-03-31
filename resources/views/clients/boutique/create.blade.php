@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Livraison</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('livraison.client.index') }}">Livraison</a></li>
              <li class="breadcrumb-item active">Formulaire</li>
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
                    <div class="col-lg-10">
                        <h5>Formulaire pour renseigner la destination de la livraison</h5>
                    </div>
                    <div class="col-lg-2 text-end">
                      {{-- <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('livraison.gestionnaire.index') }}">Retour</a> --}}
                    </div>
                </div>
              </div>
              <div class="card-body">
                <form class="needs-validation" action="{{ route('livraison.client.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-1">
                        {{-- <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Titre</label>
                          <input class="form-control" id="validationCustom01" type="text" name="titre" value="{{ old('titre') }}" placeholder="Entrer le titre de la livraison">
                          @error('titre')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div> --}}
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Adresse de livraison</label>
                          <input class="form-control" id="validationCustom01" type="text" name="adresse_livraison" value="{{ old('adresse_livraison') }}" placeholder="Entrer l'adresse de livraison">
                          @error('adresse_livraison')
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