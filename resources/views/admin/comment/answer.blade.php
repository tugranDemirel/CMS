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
                    <h6 class="c-grey-900">Yoruma Cevap Ver</h6>
                    <div class="mT-30">
                       <div class="form-group">
                           <label for="" class="form-control">Yorum: {{ $data[0]['text']}}</label>
                       </div>
                        <form action="{{route('admin.comment.store', ['id'=>$data[0]['id']])}}" method="POST">
                            @csrf
                            <div class="mb-3"><label class="form-label" for="exampleInputEmail1">Cevabın:</label>
                                <textarea name="text" class="form-control" id="" cols="30" rows="10">{{\App\CommentAnswer::getMessage($data[0]['id'])}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-color">Cevapla</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection
