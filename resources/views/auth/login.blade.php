
{{-- <!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

      <title>Smart Services</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/favicon/favicon.ico') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css" class="template-customizer-core-css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css" class="template-customizer-theme-css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/vendor/css/pages/page-auth.css') }}" />

    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('asset/js/config.js') }}"></script>
  </head>

  <body>

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <div class="card">
            <div class="card-body">
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                   
                    <img src="{{ asset('Images_Smart/logo_smart_service.jpg') }}" height="100px" width="100px" alt="">
                  </span>
                    <span class="app-brand-text demo text-body fw-bold">Smart Services</span>
                </a>
              </div>
              <p class="mb-4">
                Merci pour l'enregistrement! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons volontiers un autre.
              </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-success dark:text-green-400">
                        {{ __("Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.") }}
                    </div>
                @endif
              <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button class="btn d-grid w-100" style="background-color: #235d8a; color:#ffff">Renvoyer l'e-mail de vérification</button>
              </form>
              <div class="text-center">
                <a href="{{ route('logout') }}" style="color:#fe9003;" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Déconnexion
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>

    <script src="{{ asset('asset/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html> --}}




<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../asset/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Smart Services</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/favicon/favicon.ico') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/vendor/css/pages/page-auth.css') }}" />

    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('asset/js/config.js') }}"></script>
  </head>

  <body>

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="card">
            <div class="card-body">
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="{{ asset('Images_Smart/logo_smart_service.jpg') }}" height="100px" width="100px" alt="">
                  </span>
                  <span class="app-brand-text demo text-body fw-bold">Smart Services</span>
                </a>
              </div>
              <h4 class="mb-2">Bienvenue sur Smart Services 👋</h4>
              <p class="mb-4">Veuillez vous connecter à votre compte et commencer l'aventure</p>

              <form id="formAuthentication" method="POST" action="{{ route('login') }}" class="mb-3">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Entrer votre email"
                    autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Mot de passe</label>
                    <a href="{{ route('password.request') }}">
                      <small style="color:#fe9003;">Mot de passe oublié?</small>
                    </a>
                  </div>
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
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Souviens-toi de moi </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn d-grid w-100" style="background-color: #235d8a; color:#ffff" type="submit">Connexion</button>
                </div>
              </form>

              <p class="text-center">
                <span>Nouveau sur notre plateforme ?</span>
                <a href="{{ route('register') }}">
                  <span style="color:#fe9003;">Créer un compte</span>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>



    <script src="{{ asset('asset/js/main.js') }}"></script>


    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
