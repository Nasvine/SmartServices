@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Roles</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('role.admin.index') }}">Role</a></li>
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
                    <div class="col-md-10">
                      <h5>Formulaire pour modifier un role</h5>
                    </div>
                    <div class="col-md-2">
                      <a href="{{ route('role.admin.index') }}" class="btn btn" style="background-color: #fe9003;">
                        <span class="" style='color:#ffffff'><b>Retour</b></span>
                      </a>
                    </div>
                  </div>
              </div>
                <div class="card-body">
                  <form class="needs-validation" action="{{ route('role.admin.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        
                    @method('PUT')
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="validationCustom01">Nom du role</label>
                        <input class="form-control" id="validationCustom01" type="text" name="name" value="{{ $role->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Selectionner le(s) permissions</label>
                            <select class="form-select js-example-placeholder-multiple col-sm-6" name="permissions[]" id="validationCustom01" data-placeholder="Selectionner le(s) permissions" multiple="multiple">
                                @foreach ($permissions as $k => $permission)
                                    <option value="{{ $permission->id }}" {{ $role->permissions->contains($permission) ? 'selected' : '' }}>{{ $k + 1 }} - {{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permissions')
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