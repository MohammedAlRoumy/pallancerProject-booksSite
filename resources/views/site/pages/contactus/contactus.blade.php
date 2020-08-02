@extends('site.app')
@section('content')

    @if (session()->has('success'))
        <div class="alert-message success">
            <i class="icon-ok"></i>
            <p><span>رسالة نجاح</span><br>
                {{ session('success') }}</p>
        </div>
    @endif

    @if($errors->any())
        <div class="alert-message error">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
<div class="row">
    <div class="col-md-12">
        <div class="boxedtitle page-title"><h2>اتصل بنا</h2></div>
    </div>
    <div class="col-md-12">
        <div class="page-content">

            <form class="" method="POST" action="">
                @csrf()

                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="العنوان"
                       style="width: 100%;"/>


                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                       placeholder="البريد اﻹلكتروني" style="width: 100%;"/>


                <textarea name="content" id="message" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" placeholder=" المحتوى"
                          style="width: 100%;">{!!old('content') !!}</textarea>


                <button type="submit" class="submit button small color" style="margin-top: 20px">ارسال</button>
            </form>

        </div><!-- End page-content -->
    </div>
</div>

@endsection
