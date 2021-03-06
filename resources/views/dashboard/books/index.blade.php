@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>الكتب</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active">الكتب</li>
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
                                    <div class="form-group">
                                        <select name="category" class="form-control">
                                            <option value="">جميع التصنيفات</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{request()->$category == $category->id?'selected':''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> بحث
                                    </button>
                                    @if(auth()->user()->hasPermission('create_books'))
                                        <a href="{{route('dashboard.books.create')}}" class="btn btn-success"><i
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
                        @if($books->count()>0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>الاسم</th>
                                    <th>المؤلفون</th>
                                    <th>التصنيفات</th>
                                    <th>سنة النشر</th>
                                    <th>مضاف للمفضلة</th>
                                    <th>الاجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($books as $index=>$book)
                                    <tr>
                                        <td>{{$index+1}}</td>
{{--                                        <td><img src="{{asset('storage/books/'.$book->image)}}" alt=""></td>--}}
                                        <td><img src="{{$book->poster_path}}" style="width: 60px;height: 60px;" alt=""></td>
                                        <td>{{$book->name}}</td>
{{--                                        <td>{{Str::limit($book->description, 50)}}</td>--}}
                                        <td>
                                            @foreach($book->authors as $author)
                                                <h5 style="display: inline-block"><span
                                                        class="badge badge-primary">{{$author->name}}</span></h5>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($book->categories as $category)
                                                <h5 style="display: inline-block"><span
                                                        class="badge badge-primary">{{$category->name}}</span></h5>
                                            @endforeach
                                        </td>
                                        <td>{{$book->year}}</td>
                                        <td>{{$book->users_count}}</td>
                                        <td>
                                            @if(auth()->user()->hasPermission('update_books'))
                                                <a href="{{route('dashboard.books.edit',$book->id)}}"
                                                   class="btn btn-warning btn-sm"><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                            @else
                                                <a href="#" class="btn btn-warning btn-sm" disabled=""><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                            @endif
                                            @if(auth()->user()->hasPermission('delete_books'))
                                                <form action="{{route('dashboard.books.destroy',$book->id)}}"
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
                            <h3>Sorry no records found</h3>
                        @endif
                    </div>
                </div>
                {{ $books->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
