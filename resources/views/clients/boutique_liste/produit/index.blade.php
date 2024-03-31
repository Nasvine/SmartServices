@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
                Produits</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('boutique.admin.index') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{-- {{ route('boutique.admin.show', $boutique_id) }} --}}">Category</a></li>
              <li class="breadcrumb-item active"><a href="">Produit</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    @can('list-boutique')
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9">
                        <h5>Liste des produits de la catégorie <span class="text-success">{{ $category_produit_name }}</span> </h5>
                        </div>
                        <div class="col-lg-3 text-end">
                            <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-whatever="@fat">Créer un produit</button>
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
                            @foreach ($produits as $produit)
                                <tr>
                                    <td class="text-center"><img src="{{ asset('boutiques/produits/images/'.$produit->photo) }}" {{-- style="width: 20%; height:20%;" --}} width="90px" height="90px"  alt=""></td>
                                    <td class="text-center">
                                        <h6> {{ $produit->nom_produit }}</h6><span>{{ $produit->description }}</span>
                                    </td>
                                    <td class="text-center">{{ $produit->prix }}</td>
                                    <td class="font-success text-center">In Stock</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-success btn-sm rounded"  data-bs-toggle="modal" data-bs-target=".editproduit_{{ $produit->id }}">Modifier</button type="button">
                                            <form method="POST" action="{{ route('produit.admin.destroy', $produit->id) }}">
                                                @csrf
                                                
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm ms-2" data-original-title="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade editproduit_{{ $produit->id }}" tabindex="-1" restaurant="dialog" aria-labelledby="editproduit_{{ $produit->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Formulaire pour modifier un produit</h4>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('produit.admin.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
            
                                                @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="col-form-label" for="recipient-name">Nom du produit</label>
                                                                    <input class="form-control" id="recipient-name" type="text" name="nom_produit" value="{{ $produit->nom_produit }}">
                                                                    @error('nom')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="col-form-label" for="recipient-name">Prix</label>
                                                                    <input class="form-control"  type="number" name="prix" value="{{ $produit->prix }}">
                                                                    @error('prix')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="col-form-label" for="recipient-name">Photo du produit</label>
                                                                    <input class="form-control" type="file" name="photo" aria-label="file example">   
                                                                    @error('photo')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="col-form-label" for="recipient-name">Description</label>
                                                                    <textarea class="form-control" type="text" name="description" id="" cols="5" rows="3" value="{{ $produit->description }}"></textarea>  
                                                                    @error('description')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                
                                                                <input type="hidden" name="id_boutique" value="{{ $id_boutique }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                
                                                                <input type="hidden" name="category_produit_id" value="{{ $category_produit_id }}">
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

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" restaurant="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Formulaire d'ajout d'un produit</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('produit.admin.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="recipient-name">Nom du produit</label>
                                                    <input class="form-control" id="recipient-name" type="text" name="nom_produit" placeholder="Entrer le nom du produit">
                                                    @error('nom')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="recipient-name">Prix</label>
                                                    <input class="form-control"  type="number" name="prix" placeholder="Entrer le prix du produit">
                                                    @error('prix')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="recipient-name">Photo du produit</label>
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
                                            <div class="col-md-6">
                                                
                                                <input type="hidden" name="id_boutique" value="{{ $id_boutique }}">
                                            </div>
                                            <div class="col-md-6">
                                                
                                                <input type="hidden" name="category_produit_id" value="{{ $category_produit_id }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input type="hidden" name="category_produit_id" value="{{ $category_produit_id }}">
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
        </div>
    @endcan

    <!-- Container-fluid Ends-->
@endsection