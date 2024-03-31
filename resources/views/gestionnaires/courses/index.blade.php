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
                        <h5>Listes des courses</h5>
                    </div>
                    <div class="col-lg-6 text-end">

                    </div>
                </div>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                  <li class="nav-item"><a class="nav-link active" id="pills-warninglivraison-tab" data-bs-toggle="pill" href="#pills-warninglivraison" role="tab" aria-controls="pills-warninglivraison" aria-selected="false"><i class="icofont icofont-contacts"></i>Courses</a></li>
                  <li class="nav-item"><a class="nav-link" id="pills-warninghistorique-tab" data-bs-toggle="pill" href="#pills-warninghistorique" role="tab" aria-controls="pills-warninghistorique" aria-selected="false"><i class="icofont icofont-contacts"></i>Historiques</a></li>
                </ul>
                <div class="tab-content" id="pills-warningtabContent">              
                  <div class="tab-pane fade show active" id="pills-warninglivraison" role="tabpanel" aria-labelledby="pills-warninglivraison-tab">
                    <livewire:CourseGestionnaireList />
                  </div>
                  <div class="tab-pane fade" id="pills-warninghistorique" role="tabpanel" aria-labelledby="pills-warninghistorique-tab">
                    <livewire:HistoriqueCourseGestionnaire />
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection