<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BzSpoort-AdminErea</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ url('assetsLogin/images/blacklogo.png') }}" />

    <!-- Fonts and icons -->
    <script src="{{ url('assetsDashboard/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assetsDashboard/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('assetsDashboard/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assetsDashboard/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assetsDashboard/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ url('assetsDashboard/css/demo.css') }}" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="{{ route('home') }}" target="-blank" class="logo">
                        <img src="{{ url('assets/img/logobz.png') }}" alt="navbar brand" class="navbar-brand"
                            height="70') " />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <title>subscription-2</title>
                                    <g fill="#9c9c9c">
                                        <path
                                            d="M1.75,9.75c.414,0,.75-.336,.75-.75,0-3.584,2.916-6.5,6.5-6.5,2.144,0,4.131,1.076,5.333,2.802l-1.462-.203c-.404-.052-.789,.23-.846,.641-.057,.41,.23,.789,.641,.846l2.944,.407c.034,.004,.068,.007,.103,.007,.162,0,.321-.053,.453-.152,.158-.12,.263-.298,.29-.496l.407-2.945c.057-.41-.23-.789-.641-.846-.404-.049-.789,.23-.846,.641l-.117,.847c-1.499-1.887-3.792-3.049-6.259-3.049C4.589,1,1,4.589,1,9c0,.414,.336,.75,.75,.75Z"
                                            fill="#9c9c9c"></path>
                                        <path
                                            d="M16.25,8.25c-.414,0-.75,.336-.75,.75,0,3.584-2.916,6.5-6.5,6.5-2.15,0-4.13-1.075-5.331-2.802l1.461,.202c.404,.05,.789-.23,.846-.641s-.23-.789-.641-.846l-2.944-.407c-.194-.025-.396,.025-.556,.145-.158,.12-.263,.298-.29,.496l-.407,2.945c-.057,.41,.23,.789,.641,.846,.034,.004,.069,.007,.104,.007,.368,0,.69-.272,.742-.647l.117-.843c1.497,1.887,3.786,3.046,6.259,3.046,4.411,0,8-3.589,8-8,0-.414-.336-.75-.75-.75Z"
                                            fill="#9c9c9c"></path>
                                        <path
                                            d="M9.038,11.5c-.953,0-1.202-.397-1.32-.786-.121-.396-.536-.619-.937-.499-.396,.121-.619,.54-.499,.936,.291,.955,.983,1.56,1.972,1.765,.012,.404,.339,.729,.746,.729s.736-.327,.746-.732c.529-.121,1.007-.366,1.359-.728,.431-.441,.659-1.022,.645-1.636-.031-1.256-.915-2.048-2.628-2.354-1.152-.206-1.197-.671-1.213-.824-.027-.293,.063-.431,.135-.51,.227-.249,.718-.361,.994-.361,.798,0,1.017,.517,1.089,.686,.162,.382,.605,.56,.982,.399,.382-.162,.561-.602,.398-.983-.336-.793-.961-1.312-1.758-1.507v-.104c0-.414-.336-.75-.75-.75s-.75,.336-.75,.75v.126c-.469,.121-.959,.342-1.316,.735-.4,.441-.579,1.016-.517,1.662,.062,.654,.464,1.804,2.441,2.156,1.269,.227,1.384,.591,1.392,.915,.006,.212-.068,.398-.218,.551-.222,.227-.594,.363-.994,.363Z"
                                            fill="#9c9c9c"></path>
                                    </g>
                                </svg>
                                <p>Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <title>box</title>
                                    <g fill="#9c9c9c">
                                        <path
                                            d="M13.25,5h-3.5v2.75c0,.414-.336,.75-.75,.75s-.75-.336-.75-.75v-2.75h-3.5c-1.517,0-2.75,1.233-2.75,2.75v5.5c0,1.517,1.233,2.75,2.75,2.75H13.25c1.517,0,2.75-1.233,2.75-2.75V7.75c0-1.517-1.233-2.75-2.75-2.75ZM7.25,13.5h-2c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75h2c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75Z"
                                            fill="#9c9c9c"></path>
                                        <path
                                            d="M8.25,1.5h-2.009c-1.052,0-1.996,.586-2.464,1.529l-.348,.703c.418-.138,.857-.231,1.321-.231h3.5V1.5Z"
                                            fill="#9c9c9c"></path>
                                        <path
                                            d="M14.223,3.028c-.468-.942-1.412-1.528-2.464-1.528h-2.009V3.5h3.5c.464,0,.903,.093,1.322,.231l-.348-.703Z"
                                            fill="#9c9c9c"></path>
                                    </g>
                                </svg>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.clients.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <title>users</title>
                                    <g fill="#9c9c9c">
                                        <circle cx="5.75" cy="6.25" r="2.75" fill="#9c9c9c"></circle>
                                        <circle cx="12" cy="3.75" r="2.75" fill="#9c9c9c"></circle>
                                        <path
                                            d="M17.196,11.098c-.811-2.152-2.899-3.598-5.196-3.598-1.417,0-2.752,.553-3.759,1.48,1.854,.709,3.385,2.169,4.109,4.089,.112,.296,.162,.603,.182,.91,1.211-.05,2.409-.26,3.565-.646,.456-.152,.834-.487,1.041-.919,.2-.42,.221-.888,.059-1.316Z"
                                            fill="#9c9c9c"></path>
                                        <path
                                            d="M10.946,13.598c-.811-2.152-2.899-3.598-5.196-3.598S1.365,11.446,.554,13.598c-.162,.429-.141,.896,.059,1.316,.206,.432,.585,.767,1.041,.919,1.325,.442,2.704,.667,4.096,.667s2.771-.225,4.096-.667c.456-.152,.834-.487,1.041-.919,.2-.42,.221-.888,.059-1.316Z"
                                            fill="#9c9c9c"></path>
                                    </g>
                                </svg>
                                <p>Clients</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.tasks.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <title>tasks-2</title>
                                    <g fill="#9c9c9c">
                                        <polyline points="8.247 11.5 9.856 13 13.253 8.5" fill="none"
                                            stroke="#9c9c9c" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"></polyline>
                                        <rect x="5.25" y="5.25" width="11" height="11" rx="2"
                                            ry="2" fill="none" stroke="#9c9c9c" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5"></rect>
                                        <path
                                            d="M2.801,11.998L1.772,5.074c-.162-1.093,.592-2.11,1.684-2.272l6.924-1.029c.933-.139,1.81,.39,2.148,1.228"
                                            fill="none" stroke="#9c9c9c" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5"></path>
                                    </g>
                                </svg>
                                <p>Task to do</p>
                            </a>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <title>gear-2</title>
                                    <g fill="#9c9c9c">
                                        <path
                                            d="M14.5,8.25h-5.067L6.899,3.862c-.207-.359-.667-.481-1.024-.274-.359,.207-.481,.666-.274,1.024l2.534,4.388-2.534,4.389c-.207,.359-.084,.817,.274,1.024,.118,.068,.247,.101,.375,.101,.259,0,.511-.134,.65-.375l2.534-4.389h5.067c.414,0,.75-.336,.75-.75s-.336-.75-.75-.75Z"
                                            fill="#9c9c9c"></path>
                                        <path
                                            d="M16.25,8.25h-1.049c-.072-.597-.225-1.169-.453-1.702l.906-.523c.359-.207,.481-.666,.274-1.024-.207-.359-.666-.481-1.024-.274l-.913,.527c-.354-.471-.773-.889-1.243-1.243l.527-.914c.207-.359,.084-.817-.274-1.024-.358-.208-.817-.085-1.024,.274l-.523,.906c-.533-.229-1.105-.381-1.702-.453V1.75c0-.414-.336-.75-.75-.75s-.75,.336-.75,.75v1.049c-.597,.072-1.169,.225-1.702,.453l-.523-.906c-.208-.359-.667-.482-1.024-.274-.359,.207-.481,.666-.274,1.024l.527,.914c-.471,.354-.889,.772-1.243,1.243l-.913-.527c-.357-.207-.817-.085-1.024,.274-.207,.359-.084,.817,.274,1.024l.906,.523c-.228,.533-.381,1.105-.453,1.702H1.75c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h1.049c.072,.597,.225,1.169,.453,1.702l-.906,.523c-.359,.207-.481,.666-.274,1.024,.139,.241,.391,.375,.65,.375,.127,0,.256-.032,.375-.101l.913-.527c.354,.471,.773,.889,1.243,1.243l-.527,.914c-.207,.359-.084,.817,.274,1.024,.118,.068,.247,.101,.375,.101,.259,0,.511-.134,.65-.375l.523-.906c.533,.229,1.105,.381,1.702,.453v1.049c0,.414,.336,.75,.75,.75s.75-.336,.75-.75v-1.049c.597-.072,1.169-.225,1.702-.453l.523,.906c.139,.241,.391,.375,.65,.375,.127,0,.256-.032,.375-.101,.359-.207,.481-.666,.274-1.024l-.527-.914c.471-.354,.889-.772,1.243-1.243l.913,.527c.118,.068,.247,.101,.375,.101,.259,0,.511-.134,.65-.375,.207-.359,.084-.817-.274-1.024l-.906-.523c.228-.533,.381-1.105,.453-1.702h1.049c.414,0,.75-.336,.75-.75s-.336-.75-.75-.75Zm-7.25,5.5c-2.619,0-4.75-2.131-4.75-4.75s2.131-4.75,4.75-4.75,4.75,2.131,4.75,4.75-2.131,4.75-4.75,4.75Z"
                                            fill="#9c9c9c"></path>
                                    </g>
                                </svg>
                                <p>settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <title>arrow-door-out-3</title>
                                    <g fill="#9c9c9c">
                                        <path
                                            d="M11.75,11.5c-.414,0-.75,.336-.75,.75v2.5c0,.138-.112,.25-.25,.25H5.448l1.725-1.069c.518-.322,.827-.878,.827-1.487V5.557c0-.609-.31-1.166-.827-1.487l-1.725-1.069h5.302c.138,0,.25,.112,.25,.25v2.5c0,.414,.336,.75,.75,.75s.75-.336,.75-.75V3.25c0-.965-.785-1.75-1.75-1.75H4.25c-.965,0-1.75,.785-1.75,1.75V14.75c0,.965,.785,1.75,1.75,1.75h6.5c.965,0,1.75-.785,1.75-1.75v-2.5c0-.414-.336-.75-.75-.75Z"
                                            fill="#9c9c9c"></path>
                                        <path
                                            d="M17.78,8.47l-2.75-2.75c-.293-.293-.768-.293-1.061,0s-.293,.768,0,1.061l1.47,1.47h-4.189c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h4.189l-1.47,1.47c-.293,.293-.293,.768,0,1.061,.146,.146,.338,.22,.53,.22s.384-.073,.53-.22l2.75-2.75c.293-.293,.293-.768,0-1.061Z"
                                            fill="#9c9c9c"></path>
                                    </g>
                                </svg>
                                <p>Logout</p>
                            </a>
                        </li>

                        <!-- Formulaire caché pour la déconnexion -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>






                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{ url('assetsDashboard/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                    aria-labelledby="messageDropdown">
                                    <li>
                                        <div class="dropdown-title d-flex justify-content-between align-items-center">
                                            Messages
                                            <a href="#" class="small">Mark all as read</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="{{ url('assetsDashboard/img/jm_denis.jpg') }}"
                                                            alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jimmy Denis</span>
                                                        <span class="block"> How are you ? </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">

                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-icon notif-primary">
                                                        <i class="fa fa-user-plus"></i>
                                                    </div>

                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-danger">
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> Farrah liked Admin </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all notifications<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item topbar-user dropdown hidden-caret">

                                @if (Auth::guard('admin')->user()->profile_photo)
                                    <img src="{{ url('storage/' . Auth::guard('admin')->user()->profile_photo) }}"
                                        alt="Profile Photo" width="50" class="rounded-circle">
                                @endif

                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>
            <!--footer-->
            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}" target="-blank">
                                    BzSport
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </footer>
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{ url('assetsDashboard/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ url('assetsDashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ url('assetsDashboard/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ url('assetsDashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ url('assetsDashboard/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ url('assetsDashboard/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ url('assetsDashboard/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ url('assetsDashboard/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ url('assetsDashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ url('assetsDashboard/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ url('assetsDashboard/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ url('assetsDashboard/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ url('assetsDashboard/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ url('assetsDashboard/js/setting-demo.js') }}"></script>

</body>

</html>
