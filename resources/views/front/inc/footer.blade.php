<div id="footer-wrapper" class="footer-dark">
    <footer id="footer">
        <div class="container">
            <div class="row">
                <ul class="col-md-3 col-sm-6 footer-widget-container clearfix">
                    <!-- .widget.widget_text -->
                    <li class="widget widget_newsletterwidget">
                        <div class="title">
                            <h3>Boletín</h3>
                        </div>

                        <p>
                            Suscríbete a nuestro boletín y entérate de
                            nuestras promociones y nuestros últimos proyectos.
                        </p>

                        <br />

                        <form action="{{ route('suscribers.store') }}" method="post" id="newsletter_form" class="newsletter">
                            <input class="email" type="email" name="email" placeholder="Tu correo electrónico...">
                            <button type="submit" class="submit"></button>
                        </form>
                        <div id="thanks_suscriber" style="display: none">
                            ¡Gracias por suscribirte!
                        </div>
                    </li><!-- .widget.widget_newsletterwidget end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <!-- .widget-pages start -->
                    <li class="widget widget_pages">
                        <div class="title">
                            <h3>Enlaces de interés </h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('aboutus') }}">Sobre nosotros</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contacto</a></li>
                        </ul>
                    </li><!-- .widget-pages end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <!-- .widget-pages start -->
                    <li class="widget widget_pages">
                        <div class="title">
                            <h3>Nuestros servicios</h3>
                        </div>

                        <ul>
                            <li>Transporte de carga pesada</li>
                            <li>Transporte de carga ligera</li>
                            <li>Transporte de carga refrigerada</li>
                            <li>Transporte de carga express</li>
                            <li>Servicios especiales</li>
                        </ul>
                    </li><!-- .widget-pages end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <li class="widget widget-text">
                        <div class="title">
                            <h3>Contáctanos</h3>
                        </div>

                        {{-- <address>
                            Mza. K Lote. 7 A.H. Nueva Gales, <br> Cieneguilla, Lima, Perú
                        </address> --}}

                        <a target="_blank" href="https://api.whatsapp.com/send?phone=51921571418">
                            <i class="fab fa-whatsapp"></i> +51 921571418
                         </a>
                        <br />

                        <a href="mailto:ventas@roquetransport.com.pe"><i class="fa fa-envelope"></i> ventas@roquetransport.com.pe</a>
                        <br />
                        <ul class="footer-social-icons">
                            <li><a href="#!" class="fab fa-facebook-f"></a></li>
                        </ul><!-- .footer-social-icons end -->
                    </li><!-- .widget.widget-text end -->
                </ul><!-- .col-md-3.footer-widget-container end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </footer><!-- #footer end -->

    <div class="copyright-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>© {{ date('Y') }} {{ config('app.name') }}.</p>
                </div><!-- .col-md-6 end -->

                <div class="col-md-6">
                    <p class="align-right">TODOS LOS DERECHOS RESERVADOS</p>
                </div><!-- .col-md-6 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .copyright-container end -->

    <a href="#" class="scroll-up">Scroll</a>
</div><!-- #footer-wrapper end -->
