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
                    <h6 class="c-grey-900">Slider Düzenle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.slider.update', ['id'=>$id])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @foreach(\App\Language::all() as $k => $v)
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{asset(\App\LanguageContent::get($v['id'], SLIDER_LANGUAGE, IMAGE_LANGUAGE, $id))}}" alt="" width="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Slider Resim[{{$v['name']}}]</label>
                                            <input type="file" name="image[{{$v['id']}}]" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Slider Başlık[{{$v['name']}}]</label>
                                            <input required type="text" name="title[{{$v['id']}}]" class="form-control slug-name" id="exampleInputEmail1" value="{{ \App\LanguageContent::get($v['id'], SLIDER_LANGUAGE, TITLE_LANGUAGE, $id) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Slider Açıklama[{{$v['name']}}]</label>
                                            <input required type="text" name="description[{{$v['id']}}]" class="form-control" id="exampleInputEmail1"  value="{{ \App\LanguageContent::get($v['id'], SLIDER_LANGUAGE, DESCRIPTION_LANGUAGE, $id) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Slider URL[{{$v['name']}}]</label>
                                            <input required type="text" name="url[{{$v['id']}}]" class="form-control slug-url" id="exampleInputEmail1"  value="{{ \App\LanguageContent::get($v['id'], SLIDER_LANGUAGE, URL_LANGUAGE, $id) }}">
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            <button type="submit" class="btn btn-primary btn-color">Düzenle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection
