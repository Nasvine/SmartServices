@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Permissions</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">Permission</li>
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
                            <h5>Liste des permissions</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalmdo" data-whatever="@fat">Créer une permission</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $k => $permission )
                            <tr>
                                <th class="text-center" scope="row">{{ $k + 1 }}</th>
                                <td class="text-center">{{ $permission->name }}</td>
                                <td class="text-center">
                                  <div class="btn-group">
                                    <a class="m-2" data-bs-toggle="modal" data-bs-target="#editpermission_{{ $permission->id }}"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                    {{-- <a href="http://" class="text-dark"><i class="icon-eye" style="font-size: 20px;"></i></a> --}}
                                    <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('permission.admin.destroy', $permission->id) }}">
                                          @csrf
                                          @method('DELETE')
                                            <button class="btn text-danger" style="font-size: 20px;"><i class="icon-trash"></i></button>
                                    </form>
                                  </div>
                                </td>

                                <div class="modal fade" id="editpermission_{{ $permission->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Formulaire pour modifier une permission</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="{{ route('permission.admin.update', $permission->id) }}" method="POST" enctype="multipart/form-data">
                                          @csrf

                                          @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="recipient-name">Name</label>
                                                    <input class="form-control" id="recipient-name" type="text" name="name" value="{{ $permission->name }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
            <div class="modal fade" id="exampleModalmdo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Formulaire</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('permission.admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">Name</label>
                                <input class="form-control" id="recipient-name" type="text" name="name" placeholder="Entrer le nom de la permission">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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