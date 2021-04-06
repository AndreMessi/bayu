@extends('partials.layout')
@section('title','Gallery')
@section('content')
    @if(count($data)>0)
    <div class="card col-12">
        <div class="card-body">
            <div class="filter-container p-0 row">
                @foreach($data as $i)
                    <div class="filtr-item col-sm-2" data-category="{{$i->gallery_paket_id}}">
                        <a href="{{$i->gallery_img}}" data-toggle="lightbox" data-title="{{$i->gallery_title}}" data-gallery="gallery">
                            <img src="{{$i->gallery_img}}" class="img-fluid mb-2" alt="{{$i->gallery_title}}"/>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
        <div class="col-12">Data Kosong</div>
    @endif
@endsection
