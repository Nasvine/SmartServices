@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Categories de plats</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active">Categories de plat</li>
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
                            <h5>Liste des catégories de plats</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-whatever="@fat">Créer une catégorie de plat</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Nom de la categorie de plat</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($category_plats as $k => $category_plat )
                            <tr>
                                <th class="text-center" scope="row">{{ $k + 1 }}</th>
                                <td class="text-center">{{ $category_plat->name }}</td>
                                <td class="text-center">
                                  <div class="btn-group">
                                    <a class="m-2" data-bs-toggle="modal" data-bs-target=".editcategory_plat_{{ $category_plat->id }}"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                    {{-- <a href="http://" class="text-dark"><i class="icon-eye" style="font-size: 20px;"></i></a> --}}
                                    <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('category_plat.admin.destroy', $category_plat->id) }}">
                                          @csrf
                                          @method('DELETE')
                                            <button class="btn text-danger" style="font-size: 20px;"><i class="icon-trash"></i></button>
                                    </form>
                                  </div>
                                </td>

                                <div class="modal fade editcategory_plat_{{ $category_plat->id }}" tabindex="-1" restaurant="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Formulaire pour modifier une catégorie de plat</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>      
                                        <form action="{{ route('category_plat.admin.update', $category_plat->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Nom de la catégorie de plat</label>
                                                            <input class="form-control" id="recipient-name" type="text" name="name" value="{{ $category_plat->name }}">
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- <div class="mb-3">
                                                            <label class="col-form-label" for="recipient-name">Nom du restaurant</label>
                                                            <select class="form-select digits" id="exampleFormControlSelect9" name="restaurant_id" data-placeholder="Selectionner la restaurant">
                                                                @foreach ($restaurants as $k => $restaurant)
                                                                   <option value="{{ $restaurant->id }}">{{ $k + 1 }} - {{ $restaurant->nom_restaurant }}</option>
                                                                @endforeach
                                                            </select>   
                                                            @error('restaurant_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fermer</button>
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
            <div class="modal fade bd-example-modal-lg" tabindex="-1" restaurant="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Formulaire d'ajout d'une categorie de plat</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('category_plat.admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Nom de la categorie de plat</label>
                                            <input class="form-control" id="recipient-name" type="text" name="name" placeholder="Entrer le nom de la categorie de plat">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                       {{--  <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Nom de la restaurant</label>
                                            <select class="form-select digits" id="exampleFormControlSelect9" name="restaurant_id" data-placeholder="Selectionner la restaurant">
                                                @foreach ($restaurants as $k => $restaurant)
                                                   <option value="{{ $restaurant->id }}">{{ $k + 1 }} - {{ $restaurant->nom_restaurant }}</option>
                                                @endforeach
                                            </select>   
                                            @error('restaurant_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fermer</button>
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