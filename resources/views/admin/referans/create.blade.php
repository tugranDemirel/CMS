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
                    <h6 class="c-grey-900">Yeni Referans Ekle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.referans.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Referans Resmi</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                    </div>
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
