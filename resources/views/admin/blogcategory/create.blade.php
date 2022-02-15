@extends('layouts.app')
@section('title') Create
@endsection
@section('css')
@endsection
@section('content')



    <div id="mainContent">
        <div class="row gap-20 masonry pos-r" style="position: relative; height: 1095px;">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12" style="position: absolute; left: 0%; top: 0px;">
                <div class="bgc-white p-20 bd">
                    @if(session('status'))
                        <div class="alert alert-primary">{{session('status')}}</div>
                    @endif
                    <h6 class="c-grey-900">Yeni Blog kategori Ekle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.blogcategory.store')}}" method="POST">
                            @csrf
                            @foreach(\App\Language::all() as $k => $v)
                                <div class="row mt-3" style="border: 1px solid #dddddd; padding: 10px 0;" >
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Kategori Adı [{{ $v['name'] }}]</label>
                                            <input  type="text" name="name[{{ $v['id'] }}]" class="form-control slug-name" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Kategori Slug [{{ $v['name'] }}]</label>
                                            <input  type="text" name="slug[{{ $v['id'] }}]" class="form-control slug-url" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Kategori Title [{{ $v['name'] }}]</label>
                                            <input  type="text" name="title[{{ $v['id'] }}]" class="form-control" id="exampleInputPassword1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Kategori Description [{{ $v['name'] }}]</label>
                                            <input  type="text" name="description[{{ $v['id'] }}]" class="form-control" id="exampleInputPassword1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Kategori Keywords [{{ $v['name'] }}]</label>
                                            <input  type="text" name="keywords[{{ $v['id'] }}]" class="form-control" id="exampleInputPassword1">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary btn-color mt-3 ">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection
