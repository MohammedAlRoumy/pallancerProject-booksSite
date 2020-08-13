{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
--}}

<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title> زاد </title>
    <meta name="description" content="زاد || واحة المعرفة">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


@include('site.partials.styles')
<!-- Favicons -->
    {{--<link rel="shortcut icon" href="images/favicon.png">--}}

</head>

<body>

<div class="loader">
    <div class="loader_html"></div>
</div>

<div id="wrap" class="fixed-enabled grid_1200">

    @include('site.partials.header')

    <div class="panel-pop" id="signup">
        <h2>سجل الأن<i class="icon-remove"></i></h2>
        <div class="form-style form-style-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-inputs clearfix">
                    <p>
                        <label class="required">الأسم<span>*</span></label>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </p>
                    <p>
                        <label class="required">البريد الإلكتروني<span>*</span></label>
                        <input type="email" name="email" class="@error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </p>
                    <p>
                        <label class="required">كلمة المرور<span>*</span></label>
                        <input type="password" value="" name="password" class="@error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </p>
                    <p>
                        <label class="required">إعادة كلمة المرور<span>*</span></label>
                        <input type="password" value="" name="password_confirmation">
                    </p>
                </div>
                <p class="form-submit">
                    <input type="submit" value="تسجيل جديد" class="button color small submit">
                </p>
            </form>
        </div>
    </div><!-- End signup -->

    <div class="panel-pop" id="lost-password">
        <h2>نسيت كلمة المرور<i class="icon-remove"></i></h2>
        <div class="form-style form-style-3">
            <p>نسيت كلمة المرور ؟ لو سمحت قم بادخال البريد الإلكتروني</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-inputs clearfix">
                    <p>
                        <label class="required">البريد الإلكتروني<span>*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    </p>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <p class="form-submit">
                    <input type="submit" value="أستعادة" class="button color small submit">
                </p>
            </form>
            <div class="clearfix"></div>
        </div>
    </div><!-- End lost-password -->


    <section class="container main-content">
        <div class="login" style="margin-top: 100px; margin-bottom: 80px">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-content">
                        <h2>تسجيل دخول</h2>
                        <div class="form-style form-style-3">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-inputs clearfix">
                                    <p class="login-text">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <i class="icon-user"></i>
                                    </p>
                                    <p class="login-password">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <i class="icon-lock"></i>

                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">نسيت كلمة المرور</a>
                                        @endif
                                    </p>
                                </div>
                                <p class="form-submit login-submit">
                                    <input type="submit" value="تسجيل دخول"
                                           class="button color small login-submit submit">
                                </p>
                                <div class="rememberme">

                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('تذكرني') }}
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div><!-- End page-content -->
                </div><!-- End col-md-6 -->
                <div class="col-md-6">
                    <div class="page-content Register">
                        <h2>تسجيل جديد</h2>
                        {{--<p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                            الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                            إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي،
                            .</p>--}}
                        <a class="button color small signup">تسجيل حساب جديد</a>
                    </div><!-- End page-content -->
                </div><!-- End col-md-6 -->
            </div><!-- End row -->
        </div><!-- End login -->
    </section><!-- End container -->


    <!-- End footer -->
@include('site.partials.footer')
<!-- End footer -->
</div><!-- End wrap -->

<div class="go-up"><i class="icon-chevron-up"></i></div>

<!-- js -->
@include('site.partials.scripts')
</body>

</html>
