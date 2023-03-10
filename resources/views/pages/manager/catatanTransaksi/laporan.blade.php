<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Laporan Pendapatan - {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('D MMMM YYYY ') }}
    </title>
</head>

<body>
    {{-- <div class="container">
    </div> --}}
    <?php
            $setting =  \App\Models\Setting::get()->first();
          ?>
          <center><img src="{{ public_path('/fotoSetting/'.$setting->logo) }}" style="width: 50%; max-width: 200px" /></center>
			<center><span>{{$setting->name_application }}</span></center><br><pre >Jl. Raya Hankam Ujung Aspal RT 004/006 No. 428 Kel. Jatimurni<br> Kec. Pondok Melati, Kota Bekasi, 17431</pre>
			Date: {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('DD MMMM YYYY ') }} <center><span style="margin-bottom: 10px;">Laporan Pendapatan</span></center>
    <div class="row mt-3 mb-5">
        {{-- <div class="float-right">Total Transaksi : {{ $totalOrder }} </div> --}}
    <div class="float-left">Date :
        {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('D MMMM YYYY ') }}

    </div>
    </div>
    <div class="mt-5">
        {{-- <h6>Petugas : {{ $item->name}}</h6> --}}
        <table class="table table-bordered ">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Terjual</th>
                <th scope="col">Sub Total</th>
            </thead>
            <tbody>
                @foreach ($terjual as $item)
                    <tr>
                        <th scope="col">{{ $loop->iteration }}</th>
                        <td>{{ $item->nameMenu->name }}</td>
                        <td>{{ number_format($item->terjual)}}</td>
                        <td>RP. {{ number_format($item->jumlah_harga)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="3">Total Pendapatan :</th>
                    <td>RP. {{ number_format( $totalPendapatan) }}</td>

                </tr>
            </tbody>
        </table>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>
