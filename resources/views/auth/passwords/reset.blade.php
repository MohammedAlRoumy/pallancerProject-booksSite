@extends('site.app')

@section('content')

    @if($errors->any())
        <div class="alert-message error">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

<div class="col-md-12">
    <div class="page-content">
        <h2> {{__('استعادة كلمة المرور')}}</h2>

        <form class="" method="POST" action="{{ route('password.update') }}">
            @csrf()
            <input type="hidden" name="token" value="{{ $token }}">


            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                   placeholder="البريد اﻹلكتروني" style="width: 100%;"/>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="كلمة المرور الجديدة"  style="width: 100%;">

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="تأكيد كلمة المرور الجديدة"  style="width: 100%;">


            <button type="submit" class="submit button small color" style="margin-top: 20px">إستعادة كلمة الرور</button>
        </form>

    </div><!-- End page-content -->
</div><!-- End col-md-6 -->

@endsection
