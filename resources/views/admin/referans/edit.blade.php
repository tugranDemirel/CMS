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
                    <h6 class="c-grey-900">Referans Düzenle</h6>
                    <div class="mT-30">
                        <form action="{{route('admin.referans.update', ['id'=>$data[0]]['id'])}}" enctype="multipart/form-data" method="POST">
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
                                        <label class="form-label" for="exampleInputEmail1">Referans Resimi</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                    </div>
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
