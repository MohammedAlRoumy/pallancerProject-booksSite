@extends('layouts.dashboard.app')

@push('styles')
    <style>
        #author__upload-wrapper {
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
        <h2>المؤلفون</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.authors.index')}}">المؤفون</a></li>
        <li class="breadcrumb-item active">إضافة</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    <div class="tile-body">
                        <form  class="form-horizontal" method="post"
                              enctype="multipart/form-data" action="{{ route('dashboard.authors.store')}}">
                            @csrf
                            @method('post')
                            @include('dashboard.partials._errors')


                            <div class="form-group row">
                                <label class="control-label col-md-3">اسم المؤلف </label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="name" type="text">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">سيرة المؤلف</label>
                                <div class="col-md-9">
                                    <textarea name="bio" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">صورة المؤلف</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="image" type="file">
                                </div>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary"  type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>إضافة
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                {{-- <a class="btn btn-secondary" href="{{route('dashboard.authors.index')}}"><i
                                         class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
