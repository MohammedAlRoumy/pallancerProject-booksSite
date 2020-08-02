@extends('site.app')
@section('content')

    <div class="row">
    <div class="col-md-12">
        <div class="boxedtitle page-title"><h2>من نحن</h2></div>
    </div>
    <div class="col-md-12" style=" margin-bottom: 35px; margin-top: 22px">
        <div class="page-content">

            <h4>{{setting('aboutus')}}</h4>
            <div class="widget widget_contact">
                <ul>
                    <li><i class="icon-map-marker"></i>العنوان :<p>{{setting('address')}}</p></li>
                    <li><i class="icon-phone"></i>الهاتف :<p>{{setting('phone')}}</p></li>
                    <li><i class="icon-envelope-alt"></i>البريد الإلكتروني :<p>{{setting('email')}}</p></li>
                </ul>
            </div>
        </div><!-- End page-content -->
    </div>
</div>

@endsection
