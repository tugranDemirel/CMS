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
                    <h6 class="c-grey-900">Yeni Dil Ekle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.language.store')}}" method="POST">
                            @csrf
                            <div class="mb-3"><label class="form-label" for="exampleInputEmail1">Dil Adı</label> <input required type="text" name="name" class="form-control" id="exampleInputEmail1"> <small id="emailHelp" class="text-muted">lütfen dil adını giriniz.</small></div>
                            <div class="mb-3"><label class="form-label" for="exampleInputPassword1">Dil Kodu</label> <input required type="text" name="code" class="form-control" id="exampleInputPassword1"></div>
                            <button type="submit" class="btn btn-primary btn-color">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection
