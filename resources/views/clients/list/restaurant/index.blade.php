@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
            <div class="col-6">
                <h3>
                Restaurants</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                <li class="breadcrumb-item">Accueil</li>
                <li class="breadcrumb-item active">Restaurants</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid product-wrapper">
            <div class="product-grid">
                <div class="feature-products">
                    <div class="row">
                        <div class="col-md-6 products-total">
                            {{-- <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#" data-original-title="" title=""><i data-feather="grid"></i></a></div>
                            <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#" data-original-title="" title=""><i data-feather="list"></i></a></div><span class="d-none-productlist filter-toggle">
                                Filters<span class="ms-2"><i class="toggle-data" data-feather="chevron-down"></i></span></span>
                            <div class="grid-options d-inline-block">
                            <ul>
                                <li><a class="product-2-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-1 bg-primary"></span><span class="line-grid line-grid-2 bg-primary"></span></a></li>
                                <li><a class="product-3-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-3 bg-primary"></span><span class="line-grid line-grid-4 bg-primary"></span><span class="line-grid line-grid-5 bg-primary"></span></a></li>
                                <li><a class="product-4-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-6 bg-primary"></span><span class="line-grid line-grid-7 bg-primary"></span><span class="line-grid line-grid-8 bg-primary"></span><span class="line-grid line-grid-9 bg-primary"></span></a></li>
                                <li><a class="product-6-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-10 bg-primary"></span><span class="line-grid line-grid-11 bg-primary"></span><span class="line-grid line-grid-12 bg-primary"></span><span class="line-grid line-grid-13 bg-primary"></span><span class="line-grid line-grid-14 bg-primary"></span><span class="line-grid line-grid-15 bg-primary"></span></a></li>
                            </ul>
                            </div> --}}
                        </div>
                        <div class="col-md-6 text-end"><span class="f-w-600 m-r-5">Nombre Total de Restaurant : {{ $restaurants->count() }}  </span>
                            {{-- <div class="select2-drpdwn-product select-options d-inline-block">
                            <select class="form-control btn-square" name="select">
                                <option value="opt1">Featured</option>
                                <option value="opt2">Lowest Prices</option>
                                <option value="opt3">Highest Prices</option>
                            </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-6">
                            <form method="POST" action="{{ route('restaurant.list.client.index') }}">
                                @csrf

                                <div class="form-group m-0">
                                    <input class="form-control" type="search" name="name" placeholder="Rechercher par nom" data-original-title="" title=""><i class="fa fa-search"></i>
                                </div>
                            </form>
                            {{-- 
                                <div class="product-sidebar">
                                <div class="filter-section">
                                <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0 f-w-600">Filters<span class="pull-right"><i class="fa fa-chevron-down toggle-data"></i></span></h6>
                                </div>
                                <div class="left-filter">
                                    <div class="card-body filter-cards-view animate-chk">
                                    <div class="product-filter">
                                        <h6 class="f-w-600">Category</h6>
                                        <div class="checkbox-animated mt-0">
                                        <label class="d-block" for="edo-ani5">
                                            <input class="radio_animated" id="edo-ani5" type="radio" data-original-title="" title="">Man Shirt
                                        </label>
                                        <label class="d-block" for="edo-ani6">
                                            <input class="radio_animated" id="edo-ani6" type="radio" data-original-title="" title="">Man Jeans
                                        </label>
                                        <label class="d-block" for="edo-ani7">
                                            <input class="radio_animated" id="edo-ani7" type="radio" data-original-title="" title="">Woman Top
                                        </label>
                                        <label class="d-block" for="edo-ani8">
                                            <input class="radio_animated" id="edo-ani8" type="radio" data-original-title="" title="">Woman Jeans
                                        </label>
                                        <label class="d-block" for="edo-ani9">
                                            <input class="radio_animated" id="edo-ani9" type="radio" data-original-title="" title="">Man T-shirt
                                        </label>
                                        </div>
                                    </div>
                                    <div class="product-filter">
                                        <h6 class="f-w-600">Brand</h6>
                                        <div class="checkbox-animated mt-0">
                                        <label class="d-block" for="chk-ani">
                                            <input class="checkbox_animated" id="chk-ani" type="checkbox" data-original-title="" title=""> Levi's
                                        </label>
                                        <label class="d-block" for="chk-ani1">
                                            <input class="checkbox_animated" id="chk-ani1" type="checkbox" data-original-title="" title="">Diesel
                                        </label>
                                        <label class="d-block" for="chk-ani2">
                                            <input class="checkbox_animated" id="chk-ani2" type="checkbox" data-original-title="" title="">Lee
                                        </label>
                                        <label class="d-block" for="chk-ani3">
                                            <input class="checkbox_animated" id="chk-ani3" type="checkbox" data-original-title="" title="">Hudson
                                        </label>
                                        <label class="d-block" for="chk-ani4">
                                            <input class="checkbox_animated" id="chk-ani4" type="checkbox" data-original-title="" title="">Denizen
                                        </label>
                                        <label class="d-block" for="chk-ani5">
                                            <input class="checkbox_animated" id="chk-ani5" type="checkbox" data-original-title="" title="">Spykar
                                        </label>
                                        </div>
                                    </div>
                                    <div class="product-filter slider-product">
                                        <h6 class="f-w-600">Colors</h6>
                                        <div class="color-selector">
                                        <ul>
                                            <li class="white"></li>
                                            <li class="gray"></li>
                                            <li class="black"></li>
                                            <li class="orange"></li>
                                            <li class="green"></li>
                                            <li class="pink"></li>
                                            <li class="yellow"></li>
                                            <li class="blue"></li>
                                            <li class="red"></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="product-filter pb-0">
                                        <h6 class="f-w-600">Price</h6>
                                        <input id="u-range-03" type="text">
                                        <h6 class="f-w-600">New Products</h6>
                                    </div>
                                    <div class="product-filter pb-0 new-products">
                                        <div class="owl-carousel owl-theme" id="testimonial">
                                        <div class="item">
                                            <div class="product-box row">
                                            <div class="product-img col-md-5"><img class="img-fluid img-100" src="../assets/images/ecommerce/01.jpg" alt="" data-original-title="" title=""></div>
                                            <div class="product-details col-md-7 text-start"><span><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning"></i></span>
                                                <p class="mb-0">Fancy Shirt</p>
                                                <div class="product-price">$100.00</div>
                                            </div>
                                            </div>
                                            <div class="product-box row">
                                            <div class="product-img col-md-5"><img class="img-fluid img-100" src="../assets/images/ecommerce/02.jpg" alt="" data-original-title="" title=""></div>
                                            <div class="product-details col-md-7 text-start"><span><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning"></i></span>
                                                <p class="mb-0">Fancy Shirt</p>
                                                <div class="product-price">$100.00</div>
                                            </div>
                                            </div>
                                            <div class="product-box row">
                                            <div class="product-img col-md-5"><img class="img-fluid img-100" src="../assets/images/ecommerce/03.jpg" alt="" data-original-title="" title=""></div>
                                            <div class="product-details col-md-7 text-start"><span><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning"></i></span>
                                                <p class="mb-0">Fancy Shirt</p>
                                                <div class="product-price">$100.00</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-box row">
                                            <div class="product-img col-md-5"><img class="img-fluid img-100" src="../assets/images/ecommerce/01.jpg" alt="" data-original-title="" title=""></div>
                                            <div class="product-details col-md-7 text-start"><span><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning"></i></span>
                                                <p class="mb-0">Fancy Shirt</p>
                                                <div class="product-price">$100.00</div>
                                            </div>
                                            </div>
                                            <div class="product-box row">
                                            <div class="product-img col-md-5"><img class="img-fluid img-100" src="../assets/images/ecommerce/02.jpg" alt="" data-original-title="" title=""></div>
                                            <div class="product-details col-md-7 text-start"><span><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning"></i></span>
                                                <p class="mb-0">Fancy Shirt</p>
                                                <div class="product-price">$100.00</div>
                                            </div>
                                            </div>
                                            <div class="product-box row">
                                            <div class="product-img col-md-5"><img class="img-fluid img-100" src="../assets/images/ecommerce/03.jpg" alt="" data-original-title="" title=""></div>
                                            <div class="product-details col-md-7 text-start"><span><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning me-1"></i><i class="fa fa-star font-warning"></i></span>
                                                <p class="mb-0">Fancy Shirt</p>
                                                <div class="product-price">$100.00  </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="product-filter text-center"><img class="img-fluid banner-product" src="../assets/images/ecommerce/banner.jpg" alt="" data-original-title="" title=""></div>
                                    </div>
                                </div>
                                </div>
                                </div> 
                            </div>
                            --}}

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <form method="POST" action="{{ route('restaurant.list.client.index') }}">
                                @csrf
                                <div class="form-group m-0">
                                    <input class="form-control" type="search" name="ville" placeholder="Rechercher par ville" data-original-title="" title=""><i class="fa fa-search"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product-wrapper-grid">
                    <div class="row">
                        @foreach ($restaurants as $restaurant)
                            <div class="col-xl-3 col-sm-6 xl-4">
                                <div class="card">
                                <div class="product-box">
                                    <div class="product-img"><img class="img-fluid" src="{{ asset('Images_Smart/restaurants/'.$restaurant->photo) }}" alt="">
                                    {{-- <div class="product-hover">
                                        <ul>
                                        <li>
                                            <button class="btn" type="button"><i class="icon-shopping-cart"></i></button>
                                        </li>
                                        <li>
                                            <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="icon-eye"></i></button>
                                        </li>
                                        <li>
                                            <button class="btn" type="button"><i class="icofont icofont-law-alt-2"></i></button>
                                        </li>
                                        </ul>
                                    </div> --}}
                                    </div>
                                    {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="product-box row">
                                                <div class="product-img col-lg-6"><img class="img-fluid" src="{{ asset('Restaurants/images/images/'.$restaurant->photo) }}" alt=""></div>
                                                <div class="product-details col-lg-6 text-start">
                                                    <h4>Woman T-shirt</h4>
                                                    <div class="product-price">$26.00
                                                    <del>$350.00    </del>
                                                    </div>
                                                    <div class="product-view">
                                                    <h6 class="f-w-600">Product Details</h6>
                                                    <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                                    </div>
                                                    <div class="product-size">
                                                    <ul>
                                                        <li> 
                                                        <button class="btn btn-outline-light" type="button">M</button>
                                                        </li>
                                                        <li> 
                                                        <button class="btn btn-outline-light" type="button">L</button>
                                                        </li>
                                                        <li> 
                                                        <button class="btn btn-outline-light" type="button">Xl</button>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                    <div class="product-qnty">
                                                    <h6 class="f-w-600">Quantity</h6>
                                                    <fieldset>
                                                        <div class="input-group">
                                                        <input class="touchspin text-center" type="text" value="5">
                                                        </div>
                                                    </fieldset>
                                                    <div class="addcart-btn">
                                                        <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button">Add to Cart</button>
                                                        <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button">View Details</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="product-details">
                                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                    <h4>{{ $restaurant->nom_restaurant }}</h4>
                                    <p>{{ $restaurant->description }}</p>
                                    <div class="btn-group">
                                        <div class="product-price">
                                          {{ $restaurant->ville  }}
                                        </div>
      
                                        <div class="ms-5">
                                          <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('plat.client.index', $restaurant->id) }} " type="button">Visiter</a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
           </div>
        </div>
    </div>

    @section('scripts')
        
    @endsection
@endsection