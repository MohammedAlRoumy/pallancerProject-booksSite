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
        <h2>books</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.aboutus.index')}}">About Us</a></li>
        <li class="breadcrumb-item active">show</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    <div class="tile-body">
                        <form class="form-horizontal">

                            <div class="form-group row">
                                <label class="control-label col-md-3">Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="title" type="text" value="{{$contactus->title}}"
                                           disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="email" type="email" value="{{$contactus->email}}"
                                           disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">about us content</label>
                                <div class="col-md-9">
                                    <textarea name="content" class="form-control" disabled
                                    >{{$contactus->content}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                &nbsp;&nbsp;&nbsp;<a class="btn btn-primary"
                                                     href="{{route('dashboard.contactus.index')}}">back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
