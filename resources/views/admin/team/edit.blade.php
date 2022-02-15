@extends('layouts.app')
@section('title') Update Page
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
                    <h6 class="c-grey-900">Takım Arkadaşı Düzenle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.team.update', ['id'=>$data[0]]['id'])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @if($data[0]['image'] !="")
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{ asset($data[0]['image']) }}" alt="" width="120">
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Profil Resimi</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Ad Soyad </label>
                                        <input type="text" name="name" class="form-control " id="" value="{{ $data[0]['name'] }}">
                                    </div>
                                </div>

                            </div>
                            @foreach(\App\Language::all() as $k => $v)

                                <div class="row mb-5 pt-2" style="border: 1px solid #dddddd">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Pozisyon [{{$v['name']}}]</label>
                                            <input type="text" name="position[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], TEAM_LANGUAGE, POSITION_LANGUAGE, $data[0]['id']) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Açıklaması [{{$v['name']}}]</label>
                                            <input type="text" name="text[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], TEAM_LANGUAGE, TEXT_LANGUAGE, $data[0]['id']) }}">
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
