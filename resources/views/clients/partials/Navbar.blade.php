
@php
  use App\Models\admin\notifications\Notification;

  $notifications = Notification::OrderBy('id', 'desc')->where('status', 'non lu')->where('type_de_notification', 'Livraison')->where('type_d_acteur', 'Client')->where('user_receive_id', Auth::id())->limit(5)->get();
  $total_notification = Notification::all();
  $count_notification = count($notifications);

@endphp



<div class="header-wrapper row m-0">
  <form class="form-inline search-full col" action="#" method="get">
    <div class="form-group w-100">
      <div class="Typeahead Typeahead--twitterUsers">
        <div class="u-posRelative">
          <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
          <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
        </div>
        <div class="Typeahead-menu"></div>
      </div>
    </div>
  </form>
  <div class="header-logo-wrapper col-auto p-0">
    <div class="logo-wrapper"><a href="#"><img class="img-fluid" src="{{ asset('images/ico_any_course.png')}}" alt=""></a></div>
    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
  </div>
  <div class="left-header col horizontal-wrapper ps-0">
    <ul class="horizontal-menu">
      {{-- <li class="mega-menu outside"><a class="nav-link" href="#!"><i data-feather="layers"></i><span>Bonus Ui</span></a>
        <div class="mega-menu-container nav-submenu menu-to-be-close header-mega">
          <div class="container-fluid">
            <div class="row">
              <div class="col mega-box">
                <div class="mobile-title d-none">
                  <h5>Mega menu</h5><i data-feather="x"></i>
                </div>
                <div class="link-section icon">
                  <div>
                    <h6>Error Page</h6>
                  </div>
                  <ul>
                    <li><a href="error-400.html">Error page 400</a></li>
                    <li><a href="error-401.html">Error page 401</a></li>
                    <li><a href="error-403.html">Error page 403</a></li>
                    <li><a href="error-404.html">Error page 404</a></li>
                    <li><a href="error-500.html">Error page 500</a></li>
                    <li><a href="error-503.html">Error page 503</a></li>
                  </ul>
                </div>
              </div>
              <div class="col mega-box">
                <div class="link-section doted">
                  <div>
                    <h6> Authentication</h6>
                  </div>
                  <ul>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="login_one.html">Login with image</a></li>
                    <li><a href="login-bs-validation.html">Login with validation</a></li>
                    <li><a href="sign-up.html">Sign Up</a></li>
                    <li><a href="sign-up-one.html">SignUp with image</a></li>
                    <li><a href="sign-up-two.html">SignUp with image</a></li>
                  </ul>
                </div>
              </div>
              <div class="col mega-box">
                <div class="link-section dashed-links">
                  <div>
                    <h6>Usefull Pages</h6>
                  </div>
                  <ul>
                    <li><a href="search.html">Search Website</a></li>
                    <li><a href="unlock.html">Unlock User</a></li>
                    <li><a href="forget-password.html">Forget Password</a></li>
                    <li><a href="reset-password.html">Reset Password</a></li>
                    <li><a href="maintenance.html">Maintenance</a></li>
                    <li><a href="login-sa-validation">Login validation</a></li>
                  </ul>
                </div>
              </div>
              <div class="col mega-box">
                <div class="link-section">
                  <div>
                    <h6>Email templates</h6>
                  </div>
                  <ul>
                    <li class="ps-0"><a href="basic-template.html">Basic Email</a></li>
                    <li class="ps-0"><a href="email-header.html">Basic With Header</a></li>
                    <li class="ps-0"><a href="template-email.html">Ecomerce Template</a></li>
                    <li class="ps-0"><a href="template-email-2.html">Email Template 2</a></li>
                    <li class="ps-0"><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                    <li class="ps-0"><a href="email-order-success.html">Order Success</a></li>
                  </ul>
                </div>
              </div>
              <div class="col mega-box">
                <div class="link-section">
                  <div>
                    <h6>Coming Soon</h6>
                  </div>
                  <ul class="svg-icon">
                    <li><a href="comingsoon.html"> <i data-feather="file"> </i>Coming-soon</a></li>
                    <li><a href="comingsoon-bg-video.html"> <i data-feather="film"> </i>Coming-video</a></li>
                    <li><a href="comingsoon-bg-img.html"><i data-feather="image"> </i>Coming-Image</a></li>
                  </ul>
                  <div>
                    <h6>Other Soon</h6>
                  </div>
                  <ul class="svg-icon">
                    <li><a class="txt-primary" href="landing-page.html"> <i data-feather="cast"></i>Landing Page</a></li>
                    <li><a class="txt-secondary" href="sample-page.html"> <i data-feather="airplay"></i>Sample Page</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="level-menu outside"><a class="nav-link" href="#!"><i data-feather="inbox"></i><span>Level Menu</span></a>
        <ul class="header-level-menu menu-to-be-close">
          <li><a href="file-manager.html" data-original-title="" title="">                               <i data-feather="git-pull-request"></i><span>File manager    </span></a></li>
          <li><a href="#!" data-original-title="" title="">                               <i data-feather="users"></i><span>Users</span></a>
            <ul class="header-level-sub-menu">
              <li><a href="file-manager.html" data-original-title="" title="">                               <i data-feather="user"></i><span>User Profile</span></a></li>
              <li><a href="file-manager.html" data-original-title="" title="">                               <i data-feather="user-minus"></i><span>User Edit</span></a></li>
              <li><a href="file-manager.html" data-original-title="" title="">                               <i data-feather="user-check"></i><span>Users Cards</span></a></li>
            </ul>
          </li>
          <li><a href="kanban.html" data-original-title="" title="">                               <i data-feather="airplay"></i><span>Kanban Board</span></a></li>
          <li><a href="bookmark.html" data-original-title="" title="">                               <i data-feather="heart"></i><span>Bookmark</span></a></li>
          <li><a href="social-app.html" data-original-title="" title="">                               <i data-feather="zap"></i><span>Social App                     </span></a></li>
        </ul>
      </li> --}}
      <li><span class="header-search"><i data-feather="search"></i></span></li>
      {{-- <li>
        <div class="mode"><i class="fa fa-moon-o"></i></div>
      </li> --}}

    </ul>
  </div>
  <div class="nav-right col-8 pull-right right-header p-0">
    <ul class="nav-menus">
      
      {{-- Notification --}}


      <li class="onhover-dropdown notifications_dropdown">
        <div class="notification-box">
          <a  data-toggle="dropdown">
            <i data-count="{{ $count_notification }}" data-feather="bell"> </i>
              <span class="badge rounded-pill badge-secondary notif-count"> {{ $count_notification }}                              
              </span>
          </a>
        </div>
        <ul class="notification-dropdown onhover-show-div" style="width: 500px;">
          <li><i data-feather="bell"></i>
            <h6 class="f-18 mb-0">Notifications</h6>
          </li>
          {{-- <li class="drop">

          </li> --}}

          <livewire:MessageClientComponent />
          
          <li><a class="btn " style="background-color: #fe9003; color: #ffffff" style="margin-top: 20px;" href="{{ route('messages.client.index') }}">Voir tous les messages</a></li>
        </ul>
      </li>
      {{-- <li class="onhover-dropdown">
        <div class="notification-box"><i data-feather="star"></i></div>
        <div class="onhover-show-div bookmark-flip">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="front">
                <ul class="droplet-dropdown bookmark-dropdown">
                  <li class="gradient-primary"><i data-feather="star"></i>
                    <h6 class="f-18 mb-0">Bookmark</h6>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-4 text-center"><i data-feather="file-text"></i></div>
                      <div class="col-4 text-center"><i data-feather="activity"></i></div>
                      <div class="col-4 text-center"><i data-feather="users"></i></div>
                      <div class="col-4 text-center"><i data-feather="clipboard"></i></div>
                      <div class="col-4 text-center"><i data-feather="anchor"></i></div>
                      <div class="col-4 text-center"><i data-feather="settings"></i></div>
                    </div>
                  </li>
                  <li class="text-center">
                    <button class="flip-btn" id="flip-btn">Add New Bookmark</button>
                  </li>
                </ul>
              </div>
              <div class="back">
                <ul>
                  <li>
                    <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                      <input type="text" placeholder="search...">
                    </div>
                  </li>
                  <li>
                    <button class="d-block flip-back" id="flip-back">Back</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </li> --}}
      
      <li class="cart-nav onhover-dropdown">
        <div class="cart-box"><i data-feather="shopping-cart"></i><span class="badge rounded-pill badge-primary">{{ count((array) session('cart')) }}</span></div>
        <ul class="cart-dropdown onhover-show-div">
          <li>
            <h6 class="mb-0 f-20">Mon panier</h6><i data-feather="shopping-cart"></i>
          </li>
          @php $total = 0 @endphp
          @foreach((array) session('cart') as $id => $details)
              @php $total += $details['prix'] * $details['quantity'] @endphp
          @endforeach
          <li>
            <div class="total">
              <h6 class="mb-2 mt-0 text-muted">Order Total : <span class="f-right f-5 text-red">${{ $total }}</span></h6>
            </div>
          </li>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                  @if (isset($details['boutique_id']))
                    <li class="mt-0">
                      <div class="media"><img class="img-fluid rounded-circle me-3 img-60" src="{{ asset('boutiques/produits/images/'.$details['lienPhoto']) }}" alt="">
                        <div class="media-body">
                          <p>{{ $details['nom_produit'] }}</p>
                          <span class="price text-info"> ${{ $details['prix'] }}</span> <span class="count ms-4"> Quantity: <span style="color: red;">{{ $details['quantity'] }}</span></span>
                        </div>
                      </div>
                    </li>
                  @elseif (isset($details['restaurant_id']))
                    <li class="mt-0">
                      <div class="media"><img class="img-fluid rounded-circle me-3 img-60" src="{{ asset('restaurants/plats/images/'.$details['lienPhoto']) }}" alt="">
                        <div class="media-body">
                          <p>{{ $details['nom_produit'] }}</p>
                          <span class="price text-info"> ${{ $details['prix'] }}</span> <span class="count ms-4"> Quantity: <span style="color: red;">{{ $details['quantity'] }}</span></span>
                        </div>
                      </div>
                    </li>
                  @endif
                @endforeach
            @endif
          
          <li><a class="btn btn-block w-100 mb-2 view-cart"  style="background-color: #fe9003; color: #ffffff" href="{{ route('cart.client.index') }}">Voir Tout</a></li>
        </ul>
      </li>
      {{--<li class="onhover-dropdown"><i data-feather="message-square"></i>
        <ul class="chat-dropdown onhover-show-div">
          <li><i data-feather="message-square"></i>
            <h6 class="f-18 mb-0">Message Box                                    </h6>
          </li>
          <li>
            <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/1.jpg" alt="">
              <div class="status-circle online"></div>
              <div class="media-body"><span>Erica Hughes</span>
                <p>Lorem Ipsum is simply dummy...</p>
              </div>
              <p class="f-12 font-success">58 mins ago</p>
            </div>
          </li>
          <li>
            <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/2.jpg" alt="">
              <div class="status-circle online"></div>
              <div class="media-body"><span>Kori Thomas</span>
                <p>Lorem Ipsum is simply dummy...</p>
              </div>
              <p class="f-12 font-success">1 hr ago</p>
            </div>
          </li>
          <li>
            <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/4.jpg" alt="">
              <div class="status-circle offline"></div>
              <div class="media-body"><span>Ain Chavez</span>
                <p>Lorem Ipsum is simply dummy...</p>
              </div>
              <p class="f-12 font-danger">32 mins ago</p>
            </div>
          </li>
          <li class="text-center"> <a class="btn " style="background-color: #fe9003; color: #ffffff" href="#">View All     </a></li>
        </ul>
      </li>
      
      <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
      --}}
      <li class="profile-nav onhover-dropdown p-0 me-0">
        <div class="media profile-media">
          @if (isset(Auth::user()->profile))
            <img class="b-r-10" src="{{ asset('utilisateurs/images/image_profile/'.Auth::user()->profile->photo)}}" height="40px" width="40px" alt="">
          @else
            <img class="b-r-10" src="{{ asset('no_profile.png')}}" height="40px" width="40px" alt="">
          @endif 
          <div class="media-body">
              <span>
                @if (isset(Auth::user()->profile))
                     {{ Auth::user()->profile->first_name }} {{ Auth::user()->profile->last_name }}
                @else
                     Utilisateur
                @endif     

              </span>
            <p class="mb-0 font-roboto">{{ Auth::user()->role->name }} <i class="middle fa fa-angle-down"></i></p>
          </div>
        </div>
        <ul class="profile-dropdown onhover-show-div" style="width: 170px">
          <li><a href="{{ route('profile.client.index') }}"><i data-feather="user"></i><span>Profile </span></a></li>
          {{-- <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
          <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
          <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li> --}}
          <li><a href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>Déconnexion</span></a></li>
        </ul>
      </li>
    </ul>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://js.pusher.com/3.1/pusher.min.js"></script>

  <script type="text/javascript">
      var notificationsWrapper   = $('.notifications_dropdown');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('li.drop');

      /* if (notificationsCount <= 0) {
          notificationsWrapper.hide();
      } */

      var pusher = new Pusher('8d4e2e77d549bf74d7e2', {
          encrypted: true,
          cluster: "eu"
      });

      
      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('Course_Delivery');

      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\course\\CourseEvent', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        
        var newNotificationHtml = `
            
        `;
        console.log(data.data["message"]);
        console.log(newNotificationHtml);
        notifications.html(newNotificationHtml + existingNotifications);
        console.log(notifications.html(newNotificationHtml + existingNotifications));
          notificationsCount += 1;
          notificationsCountElem.attr('data-count', notificationsCount);
          notificationsWrapper.find('.notif-count').text(notificationsCount);
          notificationsWrapper.show();
          playAudio();
          // alert(data.message);
      });
      function playAudio() {
        var x = new Audio('/sms.mp3');
        // Show loading animation.
        var playPromise = x.play();
        if (playPromise !== undefined) {
            playPromise.then(_ => {
                    x.play();
                })
                .catch(error => {
                });
        }
      }
  </script>
  <script class="result-template" type="text/x-handlebars-template">
    <div class="ProfileCard u-cf">                        
    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
    <div class="ProfileCard-details">
    {{-- <div class="ProfileCard-realName">{{name}}</div> --}}
    </div>
    </div>
  </script>
  <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>

  @section('scripts')
  {{--   <script type="text/javascript">

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

    </script> --}}
  @endsection
</div>