@extends('site.app')
@section('content')

    <div class="col-md-12">
        <div class="page-content">
            <h2>من نحن</h2>
            <p>{{setting('aboutus')}}</p>
            <div class="widget widget_contact">
                <ul>
                    <li><i class="icon-map-marker"></i>العنوان :<p>{{setting('address')}}</p></li>
                    <li><i class="icon-phone"></i>الهاتف ت :<p>{{setting('phone')}}</p></li>
                    <li><i class="icon-envelope-alt"></i>البريد الإلكتروني :<p>{{setting('email')}}</p></li>
                </ul>
            </div>
        </div><!-- End page-content -->
    </div>
@endsection
