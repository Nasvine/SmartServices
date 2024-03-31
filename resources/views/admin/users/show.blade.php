@extends('admin.layouts.admin')

@php
  use Carbon\Carbon;

@endphp

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
              <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active"><a href="{{ route('role.admin.index') }}">Profile</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
          <div class="card custom-card p-0">

            <div class="card-profile">
              @if (isset($user->livreur))
              <img class="rounded-circle" src=" {{ asset('utilisateurs/images/image_profile/'.$user->livreur->photo) ?? "../assets/images/avtar/16.jpg" }}" alt="">
              @else
                <img class="rounded-circle" src=" {{ asset('utilisateurs/images/image_profile/'.$user->profile->photo) ?? "../assets/images/avtar/16.jpg" }}" alt="">
              @endif
            </div>
            <div class="text-center profile-details">
              <h5>
                @if (isset($user->profile))
                    <span class="first_name_0">
                      {{ $user->profile->first_name }} 
                    </span>
                    <span class="last_name_0">
                      {{ $user->profile->last_name }}
                    </span>
                @elseif (isset($user->livreur))
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
                  {{-- <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Modifier Profile</button> --}}
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
                      @if (isset($user->profile))
                        <span >
                          {{ $user->profile->sexe }}
                        </span>
                      @elseif (isset($user->livreur))
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
                        @if (isset($user->profile))
                          <span>
                            {{ $user->profile->phone }}
                          </span>
                        @elseif (isset($user->livreur))
                          <span >
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
                    @if (isset($user->profile))
                      <span>
                        {{ $user->profile->adress }}
                      </span>
                    @elseif (isset($user->livreur))
                      <span >
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
              <div class="row mt-5">
                <div class="col-md-6">
                  <div class="ttl-info text-start">
                    <h6><i class="icofont icofont-ssl-security"></i>Rôle</h6>
                        @if ($user->role_id)
                          <span>
                            {{ $user->role->name }}
                          </span>
                        @else
                          <span>India +91 123-456-7890</span>
                        @endif
                  </div>
                </div>
                <div class="col-md-6">
                  {{-- <div class="ttl-info text-start">
                    <h6><i class="icofont icofont-social-google-map"></i>Adresse</h6>
                    @if (isset($user->profile))
                      <span>
                        {{ $user->profile->adress }}
                      </span>
                    @else
                      <span>
                        B69 Near Schoool Demo Home
                      </span>
                    @endif
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

     @if ($user->role_id == 3)
        @include('admin.users.statistiques.client')
     @elseif ($user->role_id == 4)
        @include('admin.users.statistiques.gestionnaire')
     @elseif ($user->role_id == 2)
        @include('admin.users.statistiques.livreur')
     @endif

    </div>
     
@endsection