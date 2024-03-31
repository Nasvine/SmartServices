<div class="col-sm-12 col-md-12  col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Statistique du Livreur</h5>
        </div>
        <div class="card-body">
            <div class="row">
              <h4>Historiques des courses</h4> 
              <div class="table-responsive product-table">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th class="text-center">Titre</th>
                      <th class="text-center">Description</th>
                      <th class="text-center">Adresse de départ</th>
                      <th class="text-center">Adresse de livraison</th>
                      <th class="text-center">Prix</th>
                      <th class="text-center">Status de Livraison</th>
                    </tr>
                  </thead>
                  @if ($course_livreurs)
                    <tbody>
                      @foreach ($course_livreurs as $course_livreur)
                          <tr>
                              <td class="text-center">{{ $course_livreur->titre }}</td>
                              <td class="text-center">{{ $course_livreur->description }}</td>
                              <td class="text-center">{{ $course_livreur->adresse_depart }}</td>
                              <td class="text-center">{{ $course_livreur->adresse_livraison }}</td>
                              <td class="text-center">{{ $course_livreur->prix }}</td>
                              <td class="text-center">{{ $course_livreur->status_livraison }}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  @else
                    <p>Aucune course Livrée.</p>
                  @endif
                </table>
              </div>
            </div>
            <div class="row mt-5">
              <h4>Historiques des Livraisons</h4> 
              <div class="table-responsive product-table">
                <table class="table" id="basic-1">
                  <thead>
                    <tr>
                      <th class="text-center">Adresse de départ</th>
                      <th class="text-center">Adresse de livraison</th>
                      <th class="text-center">Prix</th>
                      <th class="text-center">Heure de confirmation</th>
                      <th class="text-center">Heure de démarrage</th>
                      <th class="text-center">Heure de fin</th>
                      <th class="text-center">Status de Livraison</th>
                    </tr>
                  </thead>
                  @if ($livraison_livreurs)
                    <tbody>
                      @foreach ($livraison_livreurs as $livraison_livreur)
                          <tr>
                              <td class="text-center">{{ $livraison_livreur->adresse_depart }}</td>
                              <td class="text-center">{{ $livraison_livreur->adresse_arrivee }}</td>
                              <td class="text-center">{{ $livraison_livreur->prix}}</td>
                              <td class="text-center">{{ $livraison_livreur->heure_de_confirmation }}</td>
                              <td class="text-center">{{ $livraison_livreur->heure_de_demarrage}}</td>
                              <td class="text-center">{{ $livraison_livreur->updated_at->format('H:m')}}</td>
                              <td class="text-center">{{ $livraison_livreur->status_livraison }}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  @else
                    <p>Aucune Livraison Livrée.</p>
                  @endif
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>