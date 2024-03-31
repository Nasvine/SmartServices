@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Utilisateurs</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('user.admin.index') }}">Utilisateur</a></li>
              <li class="breadcrumb-item active">Formulaire</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row select2-drpdwn">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-lg-6 col-md-6">
                      <h5>Formulaire pour ajouter un utilisateur</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 text-end">
                        <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('user.admin.index') }}">Retour</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                  <form class="needs-validation" action="{{ route('user.admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Nom</label>
                        <input class="form-control" id="validationCustom01" type="text" name="first_name" placeholder="Entrer le nom de l'utilisateur">
                        @error('first_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Prénom</label>
                        <input class="form-control" id="validationCustom01" type="text" name="last_name" placeholder="Entrer le prénom de l'utilisateur">
                        @error('last_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Email</label>
                        <input class="form-control" id="validationCustom01" type="email" name="email" placeholder="Entrer l'email">
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Adresse</label>
                        <input class="form-control" id="validationCustom01" type="text" name="adress" placeholder="Entrer l'adresse">
                        @error('adress')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Numéro de Téléphone</label>
                        <input class="form-control" id="validationCustom01" type="number" name="phone" placeholder="Entrer le numéro de Téléphone">
                        @error('phone')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Sexe</label>
                        <select class="form-select col-sm-6" name="sexe" id="validationCustom01" data-placeholder="Selectionner le sexe">
                          <option value="Masculin">Masculin</option>
                          <option value="Féminin">Féminin</option>
                        </select>
                        @error('sexe')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label" for="exampleFormControlSelect9">Role</label>
                            <select class="form-select digits" id="exampleFormControlSelect9" name="role_id" data-placeholder="Selectionner le role">
                                @foreach ($roles as $k => $role)
                                   <option value="{{ $role->id }}">{{ $k + 1 }} - {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Photo</label>
                          <input class="form-control" type="file" name="photo" aria-label="file example">   
                          {{-- @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror  --}}                    
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationCustom01">Mot de Passe</label>
                            <input class="form-control" id="validationCustom01" type="text" name="password" placeholder="Entrer votre mot de Passe">
                            @error('password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                    {{-- <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Selectionner le(s) permissions</label>
                            <select class="form-select js-example-placeholder-multiple col-sm-6" name="permissions[]" id="validationCustom01" data-placeholder="Selectionner le(s) permissions" multiple="multiple">
                                @foreach ($permissions as $k => $permission)
                                    <option value="{{ $permission->id }}">{{ $k + 1 }} - {{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="row mt-5">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-4 text-end">
                            <button class="btn" style="background-color: #fe9003; color: #ffffff" type="submit">Valider</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection