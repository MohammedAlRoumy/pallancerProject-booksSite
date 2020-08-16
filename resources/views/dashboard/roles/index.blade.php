@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>الصلاحيات</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active">الطلاحيات</li>
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
                                    @if(auth()->user()->hasPermission('create_roles'))
                                    <a href="{{route('dashboard.roles.create')}}" class="btn btn-success"><i
                                            class="fa fa-plus"></i> إضافة</a>
                                        @else
                                        <a href="#" class="btn btn-success" disabled=""><i
                                                class="fa fa-plus"></i> إضافة</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        @if($roles->count()>0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الاذونات</th>
                                    <th>عدد الاعضاء</th>
                                    <th>الاجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $index=>$role)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                                <h5 style="display: inline-block"><span
                                                        class="badge badge-primary">{{$permission->name}}</span></h5>
                                            @endforeach
                                        </td>
                                        <td>{{$role->users_count}}</td>
                                        <td>
                                            @if(auth()->user()->hasPermission('update_roles'))
                                                <a href="{{route('dashboard.roles.edit',$role->id)}}"
                                                   class="btn btn-warning btn-sm"><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                            @else
                                                <a href="#" class="btn btn-warning btn-sm" disabled=""><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                            @endif
                                            @if(auth()->user()->hasPermission('delete_roles'))
                                                <form action="{{route('dashboard.roles.destroy',$role->id)}}"
                                                      method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                            class="fa fa-trash"></i> حذف
                                                    </button>
                                                </form>
                                            @else
                                                    <a href="#" class="btn btn-danger btn-sm" disabled=""><i
                                                            class="fa fa-trash"></i> حذف
                                                    </a>
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
                {{ $roles->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
