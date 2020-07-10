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

    {{-- <section class="container main-content page-full-width" style="margin-top: 20px; margin-bottom: 60px;">
         <div class="row">
             <div class="contact-us" style="padding: 20px;">--}}
    <div class="col-md-12">
        <div class="page-content">
            <h2>اتصل بنا</h2>

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
    </div><!-- End col-md-6 -->
    {{--          </div><!-- End contact-us -->
      </div><!-- End row -->
    </section><!-- End container -->--}}
@endsection
