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
              <li class="breadcrumb-item"><a href="{{ route('client') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('livraison.client.index') }}">Payement</a></li>
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
                        <h5>Choix du payement</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a class="btn " style="background-color: #fe9003; color: #ffffff" href="{{ route('livraison.client.index') }}">Retour</a>
                        {{-- <button class="btn" style="background-color: #fe9003; color: #ffffff" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Retour</button> --}}
                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-header">
                            <div class="text-center">
                                <h6>Payememt des {{ $livraison->prix }} FCFA par:</h6>
                                <form class="formulaire" action="" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-primary cart-btn-transform" {{-- href="{{ route('process_boutique') }}" --}}>Mobile Money</a>
                                    <input type="hidden" id="paiement" name="montant" value="{{ $livraison->prix }}">
                                    <input type="hidden" id="paiement" name="id_livraison" value="{{ $livraison->id }}">
                                </form>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-header">
                            <div class="text-center">
                              <h6>Payememt des {{ $livraison->prix }} FCFA en:</h6>
                              <a href="{{ route('livraison.client.payement_start',  $livraison->id) }}" class="btn btn-primary">Espèces</a>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
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
                      data:"Payement d'une livraison",
                      theme:"#fe9003",
                      //  key:"8156429fbe70632204050df20585e343a3598747",
                      key:"cc7cb3b09db511ee87187175d55d1502",
                      sandbox:"true"
                    })

                    addSuccessListener(response => {
                       var transaction_Id = response.transactionId;
                       var url = '/livraisons/callback/'+ transaction_Id+'/'+formulaire.id_livraison.value; 
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
    @endsection
@endsection