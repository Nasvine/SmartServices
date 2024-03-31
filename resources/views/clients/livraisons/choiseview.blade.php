@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
              Livraison</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Livraison</li>
              <li class="breadcrumb-item active">Choix</li>
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
                          <h5>Choisissez l'option de livraison</h5>
                      </div>
                      <div class="col-lg-6 text-end">
                          <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('livraison.client.index') }}">Voir mes livraisons</a>
                      </div>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-xl-3 col-sm-6 xl-4">
                        <a href="{{ route('livraison.client.create') }}" style="background-color: #fe9003; color: #000000">
                          <div class="card"  >
                            <div class="product-box">
                              <div class="" style="height: 85%;"><img class="img-fluid" src="{{ asset("assets/images/course.jpg") }}" alt="">
                                
                              </div>
                              <div class="product-details">
                                <div class="rating text-center"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                <h4 class="text-center">Livraison simple</h4>
                                <p class="text-center">
                                    Vous désirez vous faire livrer un colis simplement.
                                </p>
                                <div class="product-price text-center">
                                  <a href="{{ route('livraison.client.create') }}" class="btn" style="background-color: #fe9003; color:white; width: 260px;">Commencer</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 xl-4">
                        <a href="{{ route('restaurant.list.client.index') }}" style="background-color: #fe9003; color: #000000">
                          <div class="card">
                            <div class="product-box">
                              <div class="product-img"><img class="img-fluid" src="{{ asset("assets/images/Resto.jpg") }}" alt="">
                                
                              </div>
                              <div class="product-details">
                                <div class="rating text-center"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                <h4 class="text-center">Restaurant</h4>
                                <p class="text-center">Vous désirez payer dans un restaurant et vous fait livrer chez vous ou un lieu spécifique. Visiter nos restaurant en appuyant juste sur le bouton ci-dessous.</p>
                                <div class="product-price text-center">
                                  <a href="{{ route('restaurant.list.client.index') }}" class="btn" style="background-color: #fe9003; color:white; width: 260px;">Visiter</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 xl-4">
                        <a href="{{ route('boutique.list.client.index') }}" style="background-color: #fe9003; color: #000000">
                          <div class="card">
                            <div class="product-box">
                              <div class="product-img"><img class="img-fluid" src="{{ asset("assets/images/Shop_1.jpg") }}" alt="">
                                
                              </div>
                              <div class="product-details">
                                <div class="rating text-center"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                <h4 class="text-center">Boutique</h4>
                                <p class="text-center">
                                  Vous désirez payer dans une boutique et vous fait livrer chez vous ou un lieu spécifique. Visiter nos boutiques en appuyant juste sur le bouton ci-dessous.
                                </p>
                                <div class="product-price text-center">
                                  <a href="{{ route('boutique.list.client.index') }}" class="btn" style="background-color: #fe9003; color:white; width: 260px;">Commencer</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>

                  </div>
              </div>
            </div>
        </div>
        
      </div>
    </div>
<!-- Container-fluid Ends-->
@endsection