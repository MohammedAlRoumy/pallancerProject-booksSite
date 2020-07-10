<!-- js -->
<script src={{asset("frontend_files/js/jquery.min.js")}}></script>
<script src={{asset("frontend_files/js/jquery-ui-1.10.3.custom.min.js")}}></script>
<script src={{asset("frontend_files/js/jquery.easing.1.3.min.js")}}></script>
<script src={{asset("frontend_files/js/html5.js")}}></script>
<script src={{asset("frontend_files/js/twitter/jquery.tweet.js")}}></script>
<script src={{asset("frontend_files/js/jflickrfeed.min.js")}}></script>
<script src={{asset("frontend_files/js/jquery.inview.min.js")}}></script>
<script src={{asset("frontend_files/js/jquery.tipsy.js")}}></script>
<script src={{asset("frontend_files/js/tabs.js")}}></script>
<script src={{asset("frontend_files/js/jquery.flexslider.js")}}></script>
<script src={{asset("frontend_files/js/jquery.prettyPhoto.js")}}></script>
<script src={{asset("frontend_files/js/jquery.carouFredSel-6.2.1-packed.js")}}></script>
<script src={{asset("frontend_files/js/jquery.scrollTo.js")}}></script>
<script src={{asset("frontend_files/js/jquery.nav.js")}}></script>
<script src={{asset("frontend_files/js/tags.js")}}></script>
<script src={{asset("frontend_files/js/jquery.bxslider.min.js")}}></script>
<script src={{asset("frontend_files/js/custom.js")}}></script>
<script src={{asset("frontend_files/js/custom-ar.js")}}></script>
<script src={{asset("frontend_files/js/owl.carousel.min.js")}}></script>
<script src="{{asset('js/custom/book.js')}}"></script>

<script>

    $('.owl-carousel').owlCarousel({
      //  stagePadding: 120,
        rtl: true,
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay:true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },

            900: {
                items: 4
            },
            1200:{
                items:4
            },
        }
    })
</script>
<!-- End js -->
