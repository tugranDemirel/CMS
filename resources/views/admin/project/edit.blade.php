@extends('layouts.app')
@section('title') Create Page
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
                    <h6 class="c-grey-900">Proje Düzenle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.project.update', ['id'=>$data[0]['id']])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @if($data[0]['image'] !="")
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{ asset($data[0]['image']) }}" alt="" width="120">
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Proje Resimi</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Proje URL </label>
                                        <input type="text" name="url" class="form-control slug-url" id="" value="{{ $data[0]['url'] }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Anasayfa Gösterimi</label>
                                    <select name="isShow" class="form-control" id="">
                                        <option value="0" @if($data[0]['isShow'] == 0) selected @endif>Aktif</option>
                                        <option value="1" @if($data[0]['isShow'] == 1) selected @endif>Pasif</option>
                                    </select>
                                </div>
                            </div>
                            @foreach(\App\Language::all() as $k => $v)

                                <div class="row mb-5 pt-2" style="border: 1px solid #dddddd">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Proje Adı [{{$v['name']}}]</label>
                                            <input type="text" name="name[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], PROJECT_LANGUAGE, NAME_LANGUAGE, $data[0]['id']) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="">Proje Açıklaması [{{$v['name']}}]</label>
                                            <input type="text" name="text[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], PROJECT_LANGUAGE, TEXT_LANGUAGE, $data[0]['id']) }}">
                                        </div>
                                    </div>

                                </div>



                            @endforeach



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
