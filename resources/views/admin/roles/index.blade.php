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
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Liste des roles</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('role.admin.create') }}">Créer une role</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Permissions</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $k => $role )
                        <tr>
                            <th class="text-center" scope="row">{{ $k + 1 }}</th>
                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center">
                              <ul>
                                @foreach ($role->permissions as $permission)
                                    <li>
                                        {{ $permission->name  }}
                                    </li> 
                                @endforeach
                              </ul>
                            </td>
                            <td class="text-center">
                              <div class="btn-group">
                                <a href="{{ route('role.admin.edit', $role->id ) }}" class="m-2"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                {{-- <a href="http://" class="text-dark"><i class="icon-eye" style="font-size: 20px;"></i></a> --}}
                                <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('role.admin.destroy', $role->id) }}">
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
            </div>
          </div>
          {{-- <div class="card">
            <div class="card-header">
              <h5>Color Accordion</h5><span>Add <code>.bg-*</code> class to add background color with card-header.</span>
            </div>
            <div class="card-body">
              <div class="default-according" id="accordion1">
                <div class="card">
                  <div class="card-header bg-primary" id="headingFour">
                    <h5 class="mb-0">
                      <button class="btn btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Collapsible Group Item #<span>1</span></button>
                    </h5>
                  </div>
                  <div class="collapse show" id="collapseFour" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-primary" id="headingFive">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Collapsible Group Item #<span>2</span></button>
                    </h5>
                  </div>
                  <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-bs-parent="#accordion1">
                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-primary" id="headingSix">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Collapsible Group Item #<span>3</span></button>
                    </h5>
                  </div>
                  <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#accordion1">
                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection