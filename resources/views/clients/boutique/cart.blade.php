@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Produits</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Accueil</li>
              <li class="breadcrumb-item active">Produits</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid product-wrapper">
        <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Cart</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="order-history table-responsive wishlist">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Nom du produit</th>
                            <th>Prix</th>
                            <th>Quantité(e)s</th>
                            <th>Action</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['prix'] * $details['quantity'] @endphp
                                            @if (isset($details['boutique_id']))
                                              <tr data-id="{{ $id }}">
                                                <td>
                                                    <img class="img-fluid img-40" src="{{ asset('boutiques/produits/images/'.$details['lienPhoto']) }}" alt="#"></td>
                                                <td>
                                                    <div class="product-name"><a href="#">{{ $details['nom_produit'] }}</a></div>
                                                </td>
                                                <td data-th="Price">${{ $details['prix'] }}</td>
                                                <td data-th="Quantity">
                                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                                </td>
                                                <td> 
                                                    <button class="btn btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                                <td>${{ $details['prix'] * $details['quantity'] }}</td>
                                              </tr>
                                            @elseif (isset($details['restaurant_id']))
                                              <tr data-id="{{ $id }}">
                                                <td>
                                                    <img class="img-fluid img-40" src="{{ asset('restaurants/plats/images/'.$details['lienPhoto']) }}" alt="#"></td>
                                                <td>
                                                    <div class="product-name"><a href="#">{{ $details['nom_produit'] }}</a></div>
                                                </td>
                                                <td data-th="Price">${{ $details['prix'] }}</td>
                                                <td data-th="Quantity">
                                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                                </td>
                                                <td> 
                                                    <button class="btn btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                                <td>${{ $details['prix'] * $details['quantity'] }}</td>
                                              </tr>
                                            @endif
                                            
                                    @endforeach
                                @endif
                                
                                <tr>
                                  <td class="text-end" colspan="5">Total</td>
                                  <td>
                                    <span class="text-danger "> {{ $total }} FCFA</span>
                                    {{-- <a class="btn btn-success cart-btn-transform" href="{{ route('process_boutique') }}">Payer ${{ $total }}</a> --}}
                                  </td>
                                </tr>
                        </tbody>
                      </table>
                    </div>
                    @php
                       $buttonAffiche = false; 
                    @endphp

                        <div class="btn-group mt-3">
                            @forelse ($cart_donnees as $cart_donnee)
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-5">
                              <form class="formulaire" action="" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success cart-btn-transform" {{-- href="{{ route('process_boutique') }}" --}}>Payer {{ $total }} FCFA</a>
                                  <input type="hidden" id="paiement" name="montant" value="{{ $total }}">
                              </form> 
                              {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Se faire Livrer</button> --}}
                            </div>
                              {{-- @if (isset($cart_donnee['boutique_id']) && !$buttonAffiche)
                                @php
                                  $buttonAffiche = true; 
                                @endphp
                              @else
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-5">
                                  <form class="formulaire" action="" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success cart-btn-transform" href="{{ route('process_boutique') }}">Payer {{ $total }} FCFA</a>
                                      <input type="hidden" id="paiement" name="montant" value="{{ $total }}">
                                  </form> 
                                </div>
                              @endif --}}
                            @empty
                            
                            @endforelse
                        </div>
                          
                          {{-- <a class="btn btn-success cart-btn-transform" href="{{ route('process_boutique') }}">Payer {{ $total }} FCFA</a> --}}
                        {{-- <a class="btn btn-primary" href="{{ route('livraison.client.create') }}"></a> 
                        
                        --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myLargeModalLabel">Formulaire pour commencer une livraison</h4>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" action="{{ route('livraison.client.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                        {{-- <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Titre</label>
                          <input class="form-control" id="validationCustom01" type="text" name="titre" value="{{ old('titre') }}" placeholder="Entrer le titre de la livraison">
                          @error('titre')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div> --}}
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Adresse de livraison</label>
                          <input class="form-control" id="validationCustom01" type="text" name="adresse_livraison" value="{{ old('adresse_livraison') }}" placeholder="Entrer l'adresse de livraison">
                          @error('adresse_livraison')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-4 text-end">
                            <button class="btn btn-primary" type="submit">Valider</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

    @section('scripts')
        <script src="https://cdn.kkiapay.me/k.js"></script>
        <script type="text/javascript">
            var formulaire = document.querySelector(".formulaire");
            formulaire.onsubmit = (e) =>{
              e.preventDefault();
              console.log(formulaire.montant.value);
                var paiement = openKkiapayWidget(
                    { 
                      amount:formulaire.montant.value,
                      position:"center",
                      callback:"",
                      data:"Paiement d'achat",
                      theme:"#fe9003",
                      key:"cc7cb3b09db511ee87187175d55d1502",
                      sandbox:"true"
                      // key:"8156429fbe70632204050df20585e343a3598747",
                    })

                    addSuccessListener(response => {
                       var transaction_Id = response.transactionId;
                       var url = '/livraisons/callback/'+ transaction_Id; 
                       document.location.href = url;
                        console.log(response);
                    });

                    // paiement.addFailedListener(error => {
                    //     console.log(error);
                    // });
            }
        // var montant_total = document.getElementById('paiement').value;

        // console.log(montant_total);
        </script>
      
        <script type="text/javascript">
        
            $(".update-cart").change(function (e) {
                e.preventDefault();
        
                var ele = $(this);
        
                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id"), 
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                    window.location.reload();
                    }
                });
            });
        
            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
        
                var ele = $(this);
        
                if(confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        
        </script>
    @endsection
@endsection