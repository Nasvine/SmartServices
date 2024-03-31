{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets_register/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets_register/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets_register/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets_register/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets_register/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets_register/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets_register/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets_register/js/config.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">

  </head>
  <body>
    <!-- login page start-->
    {{-- <div class="container-fluid p-0"> 
      <div class="row m-0">
        <div class="col-xl-6 p-0">
          <img class="bg-img-cover" src="{{ asset('assets/images/login/1.jpg') }}" style="height: 100px; width: 100px;" alt="looginpage">
        </div>
        <div class="col-xl-6 p-0"> 
          <div class="login-card">
            <div>
                <div>
                    <a class="logo" href="index.html">
                      <img class="img-fluid for-light" src="{{ asset('images/logo.png') }}"  alt="looginpage">
                    </a>
                </div>
              <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('register') }}">
                    @csrf
                  <h4>Inscription</h4>
                  <div class="form-group">
                    <label class="col-form-label pt-0">Nom & Prénom</label>
                    <div class="row g-2">
                      <div class="col-6">
                        <input class="form-control" type="text" name="last_name" required="" placeholder="Votre Nom">
                      </div>
                      <div class="col-6">
                        <input class="form-control" type="text" name="first_name" required="" placeholder="Votre Prénom">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Nom d'utilisateur</label>
                        <input class="form-control" type="text" name="nomUtilisateur" placeholder="Votre nom d'utilisateur">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Numéro de Téléphone</label>
                        <input class="form-control" type="number" name="phone" required  placeholder="91 00 00 00">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email</label>
                    <input class="form-control" type="email" name="email" required autocomplete="email" placeholder="Test@gmail.com">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">Mot de Passe</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="votre mot de passe" required autocomplete="new-password" />
                        <div class="input-group-append">
                          <span class="input-group-text" style="height: 50px; color: #fe9003;" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                          </span>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Mot de Passe de Confirmation</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="mot de passe" required autocomplete="new-password"/>
                        <div class="input-group-append">
                          <span class="input-group-text" style="height: 50px; color: #fe9003;" onclick="password_show_hide_confirm();">
                            <i class="fas fa-eye" id="show_eye_confirm"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye_confirm"></i>
                          </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Se souvenir de moi<a class="ms-2" href="#" style="color: #fe9003;"></a></label>
                    </div>
                    <button class="btn  btn-block w-100" type="submit" style="background-color: #fe9003; color:white">Creer votre compte</button>
                  </div>
                  <p class="mt-4 mb-0 text-center">Vous avez déjà un compte ?<a class="ms-2" href="{{ route('login') }}" style="color: #fe9003;">Connectez-vous</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="container">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="row">
            <div class="col-md-2"></div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <!-- Logo -->
                      <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                          <span class="app-brand-logo demo">
                            <img src="{{ asset('images/logo.png') }}" height="200px" width="200px" alt="">
                          </span>
                        {{-- <span class="app-brand-text demo text-body fw-bold">AnyCourse</span> --}}
                        </a>
                      </div>
                      <!-- /Logo -->
                      <h4 class="mb-2 text-center">L'aventure commence ici 🚀</h4>
                      <p class="mb-4 text-center">Rendez la gestion de vos applications facile et amusante!</p>
        
                      <form class="row g-3" method="POST" action="{{ route('register') }}">
                            @csrf
                          <div class="col-md-6">
                            <label class="form-label" for="formValidationName">Nom *</label>
                            <input type="text" id="formValidationName" class="form-control" placeholder="Entrer votre nom" name="last_name" />
                          </div>

                          <div class="col-md-6">
                            <label class="form-label" for="formValidationName">Prénom(s) *</label>
                            <input type="text" id="formValidationName" class="form-control" placeholder="Entrer votre prénom" name="first_name" />
                          </div>

                          <div class="col-md-6">
                            {{-- <label class="form-label" for="formValidationName">Nom d'utilisateur *</label>
                            <input type="text" id="formValidationName" class="form-control" name="nomUtilisateur" placeholder="Votre nom d'utilisateur" /> --}}
                            <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email" />
                          </div>

                          <div class="col-md-6">
                            <label class="form-label" for="formValidationName">Numéro de Téléphone *</label>
                            <input type="tel" id="phone" name="phone" class="form-control" id="" style="width: 325px;"> 
                            {{-- <input type="number" id="formValidationName"  name="phone" placeholder="91003606" /> --}}
                          </div>
                          
                        {{-- <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email" />
                        </div> --}}
                        <div class="mb-3 form-password-toggle">
                          <label class="form-label" for="password">Mot de passe *</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="password"
                              id="password"
                              class="form-control"
                              name="password"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                          </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                          <label class="form-label" for="password">Confirmation du mot de passe *</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="password"
                              id="password"
                              class="form-control"
                              name="password_confirmation"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                          </div>
                        </div>
        
                        <div class="mb-3">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                            <label class="form-check-label" for="terms-conditions">
                                Je suis d'accord pour les 
                              <a href="javascript:void(0);" {{-- style="color:#fe9003;" --}}>politiques de confidentialité et conditions.</a>
                            </label>
                          </div>
                        </div>
                        <button class="btn d-grid w-100" style="background-color: #fe9003; color:#ffff">Inscription</button>
                      </form>
        
                      <p class="text-center mt-2">
                        <span style="color:#000000">Vous avez déjà un compte?</span>
                        <a href="{{ route('login') }}">
                          <span>Connectez-vous</span>
                        </a>
                      </p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
          </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#phone");
        const errorMsg = document.querySelector("#error-msg");
        const validMsg = document.querySelector("#valid-msg");

        // here, the index maps to the error code returned from getValidationError - see readme
        const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        // initialise plugin
        const iti = window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
        });

        const reset = () => {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };

        // on blur: validate
        input.addEventListener('blur', () => {
            reset();
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                    validMsg.classList.remove("hide");
                } else {
                    input.classList.add("error");
                    const errorCode = iti.getValidationError();
                    errorMsg.innerHTML = errorMap[errorCode];
                    errorMsg.classList.remove("hide");
                }
            }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
    </script>
    <script src="{{ asset('assets_register/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets_register/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets_register/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets_register/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets_register/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets_register/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>