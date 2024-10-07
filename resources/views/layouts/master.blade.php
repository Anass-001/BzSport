<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title -->
    <title>Bz Sport</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/img/LogoBzBl-removebg-preview.png') }}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ url('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ url('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">








</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ url('/assets/img/logoBz.png') }}  " alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="{{ route('products.man.AllProducts') }}">Men</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('products.man.AllProducts') }}">All Products</a></li>
                                        <li><a href="{{ route('products.man.tshirts-tops') }}">T-shirts & Tops</a></li>
                                        <li><a href="{{ route('products.man.pants') }}">Pants</a></li>
                                        <li><a href="{{ route('products.man.hoodies') }}">Hoodies </a></li>
                                        <li><a href="{{ route('products.man.shorts') }}">Shorts </a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('products.women.all-products') }}">Women</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('products.women.all-products') }}">All Products</a></li>
                                        <li><a href="{{ route('products.women.tshirts-tops') }}">T-shirts & Tops</a>
                                        </li>
                                        <li><a href="{{ route('products.women.bras') }}">Sport Bras</a></li>
                                        <li> <a href="{{ route('products.women.leggings') }}">leggings</a></li>
                                        <li><a href="{{ route('products.women.pants') }}">Pants</a></li>
                                        <li><a href="{{ route('products.women.hoodies') }}">Hoodies </a></li>
                                        <li><a href="{{ route('products.women.shorts') }}">Shorts </a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('products.new.All-Products') }}">New</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('products.new.for-men') }}">New for men</a></li>
                                        <li><a href="{{ route('products.new.for-women') }}">New For Women</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('products.sale.All-Products') }}">Sale</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('products.sale.for-men') }}">Sale for Men </a></li>
                                        <li><a href="{{ route('products.sale.for-women') }}">Sale For Women</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="{{ route('cart.index') }}"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <form action="{{ route('products.search') }}" method="GET">
                                <input type="text" name="query" placeholder="Keywords">
                                <button type="submit">Search <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>All we care about is helping you look great, both inside and outside the gym.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Stay in Touch</h2>
                        <ul>
                            <li>Address</li>
                            <li>Casablanca Sidi Moumen Jedid GR2 Rue12 N 15</li>
                            <li>+212 706310893</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="{{ route('products.man.AllProducts') }}">Men</a></li>
                            <li><a href="{{ route('products.women.all-products') }}">Women</a></li>
                            <li><a href="{{ route('products.sale.All-Products') }}">Sale</a></li>
                            <li><a href="{{ route('products.new.All-Products') }}">New</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">contact Us</h2>
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2024 - <a href="https://BzSport.ma/">Bz Sport</a>, All Rights
                        Reserved.<br>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="{{ url('assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ url('assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ url('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ url('assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ url('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ url('assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ url('assets/js/main.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>
