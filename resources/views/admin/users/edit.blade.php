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
                      <h5>Formulaire pour modifier un utilisateur</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 text-end">
                        <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('user.admin.index') }}">Retour</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                  <form class="needs-validation" action="{{ route('user.admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Nom</label>
                        <input class="form-control" id="validationCustom01" type="text" name="first_name" value="{{ $user->profile->first_name ?? $user->livreur->first_name ?? "Fist Name"}}">
                        @error('first_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Prénom</label>
                        <input class="form-control" id="validationCustom01" type="text" name="last_name" value="{{ $user->profile->last_name ?? $user->livreur->last_name ?? "Last Name"}}">
                          {{-- @if (isset($user->profile))
                          @elseif (isset($user->livreur))
                              <input class="form-control" id="validationCustom01" type="text" name="last_name" value="{{ $user->livreur->last_name ?? "Last Name"}}">
                          @endif --}}
                        @error('last_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Email</label>
                        <input class="form-control" id="validationCustom01" type="email" name="email" value="{{ $user->email }}">
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Adresse</label>
                        <input class="form-control" id="validationCustom01" type="text" name="adress" value="{{ $user->profile->adress ?? $user->livreur->adress ?? "Adresse"}}">
                        @error('adress')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Numéro de Téléphone</label>
                        <input class="form-control" id="validationCustom01" type="number" name="phone" value="{{ $user->profile->phone ?? $user->livreur->phone ?? "+2290000000"}}" placeholder="+229XXXXXXXX">
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
                            <label class="form-label" for="role_id">Role</label>
                            <select class="form-select digits" id="role_id" name="role_id" data-placeholder="Selectionner le role">
                                @foreach ($roles as $k => $role)
                                   <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{ $k + 1 }} - {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Photo</label>
                          <input class="form-control" type="file" name="photo" aria-label="file example">                      
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationCustom01">Mot de Passe</label>
                            <input class="form-control" id="validationCustom01" type="text" name="password" placeholder="Entrer votre mot de Passe">
                            @error('password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
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