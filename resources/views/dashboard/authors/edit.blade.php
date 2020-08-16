@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>المؤلفون</h2>
    </div>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.authors.index')}}">المؤلفون</a></li>
        <li class="breadcrumb-item active">تعديل</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    {{--            <h3 class="tile-title">Add author</h3>--}}
                    <div class="tile-body">
                        {{--                <form class="form-horizontal" method="post" action="{{route('dashboard.authors.update',$authors->id)}}">--}}
                        <form id="author__properties"
                              class="form-horizontal"
                              method="post"
                              enctype="multipart/form-data"
                              action="{{ route('dashboard.authors.update', ['author' => $author->id, 'type' => 'update']) }}"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            @method('put')
                            @include('dashboard.partials._errors')

                            <div class="form-group row">
                                <label class="control-label col-md-3">اسم المؤلف</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="author__name" name="name" type="text"
                                           value="{{old('name',$author->name)}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">سيرة المؤلف</label>
                                <div class="col-md-9">
                                    <textarea name="bio" class="form-control">{{old('description',$author->bio)}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">صورة المؤلف</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="image" type="file">
                                    <img src="{{$author->image_path}}" style="width: 255px;height: 378px; margin-top:10px;" alt="">
                                </div>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-edit"></i>تعديل
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
