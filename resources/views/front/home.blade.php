@extends('layouts.web')

@section('styles')
<style>
    #client-carousel .owl-item img {
        filter: grayscale(1)
    }

    .parallax02 {
        background-image: url("{{ asset('img/parallax.jpg') }}")
    }

    .owl-carousel .owl-item {
        display: flex;
        justify-content: center
    }

    .ms-skin-default .ms-bullet {
        background-color: var(--gray) !important;
        background: none;
        border-radius: 50%;
    }

    .ms-skin-default .ms-bullet-selected {
        background-color: var(--blue) !important;
    }

    .ms-slide h4 {
        left: 50% !important;
        transform: translateX(-50%);
        bottom: 150px;
        /* bottom: 50% !important; */
    }

    .ms-layer.line {
        left: 50% !important;
        transform: translateX(-50%);
        /* bottom: calc(50% + 10px) !important; */
        bottom: 160px;
        background-color: var(--gray);
        height: 3px;
        width: 30px;
    }

    .ms-layer.pi-button {
        cursor: pointer;
        left: 50% !important;
        /* bottom: calc(50% - 50px) !important; */
        bottom: 100px;
        transform: translateX(-50%);
        /* border-color: var(--gray); */
    }

    .service-feature-box .service-media img {
        transition: all .2s ease-in-out 0s;
        -webkit-transition: all .2s ease-in-out 0s;
        -moz-transition: all .2s ease-in-out 0s;
        -o-transition: all .2s ease-in-out 0s;
    }

    .service-feature-box .service-media:hover img {
        opacity: 1;
        transform: scale(1.05);
        -webkit-transform: scale(1.05);
        -moz-transform: scale(1.05);
        -ms-transform: scale(1.05);
    }
    .service-feature-box p{
        text-align: justify;
    }

    .pi-latest-posts li .post-media {
        position: relative;
    }

    .pi-latest-posts li .post-media img {
        position: absolute;
        height: 100%;
        max-width: inherit;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
    }
    .h1_custom{
        line-height: 22px!important;
        font-size: 13px!important;
        font-weight: 400;
        padding-bottom: 15px;
    }

    @media (max-width: 767px) {
        .statement p {
            font-size: 16px
        }
        #clients_section{
            margin-bottom: 30px;
        }
    }
</style>
@endsection

@section('content')


<!-- .master-slider start -->
<div id="masterslider" class="master-slider ms-skin-default">

    <!-- slide start -->
    <div class="ms-slide">
        <img src="{{ asset('front/masterslider/blank.gif') }}" data-src="{{ asset('img/slider/carga-pesada.jpg') }}"
            alt="Carga pesada" />

        <h4 class="ms-layer pi-caption02" data-type="text" data-delay="100">
            Carga pesada
        </h4>

        <div class="ms-layer line" data-type="text" data-delay="200"></div>

        <div class="ms-layer pi-button gotoservices" data-type="text" data-delay="300">
            ver más
        </div>
    </div><!-- slide end -->

    <!-- slide start -->
    <div class="ms-slide">
        <img src="{{ asset('front/masterslider/blank.gif') }}" data-src="{{ asset('img/slider/fria2.jpg') }}"
            alt="Carga refrigerada" />

        <h4 class="ms-layer pi-caption02" data-type="text" data-delay="100">
            Carga refrigerada
        </h4>

        <div class="ms-layer line" data-type="text" data-delay="200"></div>

        <div class="ms-layer pi-button gotoservices" data-type="text" data-delay="300">
            ver más
        </div>
    </div><!-- slide end -->

    <!-- slide start -->
    <div class="ms-slide">
        <img src="{{ asset('front/masterslider/blank.gif') }}" data-src="{{ asset('img/slider/carga-ligera.jpg') }}"
            alt="Carga ligera" />

        <h4 class="ms-layer pi-caption02" data-type="text" data-delay="100">
            Carga ligera
        </h4>

        <div class="ms-layer line" data-type="text" data-delay="200"></div>

        <div class="ms-layer pi-button gotoservices" data-type="text" data-delay="300">
            ver más
        </div>
    </div><!-- slide end -->

    <!-- slide start -->
    <div class="ms-slide">
        <img src="{{ asset('front/masterslider/blank.gif') }}" data-src="{{ asset('img/slider/almacen.jpg') }}"
            alt="Servicios especiales" />

        <h4 class="ms-layer pi-caption02" data-type="text" data-delay="100">
            Servicios especiales
        </h4>

        <div class="ms-layer line" data-type="text" data-delay="200"></div>

        <div class="ms-layer pi-button gotoservices" data-type="text" data-delay="300">
            ver más
        </div>
    </div><!-- slide end -->

    <!-- slide start -->
    <div class="ms-slide">
        <img src="{{ asset('front/masterslider/blank.gif') }}" data-src="{{ asset('img/slider/express-black.jpg') }}"
            alt="Carga express" />

        <h4 class="ms-layer pi-caption02" data-type="text" data-delay="100">
            Carga express
        </h4>

        <div class="ms-layer line" data-type="text" data-delay="200"></div>

        <div class="ms-layer pi-button gotoservices" data-type="text" data-delay="300">
            ver más
        </div>
    </div><!-- slide end -->


