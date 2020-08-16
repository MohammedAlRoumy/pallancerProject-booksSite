@extends('layouts.dashboard.app')

@push('styles')
    <style>
        #book__upload-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 25vh;
            flex-direction: column;
            border: 1px solid black;
            cursor: pointer;
        }
    </style>
@endpush
@section('content')

    <div>
        <h2>الكتب</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.books.index')}}">الكتب</a></li>
        <li class="breadcrumb-item active">إضافة</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    <div class="tile-body">
                        <form  class="form-horizontal" method="post"
                              enctype="multipart/form-data" action="{{ route('dashboard.books.store')}}">
                            @csrf
                            @method('post')
                            @include('dashboard.partials._errors')

                            <div class="form-group row">
                                <label class="control-label col-md-3">ملف الكتاب</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="file" type="file">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">اسم الكتاب</label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="name" type="text">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">وصف الكتاب</label>
                                <div class="col-md-9">
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">صورة الكتاب</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="poster" type="file">
                                </div>
                            </div>

                            {{--<div class="form-group row">
                                <label class="control-label col-md-3">book authors</label>
                                <div class="col-md-9">
                                    <select name="authors[]" class="form-control select2" multiple style="width: 100%">
                                        @foreach($authors as $author)
                                            <option value="{{$author->id}}"
                                                --}}{{--                                                    {{in_array($category->id, $book->categories->pluck('id')->toArray())?'selected':''}}--}}{{--
                                            >{{$author->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>--}}

                            <div class="form-group row">
                                <label class="control-label col-md-3">مؤلفو الكتاب</label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="authors" type="text"
                                            value="{{old('authors')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">تصنيفات الكتاب</label>
                                <div class="col-md-9">
                                        <select name="categories[]" class="form-control select2" multiple style="width: 100%">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
{{--                                                    {{in_array($category->id, $book->categories->pluck('id')->toArray())?'selected':''}}--}}
                                                >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">سنة النشر</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="year" type="text" value="{{old('year')}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary"  type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>إضافة
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                {{-- <a class="btn btn-secondary" href="{{route('dashboard.books.index')}}"><i
                                         class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
