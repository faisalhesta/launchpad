<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
            $(".notification-drop .item").on('click',function(e) {
                
                $(this).find('ul').toggle();
                // e.stopPropagation();
            });
            $(document).click(function() {
                // $(".notification-drop .item").find('ul').toggle();
               });
        })
        </script>
        <style>
            body {
        overflow-x: hidden;
        }
        ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.notification-drop {
  font-family: 'Ubuntu', sans-serif;
  color: #444;
}
.notification-drop .item {
  padding: 10px;
  font-size: 18px;
  position: relative;
  border-bottom: 1px solid #ddd;
}
.notification-drop .item:hover {
  cursor: pointer;
}
.notification-drop .item i {
  margin-left: 10px;
}
.notification-drop .item ul {
  display: none;
  position: absolute;
  top: 100%;
  background: #fff;
  left: -200px;
  right: 0;
  z-index: 1;
  border-top: 1px solid #ddd;
}
.notification-drop .item ul li {
  font-size: 16px;
  padding: 15px 0 15px 25px;
}
.notification-drop .item ul li:hover {
  background: #ddd;
  color: rgba(0, 0, 0, 0.8);
}

@media screen and (min-width: 500px) {
  .notification-drop {
    display: flex;
    justify-content: flex-end;
  }
  .notification-drop .item {
    border: none;
  }
}



.notification-bell{
  font-size: 20px;
}

.btn__badge {
  background: #FF5D5D;
  color: white;
  font-size: 12px;
  position: absolute;
  top: 0;
  right: 0px;
  padding:  3px 10px;
  border-radius: 50%;
}

.pulse-button {
  box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.5);
  -webkit-animation: pulse 1.5s infinite;
}

.pulse-button:hover {
  -webkit-animation: none;
}

@-webkit-keyframes pulse {
  0% {
    -moz-transform: scale(0.9);
    -ms-transform: scale(0.9);
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
  }
  70% {
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -webkit-transform: scale(1);
    transform: scale(1);
    box-shadow: 0 0 0 50px rgba(255, 0, 0, 0);
  }
  100% {
    -moz-transform: scale(0.9);
    -ms-transform: scale(0.9);
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
    box-shadow: 0 0 0 0 rgba(255, 0, 0, 0);
  }
}

.notification-text{
  font-size: 14px;
  font-weight: bold;
}

.notification-text span{
  float: right;
}

        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
        width: 15rem;
        }

        #page-content-wrapper {
        min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }

        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Launchpad </div>
        <div class="list-group list-group-flush">
            <a href="{{route('home')}}" class="{{Request::is('home')?'active':''}} list-group-item list-group-item-action">Dashboard</a>
            @if(auth()->user()->is_admin)
            <a href="{{route('teachers.list')}}" class="{{Request::is('teachers/list')?'active':''}} list-group-item list-group-item-action ">Teachers</a>
            <a href="{{route('students.list')}}" class="{{Request::is('students/list')?'active':''}} list-group-item list-group-item-action ">Students</a>
            @endif
        </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                {{-- <li class="nav-item active"> --}}
                {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
                {{-- </li> --}}
                <li class="nav-item active">
                <ul class="notification-drop">
                    <li class="item">
                    <i class="fa fa-bell-o notification-bell" aria-hidden="true"></i> @if(auth()->user()->unreadNotifications->count())<span class="btn__badge pulse-button ">{{auth()->user()->unreadNotifications->count()}}</span> @endif    
                    <ul>
                    @if(auth()->user()->unreadNotifications->count())<li ><a href="{{route('markRead')}}" class="text-success">Mark all as read</a></li>@endif
                    @foreach(auth()->user()->unreadNotifications as $notifiction)
                        <li class="bg-light">{{$notifiction->data['message']}}</li>
                    @endforeach   
                    @foreach(auth()->user()->readNotifications as $notifiction)
                        <li>{{$notifiction->data['message']}}</li>
                    @endforeach                       
                    </ul>
                    </li>
                </ul>
                   
                </li>
                <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    {{-- <a class="dropdown-item" href="#">Action</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                     </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @if(!auth()->user()->is_admin)
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('teachers.home') }}"
                                      >
                                        {{ __('Profile') }}
                     </a>
                     @endif

                    
                    
                    {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                </div>
                </li>
            </ul>
            </div>
        </nav>

        <div class="container-fluid">
            @yield('content')

        </div>
        </div>
        <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </body>
</html>
