@extends('partials.layout')
@section('title','Pencarian')
@section('content')
    <div class="card col-12">
        <div class="card-body row">
            @if(count($data)>0)
                @foreach($data as $k=>$i)
                    <div class="col-4">
                        <div class="text-center border mb-3">
                            <h5 class="font-weight-bold my-5">{{$i->paket_nama}}</h5>
                            <div class="m-3">
                                <a class="btn btn-block btn-primary" href="{{route('pages.paket.detail',$i->paket_id)}}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal"></div>
                @endforeach
            @else
                <div class="text-center">Data Tidak Ditemukan</div>
            @endif
        </div>
    </div>
@endsection
