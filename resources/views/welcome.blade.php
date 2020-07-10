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
    <title> قبس </title>
    <meta name="description" content="">
    <meta name="author" content="vbegy">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    @include('site.partials.owl-carousel')
    <!-- end owl-carousel -->

        <div class="row" style="padding-top: 30px;">


            <div class="col-md-9">

                @if($books->count() > 0)
                    @foreach($books as $book)

                        <div style="padding-bottom: 20px">
                            <hr>
                            <div style="margin-top: 20px">
                                 <span style="font-size: 18px; font-weight: bolder;">
                                     @foreach($book->categories as $category)
                                         {{$category->name}}
                                     @endforeach
                                 </span>
                                <a href="{{route('books.index',['category_name'=>$category->name])}}"
                                   style="float: left; font-weight: bold;">مشاهدة الكل</a>
                            </div>

                            <div class="row" style="padding-top: 40px;">

                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail" style="border: #DDD solid 1px;margin-bottom: 10px;">
                                        <img
                                            src="{{$book->poster_path}}"
                                            style="width: 100%;" alt="...">
                                        <div class="caption" style="padding: 10px; padding-top:20px">
                                            <h3><a href=""></a>{{$book->name}}</h3>
                                            <p>
                                                المؤلف :
                                                @foreach($book->authors as $author)
                                                    <a href="{{route('authors.show',$author->id)}}"><snap style="color: #ff7361">{{$author->name}} </snap> |</a>
                                                @endforeach
                                            </p>
                                            <p>{{Str::limit($book->description, 50)}}</p>
                                            <p>
                                                <a class="button color small " style="background-color: green;">
                                                    <span
                                                        class="icon-download-alt"></span>
                                                    تحميل</a>
                                                @auth()
                                                    <a class="button color small add_fav-icon book__fav-btn"
                                                       style="float: left">
                                                        <span
                                                            class=" {{$book->is_favored ? 'icon-heart':'icon-heart-empty'}}  book__fav-icon book-{{$book->id}}"
                                                            data-book-id="{{$book->id}}"
                                                            data-url="{{route('books.toggle_favorite',$book->id)}}">

                                                        </span>
                                                    </a>
                                                @else
                                                    <a href="{{route('login')}}" class="button color small add_fav-icon"
                                                       style="float: left">
                                                        <span class="icon-heart-empty"></span>
                                                    </a>
                                                @endauth
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>


        {{--            @yield('content')--}}

        <!-- sidebar -->
        @include('site.partials.sidebar')
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
