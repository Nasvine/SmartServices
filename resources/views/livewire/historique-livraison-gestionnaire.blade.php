<div>
    <div wire:poll class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h6>Historiques des livraisons</h6>
                </div>
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
                          <th class="text-center" scope="col"><b>Tarif de la course</b></th>
                          <th class="text-center" scope="col"><b>Moyen de paiement</b></th>
                          <th class="text-center" scope="col"><b>Status</b></th>
                          <th class="text-center" scope="col"><b>Actions</b></th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($historiques as $k => $historique)
                              <tr>
                                <th scope="row">{{ $k + 1 }}</th>
                                <td class="text-center">{{ $historique->user->profile->first_name }} {{ $historique->user->profile->last_name }}</td>
                                <td class="text-center">{{ $historique->adresse_depart }}</td>
                                <td class="text-center">{{ $historique->adresse_arrivee }}</td>
                                <td class="text-center">{{ $historique->user->profile->phone }}</td>
                                <td class="text-center">{{ $historique->heure_de_confirmation }}</td>
                                <td class="text-center">{{ $historique->created_at->format('d/m/Y')}}</td>
                                <td class="text-center">{{ $historique->created_at->format('H:m') }}</td>
                                <td class="text-center">{{ $historique->updated_at->format('H:m') }}</td>
                                <td class="text-center">{{ $historique->mode_de_paiement }}</td>
                                <td class="text-center">{{ $historique->prix }}</td>
                                <td class="text-center"> 
                                  <span class="badge badge-warning">
                                    {{ $historique->status_livraison }}
                                  </span>
                                </td>
                                <td class="text-center"> 
                                  <form method="POST" action="{{ route('livraison.client.destroy', $historique->id) }}">
                                    @csrf
                                    
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-3" data-original-title="btn btn-danger">Supprimer</button>
                                  </form>
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
