@extends('site.app')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="boxedtitle page-title"><h2> كتب {{request()->category_name??'مفضلة' }} </h2></div>
            </div>
            @if($books->count() > 0)
                @foreach($books as $book)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail" style="border: #DDD solid 1px;margin-bottom: 10px;">
                            <img
                                src="{{$book->poster_path}}"
                                style="width: 100%; height: 100%" alt="...">
                            <div class="caption" style="padding: 10px; padding-top:20px">
                                <h3><a href="{{route('books.show',$book->id)}}">{{$book->name}}</a></h3>
                                <h4>
                                    @foreach($book->authors as $author)
                                        <a href="{{route('authors.show',$author->id)}}">{{$author->name}}</a>@if(!$loop->last), @endif
                                    @endforeach
                                </h4>
                                <p>{{Str::limit($book->description, 50)}}</p>
                                <p>
                                    <a href="{{url($book->file_path)}}" class="button color small" style="background-color: green;" target="_blank">
                                                    <span
                                                        class="icon-download-alt"></span>
                                        تحميل</a>
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
            @else
                <div class="col">
                    <h5 class="fw-300">Sorry no movies found</h5>
                </div
            @endif
        </div>
    </div>
@endsection
