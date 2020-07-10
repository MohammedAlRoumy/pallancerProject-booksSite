@extends('site.app')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="boxedtitle page-title"><h2>المؤلفون</h2></div>
            </div>
            @foreach($authors as $author)
                <div class="col-sm-6 col-md-3">
                    <div style="border: #DDD solid 1px;margin-bottom: 10px;">
                        <img
                            src="{{$author->image_path}}"
                            style="width: 100%; border: 1px solid #888;" alt="...">
                        <div class="caption" style="padding: 10px; margin-top:20px">
                            <h3><a href="{{route('authors.show',$author->id)}}">{{$author->name}}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection


