@extends('layouts.web')

@section('styles')
<style>
    .pt-bkg08 {
        background-image: url("{{ asset('img/contact.jpg') }}")
    }

    #wsp_email {
        display: flex;
        justify-content: space-between;
    }

    #msform {
        margin-top: 20px
    }

    @media (max-width: 767px) {
        #wsp_email {
            flex-direction: column
        }
    }
</style>
@endsection

@section('page_title','Contacto | Roque Transport')
@section('page_description', 'Pónganse en contacto con nosotros')

@section('content')
<!-- .page-title start -->
<div class="page-title-style01 page-title-negative-top pt-bkg08">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contáctanos</h1>

                <div class="breadcrumb-container">
                    <ul class="breadcrumb clearfix">
                        <li>Estás aquí:</li>
                        <li>
                            <a href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li>
                            Contacto
                        </li>
                    </ul><!-- .breadcrumb end -->
                </div><!-- .breadcrumb-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-title-style01.page-title-negative-top end -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="custom-heading">
                    <h3>Hablemos</h3>
                </div><!-- .custom-heading.left end -->

                <p class="text-justify">
                    ROQUE TRANSPORT EIRL está comprometido con sus clientes, es por ello que podemos diseñar soluciones
                    de traslado o distribución que mejor se ajuste a su organización. Pónganse en contacto con nosotros.
                </p>

                <div id="wsp_email">

                    <a target="_blank" class="wsp_a" href="https://web.whatsapp.com/send?phone=51954989643">
                        <span class="text-big">
                            <i class="fab fa-whatsapp"></i> +51 954989643
                        </span>
                    </a>

                    <a href="mailto:ventas@roquetransport.com.pe">
                        <span class="text-big">
                            <i class="fa fa-envelope"></i> ventas@roquetransport.com.pe
                        </span>
                    </a>
                </div>

                <!-- .contact form start -->
                <form id="msform" class="wpcf7 clearfix" action="{{ route('leads.store') }}">
                    @csrf
                    <fieldset>
                        <label>
                            <span class="required">*</span> Nombres:
                        </label>

                        <input type="text" class="wpcf7-text" name="name" id="contact-name">
                    </fieldset>

                    <fieldset>
                        <label>
                            <span class="required">*</span> Apellidos:
                        </label>

                        <input type="text" class="wpcf7-text" name="lastname" id="contact-last-name">
                    </fieldset>

                    <fieldset>
                        <label>
                            <span class="required">*</span> Correo electrónico:
                        </label>

                        <input type="email" class="wpcf7-text" name="email" id="contact-email">
                    </fieldset>

                    <fieldset>
                        <label>
                            <span class="required">*</span> Mensaje:
                        </label>

                        <textarea rows="8" name="message" class="wpcf7-textarea" id="contact-message"></textarea>
                    </fieldset>
                    <input type="hidden" name="page" value="Contacto">
                    <button type="submit" class="wpcf7-submit send_lead">Enviar</button>
                </form><!-- .wpcf7 end -->
                <div id="thanks" class="align-center" style="display: none">
                    Gracias por contactarnos. <br>En breves momentos nos pondremos en contacto contigo.
                </div>
            </div>


        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> <!-- google maps -->
<script>
    jQuery(document).ready(function ($) {
        window.marker = null;

        function initialize() {
            var map;

            var nottingham = new google.maps.LatLng(52.934658, -1.131450);

            var style = [
                {"featureType": "road",
                    "elementType":
                            "labels.icon",
                    "stylers": [
                        {"saturation": 1},
                        {"gamma": 1},
                        {"visibility": "on"},
                        {"hue": "#e6ff00"}
                    ]
                },
                {"elementType": "geometry", "stylers": [
                        {"saturation": -85}
                    ]
                }
            ];

            var mapOptions = {
                // SET THE CENTER
                center: nottingham,
                // SET THE MAP STYLE & ZOOM LEVEL
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: 9,
                // SET THE BACKGROUND COLOUR
                backgroundColor: "#eeeeee",
                // REMOVE ALL THE CONTROLS EXCEPT ZOOM
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true,
                scrollwheel: false,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL
                }

            };
            map = new google.maps.Map(document.getElementById('map'), mapOptions);

            // SET THE MAP TYPE
            var mapType = new google.maps.StyledMapType(style, {name: "Grayscale"});
            map.mapTypes.set('grey', mapType);
            map.setMapTypeId('grey');

            //CREATE A CUSTOM PIN ICON
            var marker_image = "{{ asset('front/img/pin.png') }}";
            var pinIcon = new google.maps.MarkerImage(marker_image, null, null, null, new google.maps.Size(21, 34));

            marker = new google.maps.Marker({
                position: nottingham,
                map: map,
                icon: pinIcon,
                title: 'Trucking Headquarters, Nothingham'
            });
        }

        // google.maps.event.addDomListener(window, 'load', initialize);



    });
</script>
@endsection