</div><!-- .master-slider end -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 clearfix">
                <div class="custom-heading">
                    <h2>¡Bienvenido!</h2>
                </div>

                <p class="text-big">
                    Somos Roque Transport, una empresa <strong>4PL</strong> 100% peruana dedicada a brindar soluciones
                    de
                    logística
                    que opera en todo el Perú.
                </p>

                <p>
                    Contamos con una amplia y moderna flota, todos ellos equipados
                    con modernos equipos de comunicación, el mismo que nos permite tener un mejor control de nuestras
                    unidades, efectuando un seguimiento optimo de cada una de ellas al instante, en beneficio de la
                    información oportuna que nuestros clientes se merecen.
                </p>

                <a href="{{ route('aboutus') }}" class="read-more">
                    <span>
                        Ver más
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </a>
            </div><!-- .col-md-6 end -->

            <div class="col-md-6">
                <div class="custom-heading">
                    <h3>cotiza aquí</h3>
                </div>

                <form id="quotation_form" action="{{ route('leads.store') }}" class="wpcf7 shipping-quote clearfix">
                    <fieldset>
                        <label>Origen:</label>
                        <input type="text" maxlength="255" name="origin" class="wpcf7-text">
                    </fieldset>

                    <fieldset>
                        <label>Destino:</label>
                        <input type="text" maxlength="255" name="destination" class="wpcf7-text">
                    </fieldset>

                    <fieldset>
                        <label>Peso aprox (en kg):</label>
                        <input type="text" maxlength="10" name="weight" class="wpcf7-text">
                    </fieldset>

                    <fieldset>
                        <label>Nombre completo:</label>
                        <input type="text" maxlength="100" name="name" class="wpcf7-text">
                    </fieldset>

                    <fieldset>
                        <label>Teléfono:</label>
                        <input type="text" maxlength="9" name="phone" class="wpcf7-text">
                    </fieldset>

                    <fieldset>
                        <label>Tu correo electrónico:</label>
                        <input type="email" maxlength="100" name="email" class="wpcf7-text">
                    </fieldset>
                    <input type="hidden" name="topic" value="Quiero una cotización">
                    <input type="hidden" name="page" value="Inicio">

                    <button type="submit" class="submit send_lead">Obtener una cotización</button>
                </form>
                <div id="thanks" class="align-center" style="display: none">
                    Hemos recibido tu solicitud de cotizacón. <br>En breves momentos nos pondremos en contacto contigo.
                </div>
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<div id="services_section" class="page-content">
    <div class="container">
        <div class="row">
            <div class="custom-heading02">
                <h2>Nuestros servicios</h2>
                <h1 class="h1_custom text-center">
                    TRANSPORTE DE CARGA Y LOGÍSTICA INTEGRAL
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 clearfix">
                <div class="carousel-container">
                    <div id="services-carousel" class="owl-carousel owl-dot">
                        <div class="owl-item">
                            <div class="service-feature-box">
                                <div class="service-media">
                                    <img src="{{ asset('img/servicios/carga.jpg') }}" alt="Trucking" />
                                </div>

                                <div class="service-body">
                                    <div class="custom-heading">
                                        <h4>CARGA PESADA</h4>
                                    </div>

                                    <p>
                                        Brindamos servicio de carga pesada de acuerdo a las necesidades de nuestros
                                        clientes.
                                        Contamos con una moderna y amplia flota de plataformas, semi-trailers y cama
                                        bajas, con
                                        cobertura local y nacional, todas monitoreadas por GPS.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="owl-item">
                            <div class="service-feature-box">
                                <div class="service-media">
                                    <img src="{{ asset('img/servicios/ligera.jpg') }}" alt="Trucking" />
                                </div>

                                <div class="service-body">
                                    <div class="custom-heading">
                                        <h4>Carga ligera</h4>
                                    </div>

                                    <p>
                                        Llevamos productos de diversos tipos como
                                        retail, consumo masivo, alimentos no perecibles, repuestos, etc. Contamos con
                                        unidades furgones de 1.5 a 15 toneladas y un personal de reparto, estiba y
                                        desestiba calificado.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="owl-item">
                            <div class="service-feature-box">
                                <div class="service-media">
                                    <img src="{{ asset('img/servicios/frost.jpg') }}" alt="Trucking" />
                                </div>

                                <div class="service-body">
                                    <div class="custom-heading">
                                        <h4>CARGA REFRIGERADA</h4>
                                    </div>

                                    <p>
                                        Servicio de logística y transporte de productos a temperatura controlada, que
                                        responde a las
                                        necesidades de los sectores farmacéutico y sanitario, manteniendo los estándares
                                        de calidad y aportando una elevada
                                        CAPILARIDAD.

                                        {{-- Realizamos traslados de sus productos en condiciones óptimas de refrigeración a
                                        nivel local y nacional, desde su almacén principal a diferentes puntos en buenas
                                        condiciones de higiene y temperatura. --}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="owl-item">
                            <div class="service-feature-box">
                                <div class="service-media">
                                    <img src="{{ asset('img/servicios/express.jpg') }}" alt="Trucking" />
                                </div>

                                <div class="service-body">
                                    <div class="custom-heading">
                                        <h4>CARGA EXPRESS</h4>
                                    </div>

                                    <p>
                                        Les ofrecemos un servicio de transporte rápido y exclusivo para empresas,
                                        industrias y
                                        público que lo requiera en Lima y en todo el territorio
                                        nacional, asegurando siempre eficiencia y seguridad para nuestros clientes.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="owl-item">
                            <div class="service-feature-box">
                                <div class="service-media">
                                    <img src="{{ asset('img/servicios/especiales.jpg') }}" alt="Trucking" />
                                </div>

                                <div class="service-body">
                                    <div class="custom-heading">
                                        <h4>SERVICIOS ESPECIALES</h4>
                                    </div>

                                    <p>
                                        Ofrecemos los siguientes servicios:
                                        picking, crossdocking, preparación de pedidos/despachos,
                                        despachos de frecuencia fija,
                                        recepción por cuenta de clientes,
                                        retiro de devoluciones,
                                        contrareembolsos y
                                        transporte a local propio.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div><!-- #services-carousel end -->
                </div><!-- .carousel-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="{{ count($posts) ? 'col-md-8 col-sm-6' : 'col-md-12' }}">
                <div class="custom-heading">
                    <h2>PORQUE NOS IMPORTA TU SALUD</h2>
                </div>

                <img src="{{ asset('img/covid.jpg') }}" class="float-right" alt="" />
                <p>En Roque Transport implementamos el protocolo sanitario para prevenir el
                    COVID-19 y así velar por la seguridad y salud de nuestros colaboradores y clientes.</p>
                <ul class="fa-ul">
                    <li><i class="fa fa-li fa-check"></i> Uso de mascarillas obligatorio</li>
                    <li><i class="fa fa-li fa-check"></i> Constante lavado y desinfección de manos usando jabón y
                        desinfectante en gel por no menos de 20 segundos.</li>
                    <li><i class="fa fa-li fa-check"></i> Distanciamiento mínimo de 1 metro con las demás personas</li>
                    <li><i class="fa fa-li fa-check"></i> Desinfección de vehículos (incluye cabina del chofer interior
                        y exterior, llantas y superficies como manecillas, volante, panel de control, botones, etc) por
                        cada viaje.
                    </li>
                    <li><i class="fa fa-li fa-check"></i> Desinfección de objetos de uso común y áreas/superficies.</li>
                    <li><i class="fa fa-li fa-check"></i> Ventilación adecuada en las unidades</li>
                    <li><i class="fa fa-li fa-check"></i> Control de temperatura a todos nuestro personal</li>
                </ul>
            </div>

            @if(count($posts))
            {{-- posts del blog start --}}
            <div class="col-md-4 col-sm-6">
                <div class="custom-heading">
                    <h3>últimos artículos</h3>
                </div>

                <ul class="pi-latest-posts clearfix">
                    @foreach ($posts as $post)
                    <li>
                        <div class="post-media">
                            <img src="{{ asset($post->image ? $post->image->get_route() : 'img/servicios/frio.jpg') }}"
                                alt="{{ $post->image ? $post->image->alt : 'camion' }}" />
                        </div>

                        <div class="post-details">
                            <div class="post-date">
                                <p>
                                    <i class="fa fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($post->published_at)->isoFormat('DD MMMM, YYYY')  }}
                                </p>
                            </div>

                            <a href="{{ route('posts.read', $post->slug) }}">
                                <h4>
                                    {{ $post->title }}
                                </h4>
                            </a>

                            <a href="{{ route('posts.read', $post->slug) }}" class="read-more">
                                <span>
                                    leer más
                                    <i class="fa fa-chevron-right"></i>
                                </span>
                            </a>
                        </div>
                    </li>
                    @endforeach

                </ul><!-- .pi-latest-posts end -->
            </div>
            {{-- posts del blog end --}}
            @endif


        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<div class="page-content parallax parallax02 mb-70 dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-heading02 simple">
                    <h2>Nuestro compromiso</h2>
                </div><!-- .custom-heading02 end -->

                <div class="statement">
                    <p>
                        Prometemos cuidar todo el manejo de la cadena de suministro, para hacer tus envíos los más
                        seguros, rápidos y a
                        tiempo.
                    </p>
                </div>
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<div id="clients_section" class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-heading02 simple">
                    <h2>Ellos confían en nosotros</h2>
                </div><!-- .custom-heading02 end -->
            </div>
        </div><!-- .row end -->

        <div class="row">
            <div class="col-md-12">
                <div class="carousel-container">
                    <div id="client-carousel" class="owl-carousel owl-carousel-navigation">
                        <div class="owl-item"><img src="{{ asset('img/clientes/onpe.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/sodimac.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/minedu.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/qualityproducts.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/saga.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/celima.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/aceros-arequipa.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/tpp.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/mur.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/supermercados-peruanos.png') }}"
                                alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/tottus.png') }}" alt="" /></div>
                        <div class="owl-item"><img src="{{ asset('img/clientes/ransa.png') }}" alt="" /></div>
                    </div><!-- .owl-carousel.owl-carousel-navigation end -->
                </div><!-- .carousel-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection


@section('scripts')

<script>
            jQuery(document).ready(function ($) {
                'use strict';

                $('#client-carousel').owlCarousel({
                    items: 5,
                    loop: true,
                    margin: 30,
                    responsiveClass: true,
                    mouseDrag: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true
                        },
                        600: {
                            items: 3,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true
                        },
                        1000: {
                            items: 5,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            mouseDrag: true
                        }
                    }
                });


                $('#services-carousel').owlCarousel({
                    items: 3,
                    loop: true,
                    margin: 30,
                    responsiveClass: true,
                    mouseDrag: true,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            autoHeight: true
                        },
                        600: {
                            items: 2,
                            nav: false,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            autoHeight: true
                        },
                        1000: {
                            items: 3,
                            nav: false,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            mouseDrag: true,
                            autoHeight: true
                        }
                    }
                });


                // MASTER SLIDER START
                var slider = new MasterSlider();
                slider.control('bullets', {autohide: false, align: 'bottom', margin: 40});

                slider.setup('masterslider', {
                    width: 480,
                    height: 800,
                    autoplay: true,
                    layout: 'partialview',
                    space: 2,
                    view: 'basic',
                    loop: true,
                    speed: 40
                });

                $(".gotoservices").click(function (e) {
                    var fixoffset = $(window).width() < 767 ? 30 : 100
                    var services_top = $("#services_section").offset().top - fixoffset
                    $("html, body").animate({ scrollTop: services_top }, "slow");
                })

            });


</script>

@endsection
