@extends('site.app')
@section('content')
    <div class="col-md-12">
        <div id="icons" class="row">
            <div class="col-md-12">
                <div class="boxedtitle page-title"><h2>التصنيفات</h2></div>
            </div>
            @foreach($categories as $category)
            <div class="col-md-4"  style="margin-bottom: 10px;">
                <div class="page-content page-shortcode">
                    <div class="box_icon">
                        <div class="t_center">
                            <a href="{{route('books.index',['category_name'=>$category->name])}}"><h3> {{$category->name}}</h3></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
