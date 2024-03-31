@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
              Profile</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('livreur') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active"><a href="#">Profile</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
          <div class="card custom-card p-0">
            <div class="card-header"><img class="img-fluid" src="{{ asset('simpe_image.jpg') }}" alt=""></div>
                @if (isset($user->livreur))
                    <div class="card-profile"><img class="rounded-circle" width="150px" height="200px" src=" {{ asset('utilisateurs/images/image_profile/'.$user->livreur->photo) }}" alt=""></div>
                @else
                    <div class="card-profile"><img class="rounded-circle" src="../assets/images/avtar/16.jpg" alt=""></div>
                @endif 
                    {{-- <ul class="card-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul> --}}
            <div class="text-center profile-details">
              <h5>
                @if (isset($user->livreur))
                    <span class="first_name_0">
                      {{ $user->livreur->first_name }} 
                    </span>
                    <span class="last_name_0">
                      {{ $user->livreur->last_name }}
                    </span>
                @else
                    <span class="first_name_0">
                          Bucky 
                    </span>
                    <span class="last_name_0">
                          Barnes
                    </span>
                @endif 
              </h5>
              
            </div>
            {{-- <div class="card-footer row">
              <div class="col-4 col-sm-4">
                <h6>Follower</h6>
                <h5 class="counter">2578</h5>
              </div>
              <div class="col-4 col-sm-4">
                <h6>Following</h6>
                <h5><span class="counter">26</span>K</h5>
              </div>
              <div class="col-4 col-sm-4">
                <h6>Total Post</h6>
                <h5><span class="counter">96</span>M</h5>
              </div>
            </div> --}}
          </div>
        </div>
        <div class="col-sm-8 col-md-8">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  <h5>Information personnelle</h5>
                </div>
                <div class="col-md-6 text-end">
                  <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Modifier Profile</button>
                </div>
              </div>
            </div>
            <div class="card-body btn-showcase">
              <div class="row">
                <div class="col-md-6">
                  <div class="ttl-info text-start">
                    <h6><i class="fa fa-envelope"></i>Email</h6><span>{{ $user->email }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="ttl-info text-start">
                    <h6><i class="icon-wheelchair"></i> Genre</h6><span>
                      @if (isset($user->livreur))
                        <span >
                          {{ $user->livreur->sexe }}
                        </span>
                        @else
                          <span>Masculin / Féminin</span>
                        @endif
                    </span>
                  </div>
                </div>
                
              </div>
              <div class="row mt-5">
                <div class="col-md-6">
                  <div class="ttl-info text-start">
                    <h6><i class="fa fa-phone"></i>Téléphone</h6>
                        @if (isset($user->livreur))
                          <span>
                            {{ $user->livreur->phone }}
                          </span>
                        @else
                          <span>India +91 123-456-7890</span>
                        @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="ttl-info text-start">
                    <h6><i class="icofont icofont-social-google-map"></i>Adresse</h6>
                    @if (isset($user->livreur))
                      <span>
                        {{ $user->livreur->adress }}
                      </span>
                    @else
                      <span>
                        B69 Near Schoool Demo Home
                      </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-6  col-xl-6">
        <div class="card">
          <div class="card-header">
            <h5>Modifier Information de connexion</h5>
          </div>
          <div class="card-body">
            <div class="row">
                <form class="needs-validation" action="{{ route('profile.livreur.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @elseif (session('error'))
                      <div class="alert alert-danger" role="alert">
                          {{ session('error') }}
                      </div>
                  @endif

                  <div class="row g-3">
                    <div class="col-md-12">
                      <label class="form-label" for="validationCustom01">Ancien Password</label>
                        <input type="text" name="old_password" class="form-control" id="horizontal-firstname-input" placeholder="Entre votre ancien mot de passe">
                        @error('old_password')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <label class="form-label" for="validationCustom01">Nouveau Password</label>
                      <input type="text" name="new_password" class="form-control" id="horizontal-email-input" placeholder="Entrer votre nouveau mot de passe">
                      @error('new_password')
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

        {{-- <div class="card">
          <div class="card-body">
              <h4 class="card-title mb-4">Modifier vos infos de connexion</h4>
              <div id="revenue-chart" class="apex-charts" dir="ltr">
                  <form action="{{ route('profile.admin.store') }}" method="post">

                      @csrf

                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @elseif (session('error'))
                          <div class="alert alert-danger" role="alert">
                              {{ session('error') }}
                          </div>
                      @endif
                      <div class="row mb-4">
                          <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Old password</label>
                          <div class="col-sm-6">
                            <input type="text" name="old_password" class="form-control" id="horizontal-firstname-input" placeholder="Entre votre ancien mot de passe">
                            @error('old_password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                      </div>
                      <div class="row mb-4">
                          <label for="horizontal-email-input" class="col-sm-3 col-form-label">New password</label>
                          <div class="col-sm-6">
                              <input type="text" name="new_password" class="form-control" id="horizontal-email-input" placeholder="Entrer votre ancien mot de passe">
                              @error('new_password')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>

                      <div class="row justify-content-end">
                          <div class="col-sm-9">
                              <div>
                                  <button type="submit" class="btn btn-primary w-md text-end">Submit</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
        </div>
      </div> --}}
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Formulaire pour modifier mon profile</h4>
          </div>
          <div class="modal-body">
            <form class="needs-validation" action="{{ route('profile.livreur.update', $user->id) }}" method="POST" enctype="multipart/form-data">
              @csrf

              @method('PUT')
              <div class="row g-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Nom</label>
                  <input class="form-control" id="validationCustom01" type="text" name="first_name" value="{{ $user->livreur->first_name ?? "Nom" }}">
                  @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Prénom</label>
                  <input class="form-control" id="validationCustom01" type="text" name="last_name" value="{{ $user->livreur->last_name ?? "Prénom" }}">
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
                  <input class="form-control" id="validationCustom01" type="text" name="adress" value="{{ $user->livreur->adress ?? "Adresse" }}">
                  @error('adress')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Numéro de Téléphone</label>
                  <input class="form-control" id="validationCustom01" type="number" name="phone" value="{{ $user->livreur->phone ?? "525631852" }}">
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
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Photo</label>
                    <input class="form-control" type="file" name="photo" aria-label="file example">   
                    {{-- @error('photo')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror  --}}                    
                  </div>
                  <div class="col-md-6">
                      {{-- <label class="form-label" for="validationCustom01">Mot de Passe</label>
                      <input class="form-control" id="validationCustom01" type="text" name="password" placeholder="Entrer votre mot de Passe">
                      @error('password')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror --}}
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
     
@endsection