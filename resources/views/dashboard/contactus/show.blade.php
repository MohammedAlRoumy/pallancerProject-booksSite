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
        <h2>اتصل بنا</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.contactus.index')}}">اتصل بنا</a></li>
        <li class="breadcrumb-item active">عرض</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    <div class="tile-body">
                        <form class="form-horizontal">

                            <div class="form-group row">
                                <label class="control-label col-md-3">العنوان</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="title" type="text" value="{{$contactus->title}}"
                                           disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">البريد الالكتروني</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="email" type="email" value="{{$contactus->email}}"
                                           disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">الرسالة</label>
                                <div class="col-md-9">
                                    <textarea name="content" class="form-control" disabled
                                    >{{$contactus->content}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                &nbsp;&nbsp;&nbsp;<a class="btn btn-primary"
                                                     href="{{route('dashboard.contactus.index')}}">رجوع</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
