@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
              Dash</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">Dash</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-sm-6 xl-4">
          <a href="#" style="background-color: #fe9003; color: #000000">
            <div class="card">
              <div class="product-box">
                <div class="product-img"><img class="img-fluid" src="{{ asset("assets/images/Livraison.jpg") }}" alt="">
                  
                </div>
                <div class="product-details">
                  <div class="rating text-center"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                  <h4 class="text-center">Livraison</h4>
                  <p class="text-center">Nous mettons à votre disposition des livreurs pour tous articles, produits ou autres payés dans une boutique ou restaurant, etc..</p>
                  <div class="product-price text-center">
                    <a href="{{ route('livraison.client.choiseview') }}" class="btn" style="background-color: #fe9003; color:white; width: 260px;">Commencer</a>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        {{-- <div class="col-xl-3 col-sm-6 xl-4">
          <a href="{{ route('course.client.index') }}" style="background-color: #fe9003; color: #000000">
            <div class="card">
              <div class="product-box">
                <div class="product-img"><img class="img-fluid" src="{{ asset("assets/images/course.jpg") }}" alt="">
                  
                </div>
                <div class="product-details">
                  <div class="rating text-center"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                  <h4 class="text-center">Course</h4>
                  <p class="text-center">
                    Vous souhaitez charger votre gaz, vous voulez une personne de confiance à qui confier vos achats afin d'être livrés d'un lieu en un autre, je crois que vous êtes à la bonne porte.
                     Cliquez juste sur Démarrer pour initier une course.
                  </p>
                  <div class="product-price text-center">
                    <a href="{{ route('course.client.index') }}" class="btn" style="background-color: #fe9003; color:white; width: 260px;">Démarrer</a>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div> --}}
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
                  <p class="text-center">Vous désirez payer dans une boutique et vous fait livrer chez vous ou un lieu spécifique. Visiter nos boutiques en appuyant juste sur le bouton ci-dessous.</p>
                  <div class="product-price text-center">
                    <a href="{{ route('boutique.list.client.index') }}" class="btn" style="background-color: #fe9003; color:white; width: 260px;">Visiter</a>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 xl-4">
          <a href="{{ route('boutique_client.client.index') }}" style="background-color: #fe9003; color: #000000">
            <div class="card">
              <div class="product-box">
                <div class="product-img"><img class="img-fluid" src="{{ asset("assets/images/Shop_1.jpg") }}" alt="">
                  
                </div>
                <div class="product-details">
                  <div class="rating text-center"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                  <h4 class="text-center">Créaction d'une Boutique</h4>
                  <p class="text-center">
                    Nous vous laissons le libre choix de créer une boutique et de le personnaliser en fonction de votre goût.
                  </p>
                  <div class="product-price text-center">
                    <a href="{{ route('boutique_client.client.index') }}" class="btn" style="background-color: #fe9003; color:white; width: 260px;">Créer</a>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
<!-- Container-fluid Ends-->
@endsection