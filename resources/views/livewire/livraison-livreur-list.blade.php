<div>
    <div wire:poll class="row mt-5">
      @foreach ($livraisons as $k => $livraison)
        @if ($livraison->status_livraison == "Rejeter" || $livraison->status_livraison == "en cours de validation" || $livraison->status_livraison == "Payée" || $livraison->status_livraison == "Confirmer")

          
        @else
          <div class="col-xl-4 col-sm-6">
                <div class="card mb-4">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center" style="background-color: #fdf0d2;">
                      <div class="badge bg" style="background-color: #fe9003;;">Livraison {{ $k + 1 }}</div>
                    </li>
                    <li class="list-group-item">
                      @if ($livraison->status_livraison == "Valider")
                        <span class="badge bg-success text-center" style="margin-left: 120px">Nouveau</span>
                      @elseif ($livraison->status_livraison == "en cours de livraison" || $livraison->status_livraison == "Démarrer")
                        <div class="badge bg-success text-center" style="margin-left: 100px">En cours</div>
                      @elseif ($livraison->status_livraison == "Terminer")
                        <div class="badge bg-success text-center" style="margin-left: 50px">En attente de Payement</div>
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
                              {{-- <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Prix de la livraison:</u></li>
                              <li class="list-group-item">{{ $livraison->prix }}</li> --}}
                              
                            @if (isset($livraison->type_de_colis) && isset($livraison->messageLivreur))
                              <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Type de colis:</u></li>
                              <li class="list-group-item">{{ $livraison->type_de_colis }}</li>
                              <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Message au Livreur:</u></li>
                              <li class="list-group-item">{{ $livraison->messageLivreur}}</li>
                              <li class="list-group-item" style="color: #04365b; background-color: #f1e9df;"><u>Prix de la livraison:</u></li>
                              <li class="list-group-item">{{ $livraison->prix }}</li>
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
                          @if ($livraison->status_livraison == "Valider")
                            <a class="btn btn-primary" style="margin-left: 90px;" href="{{ route('livraison.livreur.accept_livraison', $livraison->id) }}" type="button">Accepter</a>
                          @elseif ($livraison->status_livraison == "en cours de livraison")
                            <a class="btn btn-primary" style="margin-left: 70px;" href="{{ route('livraison.livreur.start_livraison', $livraison->id) }}" type="button">Démarrer</a>
                          @elseif ($livraison->status_livraison == "Démarrer")
                            <a class="btn btn-primary" style="margin-left: 70px;" href="{{ route('livraison.livreur.end_livraison', $livraison->id) }}" type="button">Terminer</a>
                          @elseif ($livraison->status_livraison == "Terminer")
                            <div class="badge bg-warning text-center" style="margin-left: 50px">En attente de Payement</div>

                          @elseif ($livraison->status_livraison == "Non payée")
                            <div class="btn-group">
                              <div class="badge bg-primary" style="margin-left: 25px;">
                                <a href="{{ route('livraison.livreur.payement_confirme',  $livraison->id) }}" class="btn btn-primary">Confirmer payement</a>
                              </div>
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
