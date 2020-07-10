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
        <h2>About Us</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.aboutus.index')}}">About Us</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    <div class="tile-body">
                        <form  class="form-horizontal" method="post"
                               enctype="multipart/form-data" action="{{ route('dashboard.aboutus.store')}}">
                            @csrf
                            @method('post')
                            @include('dashboard.partials._errors')


                            <div class="form-group row">
                                <label class="control-label col-md-3">about us content</label>
                                <div class="col-md-9">
                                    <textarea name="aboutus" class="form-control"
                                              placeholder="enter about us content">{{setting('aboutus')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">address</label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="address" type="text"
                                           placeholder="Enter the address" value="{{setting('address')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">phone</label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="phone" type="text"
                                           placeholder="Enter the phone" value="{{setting('phone')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">email</label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="email" type="email"
                                           placeholder="Enter author name" value="{{setting('email')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary"  type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>add
                                </button>
                                &nbsp;&nbsp;&nbsp;
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
