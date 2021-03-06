@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>الكتب</h2>
    </div>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.books.index')}}">الكتب</a></li>
        <li class="breadcrumb-item active">تعديل</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    {{--            <h3 class="tile-title">Add book</h3>--}}
                    <div class="tile-body">
                        {{--                <form class="form-horizontal" method="post" action="{{route('dashboard.books.update',$books->id)}}">--}}
                        <form id="book__properties"
                              class="form-horizontal"
                              method="post"
                              enctype="multipart/form-data"
                              action="{{ route('dashboard.books.update', ['book' => $book->id, 'type' => 'update']) }}"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            @method('put')
                            @include('dashboard.partials._errors')

                            <div class="form-group row">
                                <label class="control-label col-md-3">ملف الكتاب</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="file" type="file">
                                    <iframe src="{{url($book->file_path)}}" frameborder="0" width="100%" height="300px"></iframe>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">اسم الكتاب</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="book__name" name="name" type="text"
                                           value="{{old('name',$book->name)}}"  >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">وصف الكتاب</label>
                                <div class="col-md-9">
                                    <textarea name="description" class="form-control">{{old('description',$book->description)}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">صورة الكتاب</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="poster" type="file">
                                    <img src="{{$book->poster_path}}" style="width: 255px;height: 378px; margin-top:10px;" alt="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">مؤلفو الكتاب</label>
                                <div class="col-md-9">
                                    <select name="authors[]" class="form-control select2" multiple style="width: 100%">
                                        @foreach($authors as $author)
                                            <option value="{{$author->id}}" {{in_array($author->id, $book->authors->pluck('id')->toArray())?'selected':''}}
                                            >{{$author->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">تصنيفات الكتاب</label>
                                <div class="col-md-9">
                                    <select name="categories[]" class="form-control select2" multiple style="width: 100%">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{in_array($category->id, $book->categories->pluck('id')->toArray())?'selected':''}}
                                            >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">سنة النشر</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="year" type="text" value="{{old('year',$book->year)}}">
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
