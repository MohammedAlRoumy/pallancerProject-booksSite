@extends('site.app')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="boxedtitle page-title"><h2>{{$book->name}}</h2></div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <img
                        src="{{$book->poster_path}}"
                        style="width: 100%;" alt="...">
                </div>
                <div class="col-md-5">
                    <p>{{$book->description}}</p>
                </div>
                <div class="col-md-4">
                    <h5>
                        المؤلفون :
                        @foreach($book->authors as $author)
                            <a href="{{route('authors.show',$author->id)}}">
                                <snap style="color: #ff7361">{{$author->name}} </snap>@if(!$loop->last), @endif</a>
                        @endforeach
                    </h5>
                    <h5>
                        التصنيف :
                        @foreach($book->categories as $category)
                            <a href="{{route('books.index',['category_name'=>$category->name])}}">
                                <snap style="color: #ff7361">{{$category->name}} </snap>@if(!$loop->last), @endif</a>
                        @endforeach
                    </h5>
                    <h5>تاريخ النشر : {{$book->year}} </h5>
                </div>
            </div>

            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <iframe src="{{url($book->file_path)}}" frameborder="0" width="100%" height="540px"></iframe>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <p>
                    <a class="button color small"
                       style="background-color: green;" href="{{url($book->file_path)}}" target="_blank">
                        <span class="icon-download-alt"></span>تحميل</a>
                    @auth()
                        <a class="button color small add_fav-icon" style="float: left">
                            <span class="{{$book->is_favored ? 'icon-heart':'icon-heart-empty'}} book__fav-icon" ></span>
                        </a>
                    @else
                        <a href="{{route('login')}}" class="button color small add_fav-icon" style="float: left">
                            <span class="icon-heart-empty" ></span>
                        </a>
                    @endauth
                </p>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        @if($related_books->count() > 0)
            <div style="padding-bottom: 20px">
                <hr>
                <div style="margin-top: 20px">
                                 <span style="font-size: 18px; font-weight: bolder;">
                                         كتب ذات علاقة
                                 </span>
                </div>

                <div class="owl-carousel owl-theme" style="padding-top: 10px ; padding-bottom: 50px;">

                    @foreach($related_books as $related_book)
                        <div class="item">
                            <div class="thumbnail">
                                <img
                                    src="{{$related_book->poster_path}}"
                                    alt="...">
                                <div class="caption"
                                     style="background-color: #DDD; padding: 10px; padding-top:20px;">
                                    <h3><a href="{{route('books.show',$book->id)}}">{{$related_book->name}}</a> </h3>

                                    <p>
                                        المؤلف :
                                        @foreach($related_book->authors as $author)
                                            <a href="{{route('authors.show',$author->id)}}">
                                                <snap style="color: #ff7361">{{$author->name}} </snap></a>@if(!$loop->last), @endif
                                        @endforeach
                                    </p>
                                    <p>تاريخ النشر : {{$related_book->year}} </p>
                                    <p>
                                        <a href="{{url($book->file_path)}}" target="_blank" class="button color small signup" style="background-color: green;">
                                                    <span
                                                        class="icon-download-alt"></span>
                                            تحميل </a>
                                        @auth()
                                            <a class="button color small add_fav-icon book__fav-btn" style="float: left">
                                                <span class=" {{$book->is_favored ? 'icon-heart':'icon-heart-empty'}} book__fav-icon book-{{$book->id}}"
                                                      data-book-id="{{$book->id}}"
                                                      data-url="{{route('books.toggle_favorite',$book->id)}}">

                                                </span>
                                            </a>
                                        @else
                                            <a href="{{route('login')}}" class="button color small add_fav-icon" style="float: left">
                                                <span class="icon-heart-empty" ></span>
                                            </a>
                                        @endauth
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{--@endforeach
                @endif--}}
            </div>

        @else
            <div class="col">

            </div>
        @endif
    </div>

@endsection
