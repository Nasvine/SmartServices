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
              <li class="breadcrumb-item"><a href="{{ route('client') }}"><i data-feather="home"></i></a></li>
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
                        <h5>Listes des courses</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Ajouter une course</button>
                    </div>
                </div>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                  <li class="nav-item"><a class="nav-link active" id="pills-warningmescourses-tab" data-bs-toggle="pill" href="#pills-warningmescourses" role="tab" aria-controls="pills-warningmescourses" aria-selected="true">Mes courses</a></li>
                  <li class="nav-item"><a class="nav-link" id="pills-warningcontact-tab" data-bs-toggle="pill" href="#pills-warninghistorique" role="tab" aria-controls="pills-warninghistorique" aria-selected="false">Historique</a></li>
                </ul>
                <div class="tab-content" id="pills-warningtabContent">

                  <div class="tab-pane fade show active" id="pills-warningmescourses" role="tabpanel" aria-labelledby="pills-warningmescourses-tab">
                    <livewire:CourseClientList />
                  </div>
                  
                  <div class="tab-pane fade" id="pills-warninghistorique" role="tabpanel" aria-labelledby="pills-warninghistorique-tab">
                    
                    <livewire:HistoriqueCourseClient />
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Formulaire pour ajouter une course</h4>

              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" action="{{ route('course.client.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom01">Titre</label>
                      <input class="form-control" id="validationCustom01" type="text" name="titre" value="{{ old('titre') }}" placeholder="Entrer le titre de la course">
                      @error('titre')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom01">Adresse de départ</label>
                      <input class="form-control" id="validationCustom01" type="text" name="adresse_depart" value="{{ old('adresse_depart') }}"  placeholder="Entrer l'adresse de départ">
                      @error('adresse_depart')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom01">Adresse de livraison</label>
                      <input class="form-control" id="validationCustom01" type="text" name="adresse_livraison" value="{{ old('adresse_livraison') }}" placeholder="Entrer l'adresse de livraison">
                      @error('adresse_livraison')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-8">
                    <label class="form-label" for="validationCustom01">Description</label>
                    <textarea class="form-control" id="validationCustom01" type="text" name="description" value="{{ old('description') }}" id="" cols="10" rows="5" placeholder="Decrivez un peu la course"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-4">

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