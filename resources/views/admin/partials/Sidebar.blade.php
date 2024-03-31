<div>
  <div class="logo-wrapper">
    <a href="#"><img class="img-fluid for-light" src="{{ asset('Images_Smart/logo_smart_service.jpg') }}" height="60px;" width="60px;" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png')}}" alt=""></a>
    
    {{-- <div class="back-btn"><i class="fa fa-angle-left"></i></div> --}}
    <div class="toggle-sidebar">
      <h5
      class="mt-3" style="color: #04365b;">Smart Services</h5>
      {{-- <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i> --}}
    </div>
  </div>
  <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
  <nav class="sidebar-main">
    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
    <div id="sidebar-menu">
      <ul class="sidebar-links" id="simple-bar">
        <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png')}}" alt=""></a>
          <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
        </li>
        <li class="sidebar-main-title mt-3">
          <div>
            <h6 class="text-warning">Menus </h6>
          </div>
        </li>
        @can('seen_super_admin_sidebar', App\Models\User::class)
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin') }}"><i data-feather="home"></i>
              <span class="lan-3">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Utilisateurs</span></a>
            <ul class="sidebar-submenu">
              <li><a href="{{ route('user.admin.index') }}">Utilisateurs</a></li>
              <li><a href="{{ route('permission.admin.index') }}">Permissions</a></li>
              <li><a href="{{ route('role.admin.index') }}">Roles</a></li>
            </ul>
          </li>
          <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-cart"></i><span>Gestion des Boutiques</span></a>
            <ul class="sidebar-submenu">
              <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('boutique.admin.index') }}"><span>Boutiques</span></a></li>
              <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('category_produit.admin.index') }}"><span>Categories de produits</span></a></li>
            </ul>
          </li> 
          <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Gestion des Restaurants</span></a>
            <ul class="sidebar-submenu">
              <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('restaurant.admin.index') }}"><span>Restaurants</span></a></li>
              <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('category_plat.admin.index') }}"><span>Categories de plat</span></a></li>
            </ul>
          </li>
          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('logactivity') }}"><i data-feather="sunrise"> </i><span>Liste des Activités</span></a></li>
          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>Déconnexion</span></a></li>
        @endcan


          @can('seen_admin_sidebar', App\Models\User::class)
            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin') }}"><i data-feather="home"></i>
                <span class="lan-3">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Utilisateurs</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{ route('user.admin.index') }}">Utilisateurs</a></li>
                {{-- <li><a href="{{ route('permission.admin.index') }}">Permissions</a></li>
                <li><a href="{{ route('role.admin.index') }}">Roles</a></li> --}}
              </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-cart"></i><span>Gestion des Boutiques</span></a>
              <ul class="sidebar-submenu">
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('boutique.admin.index') }}"><span>Boutiques</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('category_produit.admin.index') }}"><span>Categories de produits</span></a></li>
              </ul>
            </li> 
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Gestion des Restaurants</span></a>
              <ul class="sidebar-submenu">
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('restaurant.admin.index') }}"><span>Restaurants</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('category_plat.admin.index') }}"><span>Categories de plat</span></a></li>
              </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('logactivity') }}"><i data-feather="sunrise"> </i><span>Liste des Activités</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>Déconnexion</span></a></li>
          @endcan
          
          
          @can('seen_gestionnaire_sidebar', App\Models\User::class)

            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="{{ route('gestionnaire') }}"><i data-feather="home"></i>
                <span class="lan-3">Dashboard</span>
              </a>
            </li>
            {{-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('course.gestionnaire.index') }}"><i data-feather="package"></i><span>Courses</span></a></li> --}}
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('livraison.gestionnaire.index') }}"><i data-feather="airplay"></i><span>Livraisons</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('statistique.index') }}"><i data-feather="airplay"></i><span>Statistiques</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('inventaire_livreur.index') }}"><i data-feather="airplay"></i><span>Inventaires</span></a></li>


            <li class="sidebar-main-title">
              <div>
                <h6 class="text-warning">Créaction</h6>
                <p >Boutique & Restaurant.</p>
              </div>
            </li> 
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-cart"></i><span>Gestion des Boutiques</span></a>
              <ul class="sidebar-submenu">
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('boutique.admin.index') }}"><span>Boutiques</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('category_produit.admin.index') }}"><span>Categories de produits</span></a></li>
              </ul>
            </li> 
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Gestion des Restaurants</span></a>
              <ul class="sidebar-submenu">
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('restaurant.admin.index') }}"><span>Restaurants</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('category_plat.admin.index') }}"><span>Categories de plat</span></a></li>
              </ul>
            </li>
            <li class="sidebar-main-title">
              <div>
                <h6 class="text-warning">Créaction</h6>
                <p >Utilisateurs</p>
              </div>
            </li> 
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Utilisateurs</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{ route('user.admin.index') }}">Utilisateurs</a></li>
              </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>Déconnexion</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><span></span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><span></span></a></li>
            @endcan
            
            @can('seen_client_sidebar', App\Models\User::class)

            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="{{ route('client') }}"><i data-feather="home"></i>
                <span class="lan-3">Dashboard</span>
              </a>
            </li>
            {{-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('course.client.index') }}"><i data-feather="package"></i><span>Courses</span></a></li> --}}
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('livraison.client.choiseview') }}"><i data-feather="airplay"></i><span>Livraisons</span></a></li>

            <li class="sidebar-main-title">
              <div>
                <h6 class="text-warning">Créaction</h6>
                <p >Boutique & Restaurant.</p>
              </div>
            </li> 
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('boutique.admin.index') }}"><i data-feather="shopping-cart"></i><span>Boutiques</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('restaurant.admin.index') }}"><i data-feather="box"></i><span>Restaurants</span></a></li>

            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>Déconnexion</span></a></li>
    
          @endcan

          @can('seen_livreur_sidebar', App\Models\User::class)

            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="{{ route('livreur') }}"><i data-feather="home"></i>
                <span class="lan-3">Dashboard</span>
              </a>
            </li>

            {{-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('course.livreur.index') }}"><i data-feather="package"></i><span>Courses</span></a></li> --}}
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('livraison.livreur.index') }}"><i data-feather="airplay"></i><span>Livraisons</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>Déconnexion</span></a></li>
        
          @endcan



      </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
  </nav>
</div>