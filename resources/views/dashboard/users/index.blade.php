@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>الأعضاء</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active">الاعضاء</li>
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
                                    <select name="role_id" class="form-control">
                                        <option value="">جميع الصلاحيات</option>
                                        @foreach($roles as $role)
                                            <option
                                                value="{{$role->id}}" {{request()->role_id == $role->id ?'selected':''}}>
                                                {{$role->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> بحث
                                    </button>
                                    @if(auth()->user()->hasPermission('create_users'))
                                        <a href="{{route('dashboard.users.create')}}" class="btn btn-success"><i
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
                        @if($users->count()>0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الصلاحيات</th>
                                    <th>الاجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $index=>$user)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                <h5 style="display: inline-block"><span
                                                        class="badge badge-primary">{{$role->name}}</span></h5>
                                            @endforeach
                                            {{--                                            {{implode(', ', $user->roles->pluck('name')->toArray())}}--}}
                                        </td>

                                        <td>
                                            @if(auth()->user()->hasPermission('update_users'))
                                                @if($user->hasRole('super_admin'))
                                                    <a href="#"
                                                       class="btn btn-warning btn-sm" disabled=""><i
                                                            class="fa fa-edit"></i> تعديل</a>
                                                @else
                                                    <a href="{{route('dashboard.users.edit',$user->id)}}"
                                                       class="btn btn-warning btn-sm"><i
                                                            class="fa fa-edit"></i> تعديل</a>
                                                @endif
                                            @else
                                                <a href="#"
                                                   class="btn btn-warning btn-sm" disabled=""><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                            @endif

                                            @if(auth()->user()->hasPermission('delete_users'))
                                                @if($user->hasRole('super_admin'))
                                                    <a href="#" class="btn btn-danger btn-sm " disabled=""><i
                                                            class="fa fa-trash"></i> حذف</a>
                                                @else

                                                    <form action="{{route('dashboard.users.destroy',$user->id)}}"
                                                          method="post"
                                                          style="display: inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                                class="fa fa-trash"></i> حذف
                                                        </button>
                                                    </form>
                                                @endif
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
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
