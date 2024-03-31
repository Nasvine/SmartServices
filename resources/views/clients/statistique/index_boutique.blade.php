@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Statistique</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('client') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('course.client.index') }}">Course</a></li>
              <li class="breadcrumb-item active">Acceuil</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                          <div class="col-md-10">
                            <h6>Liste des ventes dans la boutique <span class="text-success">{{ $boutique->nom_boutique }}</span></h6>
                          </div>
                          <div class="col-md-2">
                            {{-- <div class="btn-group">
                              <form action="">
                                @csrf
                                <input class="form-control" id="validationCustom01" type="date" name="date" placeholder="Entrer une date">
                                <button type="submit" class="btn btn-primary rounded-2">Search</button>
                              </form>

                            </div> --}}
                            <a href="{{ route('boutique_client.client.show', $boutique->id) }}" class="btn btn-primary ms-2 rounded-2">Retour</a>
                          </div>
                        </div>
                        
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                          <thead>
                            <th class="text-center" scope="col"><b>#</b></th>
                            <th class="text-center" scope="col"><b>Date</b></th>
                            <th class="text-center" scope="col"><b>Produits</b></th>
                            <th class="text-center" scope="col"><b>Prix</b></th>
                            <th class="text-center" scope="col"><b>Quantite</b></th>
                            <th class="text-center" scope="col"><b>Actions</b></th>
                          </thead>
                          @forelse ($statistiques as  $statistique)
                            <tbody>
                              @foreach ($statistique->commande->ligne_commandes as $k => $value)
                                <tr>
                                  <th class="text-center">{{ $k + 1 }}</th>
                                  <td class="text-center">{{ $statistique->created_at->format('d/m/Y')}}</td>
                                      
                                      <td class="text-center">
                                        {{ $value->nom_du_produit }}
                                      </td>
                                      <td class="text-center">
                                        {{ $value->prix }}
                                      </td>
                                      <td class="text-center">
                                        {{ $value->quantite }}
                                      </td>
                                    
                                    <td class="text-center"> 
                                      {{-- <form method="POST" action="{{ route('course.client.destroy', $course->id) }}">
                                        @csrf
                                        
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ms-3" data-original-title="btn btn-danger">Supprimer</button>
                                      </form> --}}
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          @empty
                            <tbody>
                               <tr>
                                <td colspan="6" class="text-center">Pas de données </td>
                               </tr>
                            </tbody>
                          @endforelse
                      </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection