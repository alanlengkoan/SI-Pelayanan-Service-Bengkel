<script type="text/javascript" src="../assets/landing_page/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/js/mega_menu.js"></script>
<script type="text/javascript" src="../assets/landing_page/js/jquery.appear.js"></script>
<script type="text/javascript" src="../assets/landing_page/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/jquery.tools.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/jquery.revolution.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/vendor/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="../assets/landing_page/js/custom.js"></script>
<script type="text/javascript">
    (function(b) {
        var a = jQuery;
        var c;
        a(document).ready(function() {
            if (a("#rev_slider_2_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_2_1")
            } else {
                c = a("#rev_slider_2_1").show().revolution({
                    sliderType: "standard",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            style: "hermes",
                            hide_onleave: false,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 50,
                            space: 10,
                            tmp: ""
                        }
                    },
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: 1570,
                    gridheight: 1000,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "spinner3",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                })
            }
        })
    })(jQuery);
</script>