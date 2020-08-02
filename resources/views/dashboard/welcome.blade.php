@extends('layouts.dashboard.app')

@section('content')
    <h2>Dashboard</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b>{{ $users_count }}</b></p>
                </div>
            </div>
        </div><!-- end of col -->

        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-list fa-3x"></i>
                <div class="info">
                    <h4>Categories</h4>
                    <p><b>{{ $categories_count }}</b></p>
                </div>
            </div>
        </div><!-- end of col -->

        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
                <div class="info">
                    <h4>Books</h4>
                    <p><b>{{ $books_count }}</b></p>
                </div>
            </div>
        </div><!-- end of col -->

        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-pencil fa-3x"></i>
                <div class="info">
                    <h4>Authors</h4>
                    <p><b>{{ $authors_count }}</b></p>
                </div>
            </div>
        </div><!-- end of col -->


    </div><!-- end of row -->

@endsection
