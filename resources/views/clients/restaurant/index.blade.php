@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Plats</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Accueil</li>
              <li class="breadcrumb-item active">Plats</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid product-wrapper">
        <div class="product-grid">
          <div class="feature-products">
            <div class="row">
              {{-- <div class="col-md-6 products-total">
                <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#" data-original-title="" title=""><i data-feather="grid"></i></a></div>
                <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#" data-original-title="" title=""><i data-feather="list"></i></a></div><span class="d-none-productlist filter-toggle">
                      Filters<span class="ms-2"><i class="toggle-data" data-feather="chevron-down"></i></span></span>
                <div class="grid-options d-inline-block">
                  <ul>
                    <li><a class="product-2-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-1 bg-primary"></span><span class="line-grid line-grid-2 bg-primary"></span></a></li>
                    <li><a class="product-3-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-3 bg-primary"></span><span class="line-grid line-grid-4 bg-primary"></span><span class="line-grid line-grid-5 bg-primary"></span></a></li>
                    <li><a class="product-4-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-6 bg-primary"></span><span class="line-grid line-grid-7 bg-primary"></span><span class="line-grid line-grid-8 bg-primary"></span><span class="line-grid line-grid-9 bg-primary"></span></a></li>
                    <li><a class="product-6-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-10 bg-primary"></span><span class="line-grid line-grid-11 bg-primary"></span><span class="line-grid line-grid-12 bg-primary"></span><span class="line-grid line-grid-13 bg-primary"></span><span class="line-grid line-grid-14 bg-primary"></span><span class="line-grid line-grid-15 bg-primary"></span></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 text-end"><span class="f-w-600 m-r-5">Showing Products 1 - 24 Of 200 Results</span>
                <div class="select2-drpdwn-product select-options d-inline-block">
                  <select class="form-control btn-square" name="select">
                    <option value="opt1">Featured</option>
                    <option value="opt2">Lowest Prices</option>
                    <option value="opt3">Highest Prices</option>
                  </select>
                </div>
              </div> --}}
            </div>
            <div class="row">
              {{-- <div class="col-sm-3">
                <div class="product-sidebar">
                  <div class="filter-section">
                    <div class="card">
                      <div class="card-header">
                        <h6 class="mb-0 f-w-600">Filters<span class="pull-right"><i class="fa fa-chevron-down toggle-data"></i></span></h6>
                      </div>
                      <div class="left-filter">
                        <div class="card-body filter-cards-view animate-chk">
                          <div class="col-form-label select2-drpdwn">
                            <h6 class="f-w-600">Category</h6>
                              <select class="js-example-basic-single col-sm-12">
                                @foreach ($categoryplats as $categoryplat)
                                   <option value="{{ $categoryplat->id }}">{{ $categoryplat->name }}</option>
                                @endforeach 
                              </select>
                              
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
                          
                          <div class="product-filter pb-0">
                            <h6 class="f-w-600">Price</h6>
                            <input id="u-range-03" type="text">
                          </div>
                          
                                             


                            
                            
                            
                            <div class="product-filter pb-0 new-products">
                             <h6 class="f-w-600">New Products</h6>
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
              </div>
              <div class="col-md-9 col-sm-12">
                <form>
                  <div class="form-group m-0">
                    <input class="form-control" type="search" placeholder="Search.." data-original-title="" title=""><i class="fa fa-search"></i>
                  </div>
                </form>
              </div> --}}
            </div>
          </div>
          <div class="product-wrapper-grid" id="updateDiv">
                @if (!$plats)
                  <p>sorry, products not found</p>
                @else
                  <div class="row">
                    @foreach ($plats as $plat)
                        <div class="col-xl-3 col-sm-6 xl-4">
                          <div class="card">
                            <div class="product-box">
                              <div class="product-img"><img class="img-fluid" style="height: 300px; width: 310px;"  src="{{ asset('Images_Smart/Plats/'.$plat->lienPhoto) }}" alt="">
                                {{-- <div class="product-hover">
                                  <ul>
                                    <li>
                                      <button class="btn" type="button"><i class="icon-shopping-cart"></i></button>
                                    </li>
                                    <li>
                                      <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter_{{ $plat->id }}"><i class="icon-eye"></i></button>
                                    </li>
                                    <li>
                                      <button class="btn" type="button"><i class="icofont icofont-law-alt-2"></i></button>
                                    </li>
                                  </ul>
                                </div> --}}
                              </div>
                              <div class="modal fade" id="exampleModalCenter_{{ $plat->id }}" {{-- tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true" --}}>
                                {{-- <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <div class="product-box row">
                                        <div class="product-img col-lg-6"><img class="img-fluid" src="{{ asset('boutiques/plats/images/'.$plat->lienPhoto) }}" alt=""></div>
                                        <div class="product-details col-lg-6 text-start">
                                          <h4>{{ $plat->nom_plat }}</h4>
                                          <div class="product-price"> ${{ $plat->prix }} 
                                            
                                          </div>
                                          <div class="product-view">
                                            <h6 class="f-w-600">Product Details</h6>
                                            <p class="mb-0">{{ $plat->description }}</p>
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
                                </div> --}}
                              </div>
                              <div class="product-details">
                                <div class="rating text-center"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                <h4 class="text-center">{{ $plat->nom_plat }}</h4>
                                <p class="text-center">{{ $plat->description }}</p>
                                <div class="btn-group">
                                  <div class="product-price">
                                    ${{ $plat->prix }}
                                  </div>
                                  <div class="ms-5">
                                    <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('add.dish.to.cart', $plat->id) }}" type="button">Add to Cart</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endforeach
                  </div>
                @endif
          </div>
           
          </div>
        </div>
      </div>

    </div>

    @section('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endsection
@endsection