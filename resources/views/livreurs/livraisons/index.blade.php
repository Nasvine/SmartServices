@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Livraisons</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('livreur') }}"></a> Dashboard</li>
              <li class="breadcrumb-item active">Livraison</li>
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
                {{-- <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Liste des Livraisons</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                        </div>
                    </div>
                </div> --}}

                <div class="card-body">
                  <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="pills-warningmescourses-tab" data-bs-toggle="pill" href="#pills-warningmescourses" role="tab" aria-controls="pills-warningmescourses" aria-selected="true">Livraison</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-warningcontact-tab" data-bs-toggle="pill" href="#pills-warninghistorique" role="tab" aria-controls="pills-warninghistorique" aria-selected="false">Historique</a></li>
                  </ul>
                  <div class="tab-content" id="pills-warningtabContent">
  
                    <div class="tab-pane fade show active" id="pills-warningmescourses" role="tabpanel" aria-labelledby="pills-warningmescourses-tab">
                      <livewire:LivraisonLivreurList />
                    </div>
                    
                    <div class="tab-pane fade" id="pills-warninghistorique" role="tabpanel" aria-labelledby="pills-warninghistorique-tab">
                      <livewire:HistoriqueLivraisonLivreur />
                    </div>

                  </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
   
@endsection