{{--  

<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

--}}


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('images/logo_1.jpg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/logo_1.jpg')}}" type="image/x-icon">
    <title>Any Course</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">     
            <div class="login-card">
              <div>
                <div><a class="logo" href="#"><img class="img-fluid for-light" src="{{ asset('images/logo.png') }}" alt="looginpage"><img class="img-fluid for-dark"  alt="looginpage"></a></div>
                <div class="login-main"> 
                  <form class="theme-form" method="POST" action="{{ route('password.store') }}">

                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <h4>Créez votre mot de passe</h4>
                    <div class="form-group">
                      <label class="col-form-label">
                        Email</label>
                      <div class="form-input position-relative">
                        <input class="form-control" type="email" name="email" required autofocus autocomplete="email" placeholder="Entrer votre email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Nouveau mot de passe</label>
                      <div class="input-group">
                          <input name="password" type="password" class="form-control" id="password" placeholder="Entrer votre nouveau mot de passe" required="true" aria-label="password" aria-describedby="basic-addon1" />
                          <div class="input-group-append">
                            <span class="input-group-text" style="height: 50px; color: #fe9003;" onclick="password_show_hide();">
                              <i class="fas fa-eye" id="show_eye"></i>
                              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Retaper le mot de passe</label>
                      <div class="input-group">
                          <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Retaper le mot de passe" required="true" aria-describedby="basic-addon1" />
                          <div class="input-group-append">
                            <span class="input-group-text" style="height: 50px; color: #fe9003;" onclick="password_show_hide_confirm();">
                              <i class="fas fa-eye" id="show_eye_confirm"></i>
                              <i class="fas fa-eye-slash d-none" id="hide_eye_confirm"></i>
                            </span>
                          </div>
                      </div>
                    </div>
                    {{-- <div class="form-group">
                      <label class="col-form-label">
                        Nouveau mot de passe</label>
                      <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" required autofocus autocomplete="password" placeholder="Entrer votre password">
                        <div class="show-hide"><span class="show" style="color: #fe9003;"></span></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Retaper le mot de passe</label>
                      <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Entrer encore votre password">
                    </div> --}}
                    <div class="form-group mb-0">
                      <div class="checkbox p-0">
                        <input id="checkbox1" type="checkbox">
                        <label class="text-muted" for="checkbox1">Se souvenir du mot de passe</label>
                      </div>
                      <button class="btn btn-block w-100" type="submit" style="background-color: #fe9003; color:white">Connexion</button>
                    </div>
                    <p class="mt-4 mb-0">Vous n'avez pas de compte ?<a class="ms-2" href="{{ route('register') }}" style="color: #fe9003;">Créer un compte</a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page-wrapper Ends-->
    <!-- latest jquery-->
    <script>
      function password_show_hide() {
         var x = document.getElementById("password");
         var show_eye = document.getElementById("show_eye");
         var hide_eye = document.getElementById("hide_eye");
         hide_eye.classList.remove("d-none");
         if (x.type === "password") {
           x.type = "text";
           show_eye.style.display = "none";
           hide_eye.style.display = "block";
         } else {
           x.type = "password";
           show_eye.style.display = "block";
           hide_eye.style.display = "none";
         }
       }
    </script>

    <script>
      function password_show_hide_confirm() {
         var x = document.getElementById("password_confirmation");
         var show_eye = document.getElementById("show_eye_confirm");
         var hide_eye = document.getElementById("hide_eye_confirm");
         hide_eye.classList.remove("d-none");
         if (x.type === "password") {
           x.type = "text";
           show_eye.style.display = "none";
           hide_eye.style.display = "block";
         } else {
           x.type = "password";
           show_eye.style.display = "block";
           hide_eye.style.display = "none";
         }
       }
    </script>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>



