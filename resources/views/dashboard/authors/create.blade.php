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
        <h2>authors</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.authors.index')}}">authors</a></li>
        <li class="breadcrumb-item active">Create</li>
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
                                <label class="control-label col-md-3">author name</label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="name" type="text"
                                          placeholder="Enter author name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">author bio</label>
                                <div class="col-md-9">
                                    <textarea name="bio" class="form-control"
                                              placeholder="enter author bio"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">author image</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="image" type="file">
                                </div>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary"  type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>add
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
