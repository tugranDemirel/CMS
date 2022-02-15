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
                    <h6 class="c-grey-900">Site Ayarları</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.setting.update')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Telefon</label>
                                        <input type="text" name="phone" class="form-control " id="" value="{{ $data[0]['phone'] }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email </label>
                                        <input type="email" name="email" class="form-control " id="" value="{{ $data[0]['email'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Year Experience</label>
                                        <input type="text" name="year_experience" class="form-control " id="" value="{{ $data[0]['year_experience'] }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Year Won </label>
                                        <input type="text" name="year_won" class="form-control " id="" value="{{ $data[0]['year_won'] }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Expart Stuff </label>
                                        <input type="text" name="expart_stuff" class="form-control " id="" value="{{ $data[0]['expart_stuff'] }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Happy Customer </label>
                                        <input type="text" name="happy_customer" class="form-control " id="" value="{{ $data[0]['happy_customer'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Facebook</label>
                                        <input type="text" name="facebook" class="form-control " id="" value="{{ $data[0]['facebook'] }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">İnstagram </label>
                                        <input type="text" name="instagram" class="form-control " id="" value="{{ $data[0]['instagram'] }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Twitter </label>
                                        <input type="text" name="twitter" class="form-control " id="" value="{{ $data[0]['twitter'] }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Pinterest </label>
                                        <input type="text" name="pinterest" class="form-control " id="" value="{{ $data[0]['pinterest'] }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Linkedin </label>
                                        <input type="text" name="linkedin" class="form-control " id="" value="{{ $data[0]['linkedin'] }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Youtube </label>
                                        <input type="text" name="youtube" class="form-control " id="" value="{{ $data[0]['youtube'] }}">
                                    </div>
                                </div>
                            </div>

                            @foreach(\App\Language::all() as $k => $v)

                                <div class="row mb-5 pt-2" style="border: 1px solid #dddddd">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Site Title [{{$v['name']}}]</label>
                                            <input type="text" name="title[{{$v['id']}}]" class="form-control" id=""  value="{{ \App\LanguageContent::get($v['id'], SITE_SETTING_LANGUAGE, TITLE_LANGUAGE, 1) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Site Description [{{$v['name']}}]</label>
                                            <input type="text" name="description[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SITE_SETTING_LANGUAGE, DESCRIPTION_LANGUAGE, 1) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Site Keywords [{{$v['name']}}]</label>
                                            <input type="text" name="keywords[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SITE_SETTING_LANGUAGE, KEYWORDS_LANGUAGE, 1) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Footer Text [{{$v['name']}}]</label>
                                            <input type="text" name="footer_text[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SITE_SETTING_LANGUAGE, FOOTER_TEXT_LANGUAGE, 1) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Banner Title [{{$v['name']}}]</label>
                                            <input type="text" name="banner_title[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SITE_SETTING_LANGUAGE, BANNER_TITLE_LANGUAGE, 1) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Banner Description [{{$v['name']}}]</label>
                                            <input type="text" name="banner_description[{{$v['id']}}]" class="form-control" id="" value="{{ \App\LanguageContent::get($v['id'], SITE_SETTING_LANGUAGE, BANNER_DESCRIPTION_LANGUAGE, 1) }}">
                                        </div>
                                    </div>

                                </div>

                            @endforeach

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
