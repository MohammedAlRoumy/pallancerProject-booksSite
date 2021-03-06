@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>إتصل بنا</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active">اتصل بنا</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
                <div class="row">
                    <div class="col-12">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="search" name="search" autofocus class="form-control"
                                               placeholder="بحث" value="{{request()->search}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> بحث
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        @if($contactus->count()>0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العنوان</th>
                                    <th>الربيد الالكتروني</th>
                                    <th>الاجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contactus as $index=>$contact_us)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$contact_us->title}}</td>
                                        <td>{{$contact_us->email}}</td>

                                        <td>
                                            @if(auth()->user()->hasPermission('update_contactus'))
                                                <a href="{{route('dashboard.contactus.show',$contact_us->id)}}"
                                                   class="btn btn-warning btn-sm"><i
                                                        class="fa fa-eye"></i> عرض</a>
                                            @else
                                                <a href="#" class="btn btn-warning btn-sm" disabled=""><i
                                                        class="fa fa-eye"></i> عرض</a>
                                            @endif

                                            @if(auth()->user()->hasPermission('delete_contactus'))
                                                <form action="{{route('dashboard.contactus.destroy',$contact_us->id)}}"
                                                      method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                            class="fa fa-trash"></i> حذف
                                                    </button>
                                                </form>
                                            @else
                                                <a href="#" class="btn btn-danger btn-sm " disabled=""><i
                                                        class="fa fa-trash"></i> حذف</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h3>لا توجد بيانات</h3>
                        @endif
                    </div>
                </div>
                {{ $contactus->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
