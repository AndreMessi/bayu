<!DOCTYPE html>
<html>
<head>
    <title>Jadwal</title>
    <style>
    
    html, body {
        background-color: #fff;
        color: #000;
        font-family: 'Times New Roman', Times, serif;
        font-weight: 100;
        font-size: 0.9em;
        height: 100vh;
        margin: 0;
    }
    table, th, td {
        border-collapse: collapse;
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 0px 5px;
        width: 100%;
    }
    h1{
        font-family: 'Times New Roman', Times, serif;
        font-size:40px;
    }
    h3{
        font-family: 'Times New Roman', Times, serif;
        font-size:22px;
        font-weight: bold;
    }
    h4{
        font-family: 'Times New Roman', Times, serif;
        font-size:20px;
    }
    h5{
        font-family: 'Times New Roman', Times, serif;
        font-size:15px;
    }
    p{
        font-family: 'Times New Roman', Times, serif;
        font-size:14px;
        font-weight: 200;
        color: #000;
        padding: 0;
        letter-spacing: 1px;
    }
    .full-height {
        height: 100vh;
    }
    .d-flex{
        display: flex;
        padding: 0em;
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
    .position-ref {
        position: relative;
    }
    .content {
        text-align: center;
    }
    </style>
</head>
<body style="margin: 0.5in 0.5in 0.5in 0.5in;">
    
    <table style="margin-top: -3em">
        <thead style="text-align: center">
            <tr>
                <th style="max-width: 2%">No</th>
                <th  style="width: 3em">Nama Pengguna</th>
                <th style="width: 15em">Nama Paket</th>
                <th style="width: 4em">Tujuan</th>
                <th style="width: 2em">Lokasi Penjemputan</th>
                <th style="width: 2em">Waktu Berangkat</th>
                <th style="width: 13em" width="40px" >Harga</th>
                <th style="width: 2em">Status</th>

            </tr>
           
        </thead>
        <tbody style="text-align: center">
            @foreach($pembayaran as $bayar)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$bayar->nama}}</td>
                <td>{{$bayar->paket_nama}}</td>
                <td>{{$bayar->paket_tujuan}}</td>
                <td>{{$bayar->pesan_lokasi_jemput}}</td>
                <td>{{$bayar->jadwal_waktu_berangkat}}</td>
                <td>{{$bayar->jadwal_harga}}</td>
                <td>{{$bayar->pesan_status}}</td>
                
                              
            </tr>
            @endforeach
           
        </tbody>
    </table>
    
</body>

</html>