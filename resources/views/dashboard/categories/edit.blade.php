@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>التصنيفات</h2>
    </div>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
            <li class="breadcrumb-item "><a href="{{route('dashboard.categories.index')}}">التصنيفات</a></li>
            <li class="breadcrumb-item active">تعديل</li>
        </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">
                    <div class="tile-body">
                        <form class="form-horizontal" method="post" action="{{route('dashboard.categories.update',$category->id)}}">
                            @csrf
                            @method('put')
                            @include('dashboard.partials._errors')
                            <div class="form-group row">
                                <label class="control-label col-md-3">اسم التصنيف</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name" type="text" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">الحالة</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" value="1">مفعل
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" value="0">معطل
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-edit"></i>إضافة
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary" href="{{route('dashboard.categories.index')}}"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>إلغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
