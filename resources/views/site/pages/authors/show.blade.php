@extends('site.app')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="boxedtitle page-title"><h2>{{$author->name}}</h2></div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <p>{{$author->bio}}</p>
                </div>

                <div class="col-md-3">
                    <img
                        src="{{$author->image_path}}"
                        style="width: 100%;" alt="...">
                </div>

            </div>
            <hr>
            <div style="margin-top: 20px">
                                 <span style="font-size: 18px; font-weight: bolder;">
                                         كتب للمؤلف
                                 </span>
            </div>
            <div class="row">


                @foreach($author->books as $book)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail" style="border: #DDD solid 1px;margin-bottom: 10px;">
                            <img
                                src="{{$book->poster_path}}"
                                style="width: 100%;" alt="...">
                            <div class="caption" style="padding: 10px; padding-top:20px">
                                <h3><a href="{{route('books.show',$book->id)}}">{{$book->name}}</a></h3>

                                <p>
                                    التصنيف :
                                    @foreach($book->categories as $category)
                                        <a href="">
                                            <snap style="color: #ff7361">{{$category->name}} </snap></a>@if(!$loop->last), @endif
                                    @endforeach
                                </p>

                                <p>{{Str::limit($book->description, 50)}}</p>
                                <p>
                                    <a class="button color small signup" style="background-color: green;">
                                                    <span
                                                        class="icon-download-alt"></span>
                                        تحميل</a>
                                    @auth()
                                        <a class="button color small add_fav-icon book__fav-btn" style="float: left">
                                <span
                                    class=" {{$book->is_favored ? 'icon-heart':'icon-heart-empty'}} book__fav-icon book-{{$book->id}}"
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
                @endforeach
            </div>
        </div>
    </div>
@endsection
