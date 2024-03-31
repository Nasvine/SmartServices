<div class="col-sm-12 col-md-12  col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Statistique du gestionnaire</h5>
        </div>
        <div class="card-body">
            <div class="row">
              <h4>Historiques des courses validées</h4> 
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
                  @if ($course_gestionnaires)
                    <tbody>
                      @foreach ($course_gestionnaires as $course_gestionnaire)
                          <tr>
                              <td class="text-center">{{ $course_gestionnaire->titre }}</td>
                              <td class="text-center">{{ $course_gestionnaire->description }}</td>
                              <td class="text-center">{{ $course_gestionnaire->adresse_depart }}</td>
                              <td class="text-center">{{ $course_gestionnaire->adresse_livraison }}</td>
                              <td class="text-center">{{ $course_gestionnaire->prix }}</td>
                              <td class="text-center">{{ $course_gestionnaire->status_livraison }}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  @else
                    <p>Aucune course validée.</p>
                  @endif
                </table>
              </div>
            </div>
            <div class="row mt-5">
              <h4>Historique des Livraisons validées</h4> 
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">Adresse de départ</th>
                      <th class="text-center">Adresse de livraison</th>
                      <th class="text-center">Prix</th>
                      <th class="text-center">Status de Livraison</th>
                    </tr>
                  </thead>
                  @if ($livraison_gestionnaires)
                    <tbody>
                      @foreach ($livraison_gestionnaires as $livraison_gestionnaire)
                          <tr>
                              <td class="text-center">{{ $livraison_gestionnaire->adresse_depart }}</td>
                              <td class="text-center">{{ $livraison_gestionnaire->adresse_livraison }}</td>
                              <td class="text-center">{{ $livraison_gestionnaire->prix_livraison }}</td>
                              <td class="text-center">{{ $livraison_gestionnaire->status_livraison }}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  @else
                    <tbody>
                      <tr>
                          <td class="text-center" colspan="4">Aucune Livraison validée.</td>
                      </tr>
                    </tbody>
                  @endif
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>