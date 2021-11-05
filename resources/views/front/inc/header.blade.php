<div class="header-wrapper header-transparent">
    <!-- .header.header-style01 start -->
    <header id="header" class="header-style01">
        <!-- .container start -->
        <div class="container">
            <!-- .main-nav start -->
            <div class="main-nav">
                <!-- .row start -->
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-default nav-left" role="navigation">
                            <!-- .navbar-header start -->
                            <div class="navbar-header">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('front/img/roque-logo-h.png') }}"
                                            alt="{{ config('app.name') }}" />
                                    </a>
                                </div><!-- .logo end -->

                                <button type="button" class="navbar-toggle collapsed toggle-mobile-menu hidden-sm hidden-md hidden-lg"
                                    id="btn-burger">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            </div><!-- .navbar-header start -->

                            <div class="hidden-sm hidden-md hidden-lg">
                                <div id="mobile-menu" class="mobile-menuwrapper  ">
                                    <i class="fa fa-3x fa-times white toggle-mobile-menu"></i>
                                    <ul class="mobile-menu-list list-unstyled text-center">
                                        <li><a href="{{ route('home') }}">Inicio</a></li>
                                        <li><a href="{{ route('aboutus') }}">Nosotros</a></li>
                                        <li><a href="{{ route('blog') }}">Blog</a></li>
                                        <li><a href="{{ route('contact') }}">Contacto</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- MAIN NAVIGATION -->
                            <div class="collapse navbar-collapse" id="mymenu">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ route('home') }}"
                                            class="{{ isset($active) && $active == 'home' ? 'active' : '' }}">Inicio</a>
                                    </li>
                                    <li><a href="{{ route('aboutus') }}"
                                            class="{{ isset($active) && $active == 'aboutus' ? 'active' : '' }}">Nosotros</a>
                                    </li>
                                    {{-- <li><a href="{{ route('home') }}">Nuestros servicios</a></li> --}}
                                    <li><a href="{{ route('blog') }}"
                                            class="{{ isset($active) && $active == 'blog' ? 'active' : '' }}">Blog</a>
                                    </li>
                                    <li><a href="{{ route('contact') }}"
                                            class="{{ isset($active) && $active == 'contact' ? 'active' : '' }}">Contacto</a>
                                    </li>
                                </ul><!-- .nav.navbar-nav end -->

                                <a target="_blank" href="https://api.whatsapp.com/send?phone=51961196363">
                                    <div class="wsp"><i class="fab fa-whatsapp"></i></div>
                                </a>

                                <!-- RESPONSIVE MENU -->


                                <!-- #search start -->
                                {{-- <div id="search">
                                    <form action="#" method="get">
                                        <input class="search-submit" type="submit" />
                                        <input id="m_search" autocomplete="off" name="s" type="text"
                                            placeholder="Escribe y pulsa enter..." />
                                    </form>
                                </div> --}}
                                <!-- #search end -->
                            </div><!-- MAIN NAVIGATION END -->
                        </nav><!-- .navbar.navbar-default end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .main-nav end -->
        </div><!-- .container end -->
    </header><!-- .header.header-style01 -->
</div><!-- .header-wrapper.header-transparent end -->
