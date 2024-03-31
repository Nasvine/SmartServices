@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
                Inventaires</h3>
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
                          <h5>Inventaire des livreurs</h5>
                      </div>
                      <div class="col-lg-6 text-end">
                          {{-- <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('livraison.client.create') }}">Ajouter une livraison</a> --}}
                          {{-- <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Ajouter une livraison</button> --}}
                      </div>
                  </div>
                </div>
                <div class="card-body">
                    <div wire:poll class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <form action="{{ route('inventaire_livreur.index') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="form-label" for="exampleFormControlSelect9">Selectionner le nom du client</label>
                                                <select class="form-select digits" id="exampleFormControlSelect9" name="livreur_id" data-placeholder="Selectionner le nom du client">
                                                    @foreach ($livreurs as $k => $livreur)
                                                       <option value="{{ $livreur->id }}">{{ $k + 1 }} - {{ $livreur->first_name }} {{ $livreur->last_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('livreur_name')
                                                  <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label" for="exampleFormControlSelect9">Entrer la date</label>
                                                <input class="form-control" id="validationCustom01" type="date" name="day_date" placeholder="Entrer la date">
                                                @error('day_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                
                                            </div>
                                            <div class="col-md-2" style="margin-top: 30px;">
                                                <button class="btn " type="submit" style="background-color: #fe9003; color: #ffffff">Search</button>
                                            </div>
                                        </div>
                                    </form>
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
                                            <th class="text-center" scope="col"><b>Nom du livreur</b></th>
                                            <th class="text-center" scope="col"><b>Date de la course</b></th>
                                            <th class="text-center" scope="col"><b>Heure de début</b></th>
                                            <th class="text-center" scope="col"><b>Heure de fin</b></th>
                                            <th class="text-center" scope="col"><b>Status</b></th>
                                            <th class="text-center" scope="col"><b>Moyen de paiement</b></th>
                                            <th class="text-center" scope="col"><b>Tarif de la course</b></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inventaire_clients as $k => $value)
                                               @if ($value->status_livraison == "en cours de validation" || $value->status_livraison == "Valider" || $value->status_livraison == "Rejeter")

                                               @elseif ($value->status_livraison == "en cours de livraison" || $value->status_livraison == "Démarrer" || $value->status_livraison == "Terminer" || $value->status_livraison == "Non payée" || $value->status_livraison == "Payée")
                                                    <tr>
                                                        <th scope="row">{{ $k + 1 }}</th>
                                                        <td class="text-center">{{ $value->user->profile->first_name }} {{ $value->user->profile->last_name }}</td>
                                                        <td class="text-center">{{ $value->adresse_depart }}</td>
                                                        <td class="text-center">{{ $value->adresse_arrivee }}</td>
                                                        <td class="text-center">{{ $value->user->profile->phone }}</td>
                                                        <td class="text-center">
                                                            {{ $value->livreur_name->first_name }} {{ $value->livreur_name->last_name }}
                                                        </td>
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
                                                    {{-- <tr >
                                                        <td class="text-end" colspan="11"><b><u>Total:</u></b></td>
                                                        <td class="text-center" >{{ $value->prix }}</td>
                                                    </tr> --}}
                                               @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="card-footer">
                                  {{-- <div class="row">
                                    <div class="col-md-6">
                                         <span><b><u>Chiffre d'affaire réalisé:</u></b> {{ $statistics_delivery_pay_today }} FCFA</span>
                                    </div>
                                    <div class="col-md-6">
                                      <span><b><u>Nombre de course impayées:</u></b> {{ $statistics_delivery_notpay_today }}</span>
                                    </div>
                                  </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection