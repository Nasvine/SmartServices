@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               livraisons</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('gestionnaire') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('livraison.gestionnaire.index') }}">livraison</a></li>
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
                          <h5>Listes des livraisons</h5>
                      </div>
                      <div class="col-lg-6 text-end">
                          {{-- <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('livraison.client.create') }}">Ajouter une livraison</a> --}}
                          {{-- <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Ajouter une livraison</button> --}}
                      </div>
                  </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="pills-warninglivraison-tab" data-bs-toggle="pill" href="#pills-warninglivraison" role="tab" aria-controls="pills-warninglivraison" aria-selected="false"><i class="icofont icofont-contacts"></i>Liste des Livraisons</a></li>
                      <li class="nav-item"><a class="nav-link" id="pills-warninghistorique-tab" data-bs-toggle="pill" href="#pills-warninghistorique" role="tab" aria-controls="pills-warninghistorique" aria-selected="false"><i class="icofont icofont-contacts"></i>Historiques</a></li>
                    </ul>
                    <div class="tab-content" id="pills-warningtabContent">              
                      <div class="tab-pane fade show active" id="pills-warninglivraison" role="tabpanel" aria-labelledby="pills-warninglivraison-tab">
                        <livewire:LivraisonGestionnaireList />
                      </div>
                      <div class="tab-pane fade" id="pills-warninghistorique" role="tabpanel" aria-labelledby="pills-warninghistorique-tab">
                        <livewire:HistoriqueLivraisonGestionnaire />
                      </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection