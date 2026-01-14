
<footer class="site-footer style-1" style="display: block; height: 443px;">
    @if($polling = polling_form('kepuasan'))
<div class="polling container py-5">
    {{$polling}}
</div>
@endif
    <!-- footer top part -->
    <div class="footer-top" style="background-image:url(images/background/bg19.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget_about">
                        <h4 class="footer-title">KONTAK</h4>
                        <div class="widget_getintuch">
                            <ul>
                                <li>
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                    {{ get_option('alamat') }}
                                    Bengkalis, Riau, Indonesia
                                </li>
                                <li>
                                    <i class="fa fa-phone text-primary"></i>
                                    {{ get_option('telepon') }}
                                </li>
                                <li>
                                    <i class="fa fa-fax text-primary"></i>
                                   {{get_option('email')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            @foreach(get_menu('footer') as $menu)
                <div class="col-lg-3 col-md-6 col-sm-6 ">
                    <div class="widget widget_services">
                        <h4 class="footer-title">{{ $menu->name }}</h4>
                        <ul>
                            @foreach($menu->sub ?? [] as $item)
                            <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom" style="border-top:1px dotted #bbb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 text-left">
                    <span class="copyright-text">Copyright © <span class="current-year">2026</span> <a
                            href="/" class="text-primary" target="_blank">{{get_option('nama_organisasi')}}</a> </span>
                </div>
                <div class="col-lg-6 col-md-6 text-right">
                   Dikembangkan oleh TIM IT <a href="https://diskominfotik.bengkaliskab.go.id" class="text-primary" target="_blank">Diskominfotik Kab. Bengkalis</a>
                </div>
            </div>
        </div>
    </div>
</footer>
    <!-- Footer END-->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up style5" ></button>
</div>
<script src="/template/formal/assets/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<!-- JavaScript  files ========================================= -->
<script src="/template/formal/assets/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/template/formal/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/template/formal/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="/template/formal/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="/template/formal/assets/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="/template/formal/assets/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="/template/formal/assets/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="/template/formal/assets/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="/template/formal/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.min.js"></script><!-- Perfect Scrollbar -->
<script src="/template/formal/assets/plugins/masonry/masonry-4.2.2.js"></script><!-- MASONRY -->
<script src="/template/formal/assets/plugins/masonry/isotope.pkgd.min.js"></script><!-- MASONRY -->
<script src="/template/formal/assets/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="/template/formal/assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="/template/formal/assets/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="/template/formal/assets/js/dz.ajax.js"></script><!-- CONTACT JS  -->

<!-- contact-us js -->
<!-- revolution JS FILES -->
<script src="/template/formal/assets/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/template/formal/assets/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script  src="/template/formal/assets/js/rev.slider.js"></script>
<script>
jQuery(document).ready(function() {
	'use strict';
	dz_rev_slider_4();
});	/*ready*/
</script>
</body>
</html>
