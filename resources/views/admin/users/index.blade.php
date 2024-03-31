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
                    <div class="col-lg-6">
                        <h5>Liste des utilisateurs</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('user.admin.create') }}">Créer une utilisateur</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Photo</th>
                    <th scope="col" class="text-center">Nom & Prénoms</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Roles</th>
                    <th scope="col" class="text-center">Adresse</th>
                    <th scope="col" class="text-center">Sexe</th>
                    <th scope="col" class="text-center">Numéro de Téléphone</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $k => $user )
                        <tr>
                            <th class="text-center" scope="row">{{ $k + 1 }}</th>
                            <td class="text-center">
                              @if(isset($user->profile))
                                  <img src="{{ asset('utilisateurs/images/image_profile/'.$user->profile->photo) }}" height="50px" width="50px"  alt="">
                              @elseif (isset($user->livreur) )
                                  <img src="{{ asset('utilisateurs/images/image_profile/'.$user->livreur->photo) }}" height="50px" width="50px"  alt="">
                              @endif  
                            </td>
                            <td class="text-center">
                              @if(isset($user->profile))
                                {{ $user->profile->first_name }} {{ $user->profile->last_name }} 
                              @elseif (isset($user->livreur) )
                                {{ $user->livreur->first_name }} {{ $user->livreur->last_name }}
                              @endif  
                            </td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->role->name }}</td>
                            <td class="text-center">
                                @if(isset($user->profile) )
                                    {{ $user->profile->adress }}
                                @elseif ($user->livreur)
                                    {{ $user->livreur->adress }}
                                @endif
                                    
                            </td>
                            <td class="text-center">
                                @if(isset($user->profile) )
                                    {{ $user->profile->sexe }}
                                @elseif ($user->livreur)
                                    {{ $user->livreur->sexe }}
                                @endif
                                    
                            </td>
                            <td class="text-center">
                                @if(isset($user->profile) )
                                    {{ $user->profile->phone }}
                                @elseif ($user->livreur)
                                    {{ $user->livreur->phone }}
                                @endif
                                    
                            </td>
                            <td class="text-center">
                              <div class="btn-group">
                                <a href="{{ route('user.admin.edit', $user->id ) }}" class="m-2"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                <a href="{{ route('user.admin.show', $user->id ) }}" class="text-dark"><i class="icon-eye" style="font-size: 20px;"></i></a>
                                <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('user.admin.destroy', $user->id) }}">
                                      @csrf
                                      @method('DELETE')
                                        <button class="btn text-danger" style="font-size: 20px;"><i class="icon-trash"></i></button>
                                </form>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="row" style="float: right">
                {{ $users->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection