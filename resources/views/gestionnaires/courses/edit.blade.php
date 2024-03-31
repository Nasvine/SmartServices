@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Courses</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('course.client.index') }}">Course</a></li>
              <li class="breadcrumb-item active">Acceuil</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-xl-6 xl-100">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Formulaire pour modifier une course</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('course.gestionnaire.index') }}">Retour</a>
                    </div>
                </div>
              </div>
              <div class="card-body">
                <form class="needs-validation" action="{{ route('course.gestionnaire.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Titre</label>
                          <input class="form-control" id="validationCustom01" type="text" name="titre" value="{{ $course->titre }}">
                          @error('date_de_livraison')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Adresse de départ</label>
                          <input class="form-control" id="validationCustom01" type="text" name="adresse_depart" value="{{ $course->adresse_depart }}">
                          @error('adresse_depart')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Adresse de livraison</label>
                          <input class="form-control" id="validationCustom01" type="text" name="adresse_livraison" value="{{ $course->adresse_livraison }}">
                          @error('adresse_livraison')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                    </div>
                    {{-- <div class="row mt-3 g-3">
                      
                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Date de livraison</label>
                        <input class="form-control" id="validationCustom01" type="date" name="date_de_livraison" value="{{ $course->date_de_livraison }}">
                        @error('date_de_livraison')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-md-4">
                        <label class="form-label" for="validationCustom01">Votre Numéro à contacter</label>
                        <input class="form-control" id="validationCustom01" type="number" name="numero_client" value="{{ $course->numero_client }}">
                          @error('numero_client')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    </div> --}}
                    <div class="row mt-3">
                      <div class="col-md-8">
                        <label class="form-label" for="validationCustom01">Description</label>
                        <textarea class="form-control" id="validationCustom01" type="text" name="description" id="" cols="10" rows="5">{{ $course->description }}</textarea>
                        @error('description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-4">
                       {{--  <label class="form-label" for="validationCustom01">Description</label>
                        <textarea class="form-control" id="validationCustom01" type="text" name="description" id="" cols="10" rows="5" placeholder="Decrivez un peu la course"></textarea>
                        @error('description')
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
    </div>
    <!-- Container-fluid Ends-->
@endsection