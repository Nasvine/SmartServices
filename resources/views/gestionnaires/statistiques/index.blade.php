@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Statistiques</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('gestionnaire') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('statistique.index') }}">livraison</a></li>
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
                          <h5>Statistique des livraisons</h5>
                      </div>
                      <div class="col-lg-6 text-end">
                          {{-- <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('livraison.client.create') }}">Ajouter une livraison</a> --}}
                          {{-- <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Ajouter une livraison</button> --}}
                      </div>
                  </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="pills-warninglivraison-tab" data-bs-toggle="pill" href="#pills-warninglivraison" role="tab" aria-controls="pills-warninglivraison" aria-selected="false"><i class="icofont icofont-contacts"></i>Sommation des livraisons</a></li>
                      <li class="nav-item"><a class="nav-link" id="pills-warninghistorique-tab" data-bs-toggle="pill" href="#pills-warninghistorique" role="tab" aria-controls="pills-warninghistorique" aria-selected="false"><i class="icofont icofont-contacts"></i>Historiques</a></li>
                    </ul>
                    <div class="tab-content" id="pills-warningtabContent">              
                      <div class="tab-pane fade show active" id="pills-warninglivraison" role="tabpanel" aria-labelledby="pills-warninglivraison-tab">
                        <div wire:poll class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                      <div class="row">
                                        <div class="col-md-8">
                                          <h6>Livraison journalière</h6>
                                        </div>
                                        <div class="col-md-4">
                                          <form action="{{ route('statistique.index') }}" method="post">
                                            @csrf
                                            <div class="btn-group">
                                                <input class="form-control" id="validationCustom01" type="date" name="day_date" placeholder="Entrer la date">
                                                @error('day_date')
                                                  <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                               <button class="btn " type="submit" style="background-color: #fe9003; color: #ffffff">Search</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th class="text-center" scope="col"><b>#</b></th>
                                                <th class="text-center" scope="col"><b>Nom du client</b></th>
                                                <th class="text-center" scope="col"><b>Adresse de Départ</b></th>
                                                <th class="text-center" scope="col"><b>Adresse de Livraison</b></th>
                                                <th class="text-center" scope="col"><b>Numéro du client</b></th>
                                                <th class="text-center" scope="col"><b>Heure de confirmation</b></th>
                                                <th class="text-center" scope="col"><b>Date de la course</b></th>
                                                <th class="text-center" scope="col"><b>Heure de début</b></th>
                                                <th class="text-center" scope="col"><b>Heure de fin</b></th>
                                                <th class="text-center" scope="col"><b>Status</b></th>
                                                <th class="text-center" scope="col"><b>Type de paiement</b></th>
                                                <th class="text-center" scope="col"><b>Tarif de la course</b></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($statistique_today as $k => $value)
                                                    <tr>
                                                      <th scope="row">{{ $k + 1 }}</th>
                                                      <td class="text-center">{{ $value->user->profile->first_name }} {{ $value->user->profile->last_name }}</td>
                                                      <td class="text-center">{{ $value->adresse_depart }}</td>
                                                      <td class="text-center">{{ $value->adresse_arrivee }}</td>
                                                      <td class="text-center">{{ $value->user->profile->phone }}</td>
                                                      <td class="text-center">{{ $value->heure_de_confirmation }}</td>
                                                      <td class="text-center">{{ $value->created_at->format('d/m/Y')}}</td>
                                                      <td class="text-center">{{ $value->created_at->format('H:m') }}</td>
                                                      <td class="text-center">{{ $value->updated_at->format('H:m') }}</td>
                                                      <td class="text-center"> 
                                                          <span class="badge badge-warning">
                                                              {{ $value->status_livraison }}
                                                          </span>
                                                      </td>
                                                      <td class="text-center">{{ $value->mode_de_paiement }}</td>
                                                      <td class="text-center">{{ $value->prix }}</td>
                                                  </tr>
                                                  <tr >
                                                      <td class="text-end" colspan="11"><b><u>Total:</u></b></td>
                                                      <td class="text-center" >{{ $value->prix }}</td>
                                                  </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="card-footer">
                                      <div class="row">
                                        <div class="col-md-6">
                                             <span><b><u>Chiffre d'affaire réalisé:</u></b> {{ $statistics_delivery_pay_today }} FCFA</span>
                                        </div>
                                        <div class="col-md-6">
                                          <span><b><u>Nombre de course impayées:</u></b> {{ $statistics_delivery_notpay_today }}</span>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-warninghistorique" role="tabpanel" aria-labelledby="pills-warninghistorique-tab">
                      </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection