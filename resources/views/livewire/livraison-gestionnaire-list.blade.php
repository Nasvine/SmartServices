<div>
    <div wire:poll class="row mt-5">
      @foreach ($livraisons as $k => $livraison)
        @if ($livraison->status_livraison == "Rejeter" || $livraison->status_livraison == "Payée")

          
        @else
          <div class="col-xl-4 col-sm-6">
                <div class="card mb-4">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center" style="background-color: #fdf0d2;">
                      <div class="badge bg" style="background-color: #fe9003;;">Livraison {{ $k + 1 }}</div>
                    </li>
                    <li class="list-group-item">
                      @if ($livraison->status_livraison == "en cours de validation")
                        <div class="badge bg-success ms-5 ">En cours de validation</div>
                      @elseif ($livraison->status_livraison == "Confirmer")
                        <span class="badge bg-success text-center" style="margin-left: 100px">Confirmer</span>
                      @elseif ($livraison->status_livraison == "Valider")
                        <span class="badge bg-success text-center" style="margin-left: 100px">Valider</span>
                      @elseif ($livraison->status_livraison == "en cours de livraison" || $livraison->status_livraison == "Démarrer")
                        <div class="badge bg-success text-center" style="margin-left: 130px">En cours</div>
                      @elseif ($livraison->status_livraison == "Terminer")
                        <div class="badge bg-success text-center" style="margin-left: 100px">Payement</div>
                        @elseif ($livraison->status_livraison == "Non payée")
                        <div class="badge bg-success text-center" style="margin-left: 20px">Payement en cours de confirmation</div>
                      @elseif ($livraison->status_livraison == "Payée")
                        <div class="ribbon ribbon-warning">Livraison Terminer</div>
                      @endif
                    </li>
                    <li class="list-group-item text-center">
                        <div class="card mb-4">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Numéro du Client:</u></li>
                              <li class="list-group-item">+229 {{ $livraison->user->profile->phone }}</li>
                              <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Adresse de Départ:</u></li>
                              <li class="list-group-item">{{ $livraison->adresse_depart }}</li>
                              <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Adresse d'arrivée:</u></li>
                              <li class="list-group-item">{{ $livraison->adresse_arrivee }}</li>
                              
                              @if (isset($livraison->type_de_colis) && isset($livraison->messageLivreur))
                                <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Type de colis:</u></li>
                                <li class="list-group-item">{{ $livraison->type_de_colis }}</li>
                                <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Message au Livreur:</u></li>
                                <li class="list-group-item">{{ $livraison->messageLivreur}}</li>
                                <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Prix de la livraison:</u></li>
                                <li class="list-group-item">{{ $livraison->prix }}</li>
                              @endif
                              @if ($livraison->status_livraison == "en cours de validation" || $livraison->status_livraison == "Valider" || $livraison->status_livraison == "Confirmer")

                              @else
                              <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Livreur associé:</u></li>
                              <li class="list-group-item">
                                {{ $livraison->livreur_name->first_name }}
                                {{ $livraison->livreur_name->last_name }}
                              </li>
                              @endif

                            </ul>
                        </div>
                        @if (isset($livraison->commande->ligne_commandes))
                          <h6><u>Liste des produits et Prix:</u></h6>
                            <p>
                            {{-- @if (!empty($livraison->commande->ligne_commandes)) --}}
                              @foreach ($livraison->commande->ligne_commandes as $key => $value) 
                                    <table class="table" border="1px">
                                        <tr>
                                            <td>{{ $value->quantite }}</td>
                                            <td>{{ $value->nom_du_produit }}</td>
                                            <td class="text-center">{{ $value->prix * $value->quantite }} FCFA</td>
                                        </tr>
                                    </table>
                              @endforeach
                            </p>
                          @else
                              {{-- <table class="table" border="1px">
                                  <tr>
                                      <td>Pas de Produit</td>
                                  </tr>
                              </table> --}}
                          @endif
                    </li>
                    <li class="list-group-item" style="background-color: #d9ecfa;">
                      <div class="btn-group">
                        <div class="col-xl-12 col-md-12">
                          @if ($livraison->status_livraison == "en cours de validation")
                            <p class="text-center"><span class="badge bg-primary">Livraison en cours de validation...</span></p>
                            @if (isset($livraison->commande_id))
                              <div class="row">
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm rounded" href="{{ route('livraison.gestionnaire.index_confirme_livraison', $livraison->id) }}">Confirmer</a>
                                    {{-- <a class=" btn-sm rounded" href="{{ route('livraison.gestionnaire.index_modifier_livraison', $livraison->id) }}"></a> --}}
                                </div>
                                <div class="btn-group mt-2">
                                    <a href="{{ route('livraison.gestionnaire.rejeter_livraison', $livraison->id) }}" class="btn btn-info btn-sm  rounded">Rejeter</a>
                                    <a href="{{ route('livraison.gestionnaire.destroy', $livraison->id) }}" class="btn btn-danger btn-sm ms-2  rounded">Supprimer</a>
                                </div>
                              </div>
                            @else
                              <div class="row">
                                  <div class="btn-group">
                                      <a class="btn btn-success btn-sm rounded" href="{{ route('livraison.gestionnaire.index_modifier_livraison', $livraison->id) }}">Modifier</a>
                                      <a class="btn btn-primary btn-sm rounded ms-2" href="{{ route('livraison.gestionnaire.index_confirme_livraison', $livraison->id) }}">Confirmer</a>
                                  </div>
                                  <div class="btn-group mt-2">
                                      <a href="{{ route('livraison.gestionnaire.rejeter_livraison', $livraison->id) }}" class="btn btn-info btn-sm  rounded">Rejeter</a>
                                      <a href="{{ route('livraison.gestionnaire.destroy', $livraison->id) }}" class="btn btn-danger btn-sm ms-2  rounded">Supprimer</a>
                                  </div>
                              </div>
                            @endif
                            
                          @elseif ($livraison->status_livraison == "Confirmer")
                            <div class="text-center"><span class="badge bg-primary text-center" style="margin-left: 60px">livraison confirmée...</span></div>
                          @elseif ($livraison->status_livraison == "Valider")
                            <div class="text-center"><span class="badge bg-primary text-center" style="margin-left: 60px">livraison validée...</span></div>
                          @elseif ($livraison->status_livraison == "en cours de livraison")
                            <div class="text-center"><u><b>{{-- Status : --}}</b></u><span class="badge bg-primary" style="margin-left: 60px">livraison en cours de livraison...</span></div>
                          @elseif ($livraison->status_livraison == "Démarrer")
                            <div class="text-center"><p><u><b>{{-- Status : --}}</b></u><span class="badge bg-primary" style="margin-left: 70px;">livraison démarrée</span></p></div>
                          @elseif ($livraison->status_livraison == "Terminer")
                            <div class="btn-group">
                              <div class="badge bg-primary" style="margin-left: 40px;">Livraison en cours de payement</div>
                            </div>
                          @elseif ($livraison->status_livraison == "Non payée")
                            <div class="btn-group">
                              <div class="badge bg-primary" style="margin-left: 50px;">Payement en cours de confirmation</div>
                            </div>
                          @elseif ($livraison->status_livraison == "Payée")
                            <div class="btn-group">
                              <div class="badge bg-primary" style="margin-left: 60px;">Fin de la Livraison</div>
                            </div>
                          @endif
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
          </div> 
        @endif
      @endforeach
    </div>
</div>
