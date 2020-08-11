<div class="owl-carousel owl-theme" style="padding-top: 10px ; padding-bottom: 50px;">
    @if($latest_books->count() > 0)
        @foreach($latest_books as $book)
            <div class="item">
                <div class="thumbnail">
                    <img
                        src="{{$book->poster_path}}"
                        alt="...">
                    <div class="caption" style="background-color: #DDD; padding: 10px; padding-top:20px;">
                        <h3><a href="{{route('books.show',$book->id)}}">{{$book->name}}</a></h3>

                        <p>
                            المؤلف :
                            @foreach($book->authors as $author)
                                <a href="{{route('authors.show',$author->id)}}">
                                    <span style="color: #ff7361">{{$author->name}} </span>
                                </a>@if(!$loop->last), @endif
                            @endforeach
                        </p>
                        <p>
                            التصنيف :
                            @foreach($book->categories as $category)
                                <a href="{{route('books.index',['category_name'=>$category->name])}}">
                                    <span style="color: #ff7361">{{$category->name}} </span>@if(!$loop->last), @endif
                                </a>
                            @endforeach
                        </p>
                        <p>تاريخ النشر : {{$book->year}} </p>
                        <p>
                            <a href="{{url($book->file_path)}}" class="button color small "
                               style="background-color: green;">
                                                    <span
                                                        class="icon-download-alt"></span>
                                تحميل </a>
                            @auth()
                                <a class="button color small add_fav-icon book__fav-btn" style="float: left">
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
        @endforeach

    @else
        <div class="col">

        </div>
    @endif


</div>
