@extends('admin.layouts.admin')

@section('content')

  {{--   @php
    foreach($plats as $key => $value) {
        $restaurant_id = $value->restaurant_id;
    }
    #dd($produits, $boutique_id);
    @endphp --}}
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Plats</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('restaurant.admin.index') }}"><i data-feather="home"></i></a></li>
{{--                 <li class="breadcrumb-item"><a href="{{ route('restaurant.admin.show', $restaurant_id) }}">Category</a></li>
 --}}                <li class="breadcrumb-item active"><a href="">Plat</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                           <h5>Liste des plats disponibles </h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-whatever="@fat">Créer un plat</button>
                        </div>
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive product-table">
                    <table class="display" id="basic-1">
                      <thead>
                        <tr>
                          <th class="text-center">Image</th>
                          <th class="text-center">Details</th>
                          <th class="text-center">Prix</th>
                          <th class="text-center">Stock</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($plats as $plat)
                            <tr>
                                <td class="text-center"><img src="{{ asset('restaurants/plats/images/'.$plat->photo) }}" {{-- style="width: 20%; height:20%;" --}} width="90px" height="90px"  alt=""></td>
                                <td class="text-center">
                                    <h6> {{ $plat->nom }}</h6><span>{{ $plat->description }}</span>
                                </td>
                                <td class="text-center">{{ $plat->prix }}</td>
                                <td class="font-success text-center">In Stock</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-success btn-sm rounded"  data-bs-toggle="modal" data-bs-target=".editplat_{{ $plat->id }}">Modifier</button type="button">
                                          <form method="POST" action="{{ route('plat.admin.destroy', $plat->id) }}">
                                            @csrf
                                            
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ms-2" data-original-title="btn btn-danger">Supprimer</button>
                                          </form>
                                      </div>
                                
                                </td>
                            </tr>
                            <div class="modal fade editplat_{{ $plat->id }}" tabindex="-1" restaurant="dialog" aria-labelledby="editplat_{{ $plat->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Formulaire pour modifier un plat</h4>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('plat.admin.update', $plat->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
        
                                            @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="recipient-name">Nom du plat</label>
                                                                <input class="form-control" id="recipient-name" type="text" name="nom" value="{{ $plat->nom }}">
                                                                @error('nom')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="recipient-name">Prix</label>
                                                                <input class="form-control"  type="number" name="prix" value="{{ $plat->prix }}">
                                                                @error('prix')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="recipient-name">Photo du plat</label>
                                                                <input class="form-control" type="file" name="photo" aria-label="file example">   
                                                                @error('photo')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="recipient-name">Description</label>
                                                                <textarea class="form-control" type="text" name="description" id="" cols="5" rows="3" value="{{ $plat->description }}"></textarea>  
                                                                @error('description')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <input type="hidden" name="category_plat_id" value="{{ $category_plat_id }}">
                                                        <input type="hidden" name="restaurant_id" value="{{ $id_restaurant }}">
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" style="background-color: #fe9003; color: #ffffff" type="submit">Valider</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>

    
    <div class="col-sm-12">
        <div class="">
          <div class="">
          </div>
          <div class="card-body btn-showcase">
            <div class="modal fade bd-example-modal-lg" tabindex="-1" restaurant="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Formulaire d'ajout d'un plat</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('plat.admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Nom du plat</label>
                                            <input class="form-control" id="recipient-name" type="text" name="nom" placeholder="Entrer le nom du plat">
                                            @error('nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Prix</label>
                                            <input class="form-control"  type="number" name="prix" placeholder="Entrer le prix du plat">
                                            @error('prix')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Photo du plat</label>
                                            <input class="form-control" type="file" name="photo" aria-label="file example">   
                                            @error('photo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Description</label>
                                            <textarea class="form-control" type="text" name="description" id="" cols="5" rows="3" placeholder="Entrer une petite description"></textarea>  
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="category_plat_id" value="{{ $category_plat_id }}">
                                    <input type="hidden" name="restaurant_id" value="{{ $id_restaurant }}">
                                    <div class="col-md-6">
                                        
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" style="background-color: #fe9003; color: #ffffff" type="submit">Valider</button>
                            </div>
                    </form>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
@endsection