{{--@extends('site.app')
@section('sidebar')--}}
<div class="col-md-3 sidebar" style="float:top; ">
    <div class="widget widget_stats">
        <h3 class="widget_title"><a href="{{route('categories')}}">التصنيفات</a></h3>
        <div class="ul_list ul_list-icon-ok">
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{route('books.index',['category_name'=>$category->name])}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="widget widget_stats">
        <h3 class="widget_title"><a href="{{route('authors.index')}}">المؤلفون</a></h3>
        <div class="ul_list ul_list-icon-ok">
            <ul>
                @foreach($authors as $author)
                    <li><a href="{{route('authors.show',$author->id)}}">{{$author->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

</div><!-- End sidebar -->

{{--@endsection--}}
