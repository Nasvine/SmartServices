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
                        <h5>Formulaire pour confirmer un course</h5>
                    </div>
                    <div class="col-lg-6 text-end">

                    </div>
                </div>
              </div>
              <div class="card-body">
                <form class="needs-validation" action="{{ route('course.gestionnaire.confirm_course', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mt-3">
                        <div class="col-md-6">
                          <label class="form-label" for="validationCustom01">Modifier le prix de la course</label>
                          <input class="form-control" id="validationCustom01" type="number" name="prix" value="{{ $course->prix }}">
                          @error('prix')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          {{-- <label class="form-label" for="validationCustom01">Adresse de départ</label>
                          <input class="form-control" id="validationCustom01" type="text" name="adresse_depart" value="{{ $course->adresse_depart }}">
                          @error('adresse_depart')
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

      {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Formulaire pour ajouter une course</h4>
            </div>
            <div class="modal-body">
              <form class="needs-validation" action="{{ route('course.client.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                  
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom01">Titre</label>
                      <input class="form-control" id="validationCustom01" type="text" name="titre" placeholder="Entrer le titre de la course">
                      @error('titre')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom01">Adresse de départ</label>
                      <input class="form-control" id="validationCustom01" type="text" name="adresse_depart" placeholder="Entrer l'adresse de départ">
                      @error('adresse_depart')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom01">Adresse de livraison</label>
                      <input class="form-control" id="validationCustom01" type="text" name="adresse_livraison" placeholder="Entrer l'adresse de livraison">
                      @error('adresse_livraison')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                </div>
                <div class="row g-3">
                  
                  <div class="col-md-4">
                    <label class="form-label" for="validationCustom01">Date de livraison</label>
                    <input class="form-control" id="validationCustom01" type="date" name="date_de_livraison" placeholder="Entrer la date de livraison">
                    @error('date_de_livraison')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-8">
                    <label class="form-label" for="validationCustom01">Description</label>
                    <textarea class="form-control" id="validationCustom01" type="text" name="description" id="" cols="10" rows="5" placeholder="Decrivez un peu la course"></textarea>
                    @error('description')
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
      </div> --}}
    </div>
    <!-- Container-fluid Ends-->
@endsection