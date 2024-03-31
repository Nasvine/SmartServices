@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
              Boutique</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('boutique.admin.index') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active"><a href="">Boutique</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-6 col-xl-4 box-col-6">
          <div class="card">
            <div class="product-box">
              <div class="product-img">
                <img class="img-fluid" src="{{ asset('boutiques/images/'.$boutique->photo) }}" alt="">
                {{-- <div class="product-hover">
                  <ul>
                    <li>
                      <button class="btn" type="button"><i class="icon-shopping-cart"></i></button>
                    </li>
                    <li>
                      <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"><i class="icon-eye"></i></button>
                    </li>
                    <li>
                      <button class="btn" type="button"><i class="icofont icofont-law-alt-2"></i></button>
                    </li>
                  </ul>
                </div> --}}
              </div>
              <div class="product-details">
                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                <h4>{{ $boutique->nom_boutique }}</h4>
                {{-- <p>Simply dummy text of the printing.</p>
                <div class="product-price">$26.00 
                  <del>$350.00    </del>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-md-8">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <h6><u>Description de la boutique :</u> </h6>
                <p>{{ $boutique->description }}</p>
                {{-- <div class="col-md-6">
                </div>
                <div class="col-md-6 text-end">
                  <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Modifier Profile</button>
                </div> --}}
              </div>
            </div>
            <div class="card-body btn-showcase">
              <div class="row">
                <div class="col-md-6">
                  <div class="ttl-info text-start">
                    <h6><i class="fa fa-envelope"></i>Email</h6><span>{{ $boutique->email }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="ttl-info text-start">
                    <h6><i class="icofont icofont-social-google-map"></i>Adresse</h6>
                      <span>
                        {{ $boutique->ville }}
                      </span>
                  </div>
                </div>
                
              </div>
              <div class="row mt-5">
                <div class="col-md-6">
                  <div class="ttl-info text-start">
                    <h6><i class="fa fa-phone"></i>Téléphone</h6>
                      <span>
                        {{ $boutique->telephone }}
                      </span>
                  </div>
                </div>
                <div class="col-md-6">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-lg-6">
                              <h5>Liste des catégories de produit</h5>
                          </div>
                          <div class="col-lg-6 text-end">
{{--                               <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-whatever="@fat">Créer une catégorie de produit</button>
 --}}                          </div>
                      </div>
                  </div>
                  <div class="table-responsive">
                  <table class="table">
                      <thead>
                      <tr>
                          <th scope="col" class="text-center">#</th>
                          <th scope="col" class="text-center">Nom de la categorie de produit</th>
                          <th scope="col" class="text-center">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($category_produits as $k => $category_produit )
                              <tr>
                                  <th class="text-center" scope="row">{{ $k + 1 }}</th>
                                  <td class="text-center">{{ $category_produit->name }}</td>
                                  <td class="text-center">
                                    <div class="btn-group" role="group">
                                      <a href="{{ route('produit.category.admin.index',[ $category_produit->id, $boutique->id] ) }}" class="btn text-dark"><i class="icon-eye" style="font-size: 20px;"></i></a>
                                      {{-- <a class="btn text-primary" data-bs-toggle="modal" data-bs-target=".editcategory_produit_{{ $category_produit->id }}"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                      
                                      <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('category_produit.admin.destroy', $category_produit->id) }}">
                                          @csrf
                                          @method('DELETE')
                                              <button class="btn text-danger" style="font-size: 20px;"><i class="icon-trash"></i></button>
                                      </form> --}}
                                    </div>
                                  </td>

                                  <div class="modal fade editcategory_produit_{{ $category_produit->id }}" tabindex="-1" boutique="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Formulaire pour modifier une catégorie de produit</h5>
                                                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>      
                                          <form action="{{ route('category_produit.admin.update', $category_produit->id) }}" method="POST" enctype="multipart/form-data">
                                              @csrf

                                              @method('PUT')
                                              <div class="modal-body">
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <div class="mb-3">
                                                              <label class="col-form-label" for="recipient-name">Nom de la catégorie de produit</label>
                                                              <input class="form-control" id="recipient-name" type="text" name="name" value="{{ $category_produit->name }}">
                                                              @error('name')
                                                                  <span class="text-danger">{{ $message }}</span>
                                                              @enderror
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <input type="hidden" name="id_boutique" value="{{ $boutique->id }}">
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
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-12">
              <div class="">
              <div class="">
              </div>
              <div class="card-body btn-showcase">
                  <div class="modal fade bd-example-modal-lg" tabindex="-1" boutique="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h4 class="modal-title" id="myLargeModalLabel">Formulaire d'ajout d'une categorie de produit</h4>
                          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{ route('category_produit.admin.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                                  <div class="modal-body">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label class="col-form-label" for="recipient-name">Nom de la categorie de produit</label>
                                                  <input class="form-control" id="recipient-name" type="text" name="name" placeholder="Entrer le nom de la categorie de produit">
                                                  @error('name')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                            <input type="hidden" name="id_boutique" value="{{ $boutique->id }}">
                                              {{--<div class="mb-3">
                                                  <label class="col-form-label" for="recipient-name">Nom de la boutique</label>
                                                  <select class="form-select digits" id="exampleFormControlSelect9" name="boutique_id" data-placeholder="Selectionner la boutique">
                                                       @foreach ($boutiques as $k => $boutique)
                                                      <option value="{{ $boutique->id }}">{{ $k + 1 }} - {{ $boutique->nom_boutique }}</option>
                                                      @endforeach 
                                                  </select>   
                                                  @error('boutique_id')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                              </div>--}}
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