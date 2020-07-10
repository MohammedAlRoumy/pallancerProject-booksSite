@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>authors</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">authors</li>
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
                                               placeholder="search" value="{{request()->search}}">
                                    </div>
                                </div>

{{--
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="category" class="form-control">
                                            <option value="">All categories</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{request()->$category == $category->id?'selected':''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
--}}

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Search
                                    </button>
                                    @if(auth()->user()->hasPermission('create_authors'))
                                        <a href="{{route('dashboard.authors.create')}}" class="btn btn-success"><i
                                                class="fa fa-plus"></i> Add</a>
                                    @else
                                        <a href="#" class="btn btn-success" disabled=""><i
                                                class="fa fa-plus"></i> Add</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        @if($authors->count()>0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>bio</th>
                                    <th>image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($authors as $index=>$author)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$author->name}}</td>
                                        <td>{{Str::limit($author->bio, 50)}}</td>
                                        <td>
                                            <img src="{{$author->image_path}}" style="width: 60px;height: 80px;" alt="">
                                        </td>
                                        <td>
                                            @if(auth()->user()->hasPermission('update_authors'))
                                                <a href="{{route('dashboard.authors.edit',$author->id)}}"
                                                   class="btn btn-warning btn-sm"><i
                                                        class="fa fa-edit"></i> Edit</a>
                                            @else
                                                <a href="#" class="btn btn-warning btn-sm" disabled=""><i
                                                        class="fa fa-edit"></i> Edit</a>
                                            @endif
                                            @if(auth()->user()->hasPermission('delete_authors'))
                                                <form action="{{route('dashboard.authors.destroy',$author->id)}}"
                                                      method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                            class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            @else
                                                <a href="#" class="btn btn-danger btn-sm" disabled=""><i
                                                        class="fa fa-trash"></i> Delete
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
                {{ $authors->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
