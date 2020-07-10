<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title> مكتبة </title>
    <meta name="description" content="قبس - مكتبة إلكترونية">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


@include('site.partials.styles')
<!-- Favicons -->
    {{--<link rel="shortcut icon" href="images/favicon.png">--}}

</head>

<body>

<div class="loader">
    <div class="loader_html"></div>
</div>

<div id="wrap" class="fixed-enabled grid_1200">

    @include('site.partials.header')

    <section class="container main-content">

        <!-- owl-carousel -->
{{--    @include('site.partials.owl-carousel')--}}
    <!-- end owl-carousel -->

        <div class="row" style="padding-top: 30px;">

{{--        @yield('sidebar')--}}

        @yield('content')


        <!-- sidebar -->
{{--        @include('site.partials.sidebar')--}}

        <!-- End sidebar -->
        </div>

    </section><!-- End container -->

    <!-- End footer -->
@include('site.partials.footer')
<!-- End footer -->
</div><!-- End wrap -->

<div class="go-up"><i class="icon-chevron-up"></i></div>

<!-- js -->
@include('site.partials.scripts')
</body>

</html>
