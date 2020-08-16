@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>الصلاحيات</h2>
    </div>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.roles.index')}}">الصلاحيات</a></li>
        <li class="breadcrumb-item active">تعديل</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    {{--            <h3 class="tile-title">Add role</h3>--}}
                    <div class="tile-body">
                        {{--                <form class="form-horizontal" method="post" action="{{route('dashboard.roles.update',$roles->id)}}">--}}
                        <form method="post" action="{{ route('dashboard.roles.update', $role->id) }}">

                            @csrf
                            @method('put')
                            @include('dashboard.partials._errors')
                            <div class="form-group row">
                                <label class="control-label col-md-3">اسم الصلاحية</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name" type="text" placeholder="Enter role name"
                                           value="{{ old('name', $role->name) }}">
                                </div>
                            </div>

                            {{--permissions--}}
                            <div class="form-group">
                                <h4>الاذونات</h4>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 20%;">النموذج</th>
                                        <th>الاذونات</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @php
                                        $models = ['categories', 'books', 'users','settings','aboutus','contactus'];
                                    @endphp

                                    @foreach ($models as $index=>$model)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td class="text-capitalize">{{ $model }}</td>
                                            <td>
                                                @php
                                                    $permission_maps = ['create', 'read', 'update', 'delete'];
                                                @endphp

                                                @if ($model == 'settings')
                                                    @php
                                                        $permission_maps = ['create', 'read'];
                                                    @endphp
                                                @endif
                                                @if ($model == 'aboutus')
                                                    @php
                                                        $permission_maps = ['create', 'read'];
                                                    @endphp
                                                @endif

                                                <select name="permissions[]" class="form-control select2" multiple>
                                                    @foreach ($permission_maps as $permission_map)
                                                        <option
                                                            {{ $role->hasPermission($permission_map . '_' . $model) ? 'selected' : '' }} value="{{ $permission_map . '_' . $model }}">{{ $permission_map }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <hr>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-edit"></i>تعديل
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary" href="{{route('dashboard.roles.index')}}"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>إلغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
