@extends('layouts.app')
@section('title') Create
@endsection
@section('css')
@endsection
@section('content')



    <div id="mainContent">
        <div class="row gap-" style="position: relative; height: 1500px;">
            <div class="col-md-12" style="position: absolute; left: 0%; top: 0px;">
                <div class="bgc-white p-20 bd">
                    @if(session('status'))
                        <div class="alert alert-primary">{{session('status')}}</div>
                    @endif
                    <h6 class="c-grey-900">Yeni Blog Ekle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.blog.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @foreach(\App\Language::all() as $k => $v)

                                <div class="row mb-5 " style="border: 1px solid #dddddd; padding: 10px 0;">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Blog Resim[{{$v['name']}}]</label>
                                            <input type="file" name="image[{{$v['id']}}]" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Blog Adı [{{$v['name']}}]</label>
                                            <input type="text" name="name[{{$v['id']}}]" class="form-control slug-name" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Blog URL [{{$v['name']}}]</label>
                                            <input type="text" name="slug[{{$v['id']}}]" class="form-control slug-url" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Blog Title [{{$v['name']}}]</label>
                                            <input type="text" name="title[{{$v['id']}}]" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Blog Desctiption [{{$v['name']}}]</label>
                                            <input type="text" name="description[{{$v['id']}}]" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Blog Keywords [{{$v['name']}}]</label>
                                            <input type="text" name="keywords[{{$v['id']}}]" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-md 12">
                                        <div class="form-group">
                                            <label for="">İçerik</label>
                                            <textarea name="text[{{$v['id']}}] ckeditor" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>

                                </div>



                            @endforeach

                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="categoryId" id="" class="form-control">
                                            @foreach($category as $k => $v)
                                                <option value="{{$v['id']}}">{{\App\LanguageContent::get(DEFAULT_LANGUAGE, BLOG_CATEGORY_LANGUAGE, NAME_LANGUAGE, $v['id'])}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Blog Gösterimi</label>
                                    <select name="isShow" class="form-control" id="">
                                        <option value="0">Aktif</option>
                                        <option value="1">Pasif</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Blog Tarih</label>
                                    <input type="date" name="date" id="" value="{{ date('Y-m-d') }}" class="form-control" >
                                </div>
                            </div>

                            <button type="submit" class="mt-3 btn btn-primary btn-color">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection
