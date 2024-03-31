@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Boutiques</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active">Boutique</li>
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
                        <div class="col-lg-6">
                            <h5>Modification des Infos d'une boutique</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <a href="{{ route('boutique.admin.index') }}" class="btn " type="button" style="background-color: #fe9003; color: #ffffff"><i class="icofont icofont-arrow-left"></i> <span class="ms-2">Retour</span></a >
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="myLargeModalLabel">Formulaire pour modifier une boutique</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('boutique.admin.update', $boutique->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Name</label>
                                                <input class="form-control" id="recipient-name" type="text" name="nom_boutique" value="{{ $boutique->nom_boutique }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Adresse</label>
                                                <input class="form-control" id="recipient-name" type="text" name="adresse_boutique" value="{{ $boutique->adresse_boutique }}">
                                                @error('adresse_boutique')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Ville</label>
                                                <input class="form-control" id="recipient-name" type="text" name="ville" value="{{ $boutique->ville }}">
                                                @error('ville')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Téléphone</label>
                                                <input class="form-control" id="recipient-name" type="text" name="telephone" value="{{ $boutique->telephone }}">
                                                @error('telephone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">email</label>
                                                <input class="form-control" id="recipient-name" type="text" name="email" value="{{ $boutique->email }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Photo</label>
                                                <input class="form-control" type="file" name="photo" aria-label="file example">   
                                                @error('photo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Selectionner le(s) catégories de produits</label>
                                                <select class="form-select js-example-placeholder-multiple col-sm-6" name="category_produits[]" id="validationCustom01" data-placeholder="Selectionner le(s) catégories de produits" multiple="multiple">
                                                    @foreach ($category_produits as $k => $category_produit)
                                                        <option value="{{ $category_produit->id }}" {{ $boutique->category_produits->contains($category_produit) ? 'selected' : '' }}>{{ $k + 1 }} - {{ $category_produit->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_produits')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Description</label>
                                                <textarea class="form-control" type="text" name="description" cols="3" rows="5">{{ $boutique->description }}</textarea> 
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
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

                {{-- <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Nom de la boutique</th>
                        <th scope="col" class="text-center">Description</th>
                        <th scope="col" class="text-center">Adresse</th>
                        <th scope="col" class="text-center">Téléphone</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Ville</th>
                        <th scope="col" class="text-center">Photo</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($boutiques as $k => $boutique )
                            <tr>
                                <th class="text-center" scope="row">{{ $k + 1 }}</th>
                                <td class="text-center">{{ $boutique->nom_boutique }}</td>
                                <td class="text-center">{{ $boutique->description }}</td>
                                <td class="text-center">{{ $boutique->adresse_boutique }}</td>
                                <td class="text-center">{{ $boutique->telephone }}</td>
                                <td class="text-center">{{ $boutique->email }}</td>
                                <td class="text-center">{{ $boutique->ville }}</td>
                                <td class="text-center">{{ $boutique->photo }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a class="btn text-primary" data-bs-toggle="modal" data-bs-target=".editboutique_{{ $boutique->id }}"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                        <a href="{{ route('boutique.admin.show', $boutique->id) }}" class="btn text-dark"><i class="icon-eye" style="font-size: 20px;"></i></a>
                                        
                                        <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('boutique.admin.destroy', $boutique->id) }}">
                                            @csrf
                                            @method('DELETE')
                                                <button class="btn text-danger" style="font-size: 20px;"><i class="icon-trash"></i></button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade editboutique_{{ $boutique->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Formulaire pour modifier une boutique</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>      
                                        <form action="{{ route('boutique.admin.update', $boutique->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Name</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="nom_boutique" value="{{ $boutique->nom_boutique }}">
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Adresse</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="adresse_boutique" value="{{ $boutique->adresse_boutique }}">
                                                            @error('adresse_boutique')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Ville</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="ville" value="{{ $boutique->ville }}">
                                                            @error('ville')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Téléphone</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="telephone" value="{{ $boutique->telephone }}">
                                                            @error('telephone')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">email</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="email" value="{{ $boutique->email }}">
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Photo</label>
                                                            <input class="form-control" type="file" name="photo" aria-label="file example">   
                                                            @error('photo')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Description</label>
                                                            <textarea class="form-control" type="text" name="description" cols="3" rows="5" value="{{ $boutique->description }}"></textarea> 
                                                            @error('description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
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
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div> --}}
            </div>
        </div>
    </div>
    </div>

    



    {{-- <div class="col-sm-12">
        <div class="">
          <div class="">
          </div>
          <div class="card-body btn-showcase">
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Formulaire d'ajout d'une boutique</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('boutique.admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Name</label>
                                            <input class="form-control" id="recipient-name" type="text" name="nom_boutique" placeholder="Entrer le nom de la boutique">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Adresse</label>
                                            <input class="form-control" id="recipient-name" type="text" name="adresse_boutique" placeholder="Entrer l'adresse de la boutique">
                                            @error('adresse_boutique')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Ville</label>
                                            <input class="form-control" id="recipient-name" type="text" name="ville" placeholder="Entrer la ville de la boutique">
                                            @error('ville')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Téléphone</label>
                                            <input class="form-control" id="recipient-name" type="text" name="telephone" placeholder="Entrer le numéro de la boutique">
                                            @error('telephone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">email</label>
                                            <input class="form-control" id="recipient-name" type="email" name="email" placeholder="Entrer l'email de la boutique">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Photo</label>
                                            <input class="form-control" type="file" name="photo" aria-label="file example">   
                                            @error('photo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Description</label>
                                            <textarea class="form-control" type="text" name="description" id="" cols="5" rows="3"></textarea>  
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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

    </div> --}}
@endsection