@extends('layouts.web')

@section('styles')
<style>
    .page-title-negative-top {
        background-image: url("{{ asset('img/nosotros.jpg') }}")
    }
</style>
@endsection

@section('page_title','Nosotros | Roque Transport')
@section('page_description','Somos una empresa 4PL creada por un grupo de profesionales con más de 20 años de experiencia en el sector.')

@section('content')
<!-- .page-title start -->
<div class="page-title-style01 page-title-negative-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Roque Transport - Soluciones logísticas</h1>

                <div class="breadcrumb-container">
                    <ul class="breadcrumb clearfix">
                        <li>Estás aquí:</li>

                        <li>
                            <a href="{{ route('home') }}">Inicio</a>
                        </li>

                        <li>
                            <a href="#">Nosotros</a>
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
            <div class="col-md-6">
                <div class="custom-heading">
                    <h2>LA EMPRESA</h2>
                </div><!-- .custom-heading end -->

                <p>
                    Roque Transport es una empresa <strong>4PL</strong> creada por un grupo de profesionales
                    con más de 20 años de experiencia en el sector, cuyo fin es cubrir las necesidades logísticas de
                    nuestros clientes. Para ello disponemos de modernas herramientas empresariales que nos permiten
                    gestionar con éxito nuestro negocio. Contamos con una amplia y moderna flota, equipada
                    con modernos equipos de comunicación los cuales nos permiten tener un mejor control de nuestras
                    unidades, efectuando un seguimiento óptimo de cada una de ellas al instante y en tiempo real, en
                    beneficio de la
                    información oportuna que nuestros clientes se merecen.
                </p>

                <p>
                    Considerando que nuestra razón de
                    ser es <strong>ayudar a nuestros clientes a conseguir sus objetivos</strong>, nos complacería el
                    tener la
                    oportunidad de ayudarlos a alcanzar los mismos.
                </p>
            </div><!-- .col-md-6 end -->

            <div class="col-md-6 animated triggerAnimation" data-animate="zoomIn">
                <img src="{{ asset('img/camiones.jpg') }}" alt="" />
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<div class="page-content custom-bkg bkg-light-blue mb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="custom-heading">
                    <h2>NUESTRA MISIÓN</h2>
                </div><!-- .custom-heading end -->

                <p>
                    Desarrollar y ofrecer soluciones de transporte a lo largo de la cadena de abastecimiento. Roque
                    Transport cuenta con un equipo humano altamente calificado y comprometido, soportado con modernas
                    herramientas tecnológicas, realizando inversiones en equipos e infraestructura y aplicando los
                    diferentes estándares internacionales de Calidad, orientado a la total satisfacción de nuestros
                    clientes.
                </p>
            </div><!-- .col-md-6 end -->

            <div class="col-md-6">
                <div class="custom-heading">
                    <h2>NUESTRA VISIÓN</h2>
                </div><!-- .custom-heading end -->

                <p>
                    Consolidarnos como una empresa que brinda soluciones efectivas en transportes de carga y personal,
                    brindando soluciones en la cadena de abastecimiento, orientado a superar las expectativas de
                    nuestros clientes y colaboradores, contribuyendo al desarrollo de la sociedad y cuidando el medio
                    ambiente.
                </p>
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content.custom-bkg end -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="custom-heading02">
                <h2>Nuestros valores</h2>
                <p>LO QUE NOS HACE DIFERENTES</p>
            </div>
        </div><!-- .row end -->

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="service-icon-center">
                    <div class="icon-container">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Puntualidad y eficiencia</h4>
                    <p>Porque el tiempo es un factor muy importante</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-icon-center">
                    <div class="icon-container">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <h4>Innovación</h4>
                    <p>Constantemente estamos creando nuevas y mejores formas de trabajo</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-icon-center">
                    <div class="icon-container">
                        <i class="fa fa-lock"></i>
                    </div>
                    <h4>Seguridad y calidad</h4>
                    <p>Seguimos los mejores protocoles de seguridad para asegurar la calidad de nuestro servicio</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-icon-center">
                    <div class="icon-container">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Responsabilidad y disciplina</h4>
                    <p>Nos tomamos muy en serio cada envío por más pequeño que sea</p>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-3 col-sm-6">
                <div class="service-icon-center">
                    <div class="icon-container">
                        <i class="fa fa-history"></i>
                    </div>
                    <h4>Amplia experiencia</h4>
                    <p>Nuestros 20 años de trayectoria profesional nos respaldan</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="service-icon-center">
                    <div class="icon-container">
                        <i class="fa fa-smile"></i>
                    </div>
                    <h4>Actitud positiva</h4>
                    <p>Porque trabajar con nuestros clientes es siempre un placer</p>
                </div>
            </div>
        </div><!-- .row end -->


    </div><!-- .container end -->
</div><!-- .page-content end -->

<div class="page-content parallax parallax01 dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="call-to-action clearfix">
                    <div class="text">
                        <h2>Proveendo servicios de logística de primera clase a todo el Perú.</h2>
                        <p>
                            En ROQUE TRANSPORT EIRL estamos convencidos que para brindar servicios de logística de
                            calidad es indispensable difundir y practicar nuestros valores éticos y morales.
                        </p>
                    </div><!-- .text end -->

                    <a href="{{ route('contact') }}" class="btn btn-big">
                        <span>Cotiza aquí</span>
                    </a>
                </div><!-- .call-to-action end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content.parallax end -->

@endsection


@section('scripts')
@endsection
