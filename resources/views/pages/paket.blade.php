@extends('partials.layout')
@section('title','Data Paket')
@section('content')
        @if(@auth()->user()->role==='admin')
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a href="{{route('pages.paket.form')}}" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="dTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Paket</th>
                                    <th>Nama Paket</th>
                                    <th>Tempat Tujuan</th>
                                    <th>Transportasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($data)>0)
                                @foreach($data as $i)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$i->paket_kode}}</td>
                                        <td>{{$i->paket_nama}}</td>
                                        <td>{{$i->paket_tujuan}}</td>
                                        <td>{{$i->paket_transportasi}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{route('pages.paket.form',['id'=>$i->paket_id])}}">Edit</a>
                                            <a class="btn btn-danger" href="{{route('pages.paket.delete',$i->paket_id)}}">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="5" class="text-center">Data Kosong</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="col-12">
                <div class="row">
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
                                <div class="text-center">Data Kosong</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

@endsection
