@php
  use App\Models\admin\notifications\NotificationLivreur;

  $notifications = NotificationLivreur::OrderBy('id', 'desc')->where('status', 'non lu')->limit(5)->get();
  $total_notification = NotificationLivreur::all();
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
    <div class="logo-wrapper"><a href="#"><img class="img-fluid" src="{{ asset('assets/images/logo/logo.png')}}" alt=""></a></div>
    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
  </div>
  <div class="left-header col horizontal-wrapper ps-0">
    <ul class="horizontal-menu">
      <li>                         
        <span class="header-search"><i data-feather="search"></i></span>
      </li>
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

          <livewire:MessageLivreurComponent />
          
          <li><a class="btn " style="background-color: #fe9003; color: #ffffff" style="margin-top: 20px;" href="{{ route('messages.livreur.index') }}">Voir tous les messages</a></li>
        </ul>
      </li>
      
      <li>
        <div class="mode"><i class="fa fa-moon-o"></i></div>
      </li>

      <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
      <li class="profile-nav onhover-dropdown p-0 me-0">
        <div class="media profile-media">
          @if (isset(Auth::user()->livreur))
            <img class="b-r-10" src="{{ asset('utilisateurs/images/image_profile/'.Auth::user()->livreur->photo)}}" height="40px" width="40px" alt="">
          @else
            <img class="b-r-10" src="{{ asset('no_profile.png')}}" height="40px" width="40px" alt="">
          @endif
          <div class="media-body">
              <span>
                @if (isset(Auth::user()->livreur))
                     {{ Auth::user()->livreur->first_name }} {{ Auth::user()->livreur->last_name }}
                @else
                     Utilisateur
                @endif     
      
              </span>
            <p class="mb-0 font-roboto">{{ Auth::user()->role->name }} <i class="middle fa fa-angle-down"></i></p>
          </div>
        </div>
        <ul class="profile-dropdown onhover-show-div" style="width: 170px">
          <li><a href="{{ route('profile.livreur.index') }}"><i data-feather="user"></i><span>Profile </span></a></li>
          {{-- <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
          <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
          <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li> --}}
          <li><a href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>Deconnexion</span></a></li>
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
    channel.bind('App\\Events\\NotificationEventLivreur', function(data) {
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
</div>