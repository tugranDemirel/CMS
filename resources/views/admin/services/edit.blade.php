@extends('layouts.app')
@section('title') Create
@endsection
@section('css')
@endsection
@section('content')
  <div id="mainContent">
        <div class="row gap-20 " style="position: relative; height: 1700px;">
            <div class="col-md-12" style="position: absolute; left: 0%; top: 0px;">
                <div class="bgc-white p-20 bd">
                    @if(session('status'))
                        <div class="alert alert-primary">{{session('status')}}</div>
                    @endif
                    <h6 class="c-grey-900"> Servis Düzenle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.services.update', ['id'=>$data[0]['id']])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @foreach(\App\Language::all() as $k => $v)

                                <div class="row mb-5 " style="border: 1px solid #dddddd">
                                    @if( \App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, IMAGE_LANGUAGE, $data[0]['id']) != "" )
                                        <div class="col-md-12">
                                            <img src="{{ asset(\App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, IMAGE_LANGUAGE, $data[0]['id'])) }}" alt="">
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Servis Detay Resim[{{$v['name']}}]</label>
                                            <input type="file" name="image[{{$v['id']}}]" class="form-control" id="exampleInputEmail1" value="">
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="">Servis Adı [{{$v['name']}}]</label>
                                           <input type="text" name="name[{{$v['id']}}]" class="form-control slug-name" id="" value="{{ \App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, NAME_LANGUAGE, $data[0]['id']) }}">
                                       </div>
                                   </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Servis URL [{{$v['name']}}]</label>
                                            <input type="text" name="slug[{{$v['id']}}]" class="form-control slug-url" id="" value="{{ \App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, SLUG_LANGUAGE, $data[0]['id']) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Servis Title [{{$v['name']}}]</label>
                                            <input type="text" name="title[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, TITLE_LANGUAGE, $data[0]['id']) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Servis Desctiption [{{$v['name']}}]</label>
                                            <input type="text" name="description[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, DESCRIPTION_LANGUAGE, $data[0]['id']) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Servis Keywords [{{$v['name']}}]</label>
                                            <input type="text" name="keywords[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, KEYWORDS_LANGUAGE, $data[0]['id']) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Servis Anasayfa Yazısı [{{$v['name']}}]</label>
                                            <input type="text" name="home_text[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, HOME_DESCRIPTION_LANGUAGE, $data[0]['id']) }}">
                                        </div>
                                    </div>

                                    <div class="col-md 12">
                                        <div class="form-group">
                                            <label for="">İçerik</label>
                                            <textarea name="text[{{$v['id']}}]" class="form-control ckeditor" cols="30" rows="10">{{ \App\LanguageContent::get($v['id'], SERVICE_LANGUAGE, TEXT_LANGUAGE, $data[0]['id']) }}</textarea>
                                        </div>
                                    </div>

                                </div>



                            @endforeach

                            <div class="row ">
                                <div class="col-md-6">
                                    <label for="">Anasayfa Gösterimi</label>
                                    <select name="isHome" class="form-control" id="">
                                        <option @if($data[0]['isHome'] == 0) selected @endif value="0">Aktif</option>
                                        <option @if($data[0]['isHome'] == 1) selected @endif value="1">Pasif</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Anasayfa Icon</label>
                                    <input type="text" name="icon" id="" class="form-control" value="{{ $data[0]['icon'] }}">
                                </div>
                            </div>

                            <button type="submit" class="mt-3 btn btn-primary btn-color">Düzenle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection
