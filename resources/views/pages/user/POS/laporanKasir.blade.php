<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Laporan Penjualan Kasir : {{ Auth::user()->name }} -  {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('D MMMM YYYY ') }}</title>
</head>

<body>
    {{-- <div class="container">
    </div> --}}
    <center><img src="{{ public_path('/fotoSetting/'.$setting->logo) }}" style="max-width: 200px" /></center>
          <center><p>{{$setting->name_application }}</p></center><br><pre >Jl. Raya Hankam Ujung Aspal RT 004/006 No. 428 Kel. Jatimurni Kec. Pondok Melati, <br>Kota Bekasi, 17431</pre>
    <h4 class="text-center">Laporan Barang Keluar </h4>
    <div class="row mt-3 mb-5">
        <div class="float-right">Total Transaksi : {{ $totalOrder }} </div>
        <div class="float-left">Date :
            {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('D MMMM YYYY ') }}
            <br>Nama Petugas : {{ Auth::user()->name }}
        </div>
    </div>
    <div class="mt-5">
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Satuan/Unit</th>
                    <th scope="col">Jumlah Terjual</th>
                    <th scope="col">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($terjual as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nameMenu->name }}</td>
                    <td>{{ $item->nameMenu->satuan }}</td>
                    <td>{{ number_format($item->terjual) }}</td>
                    <td>RP. {{ number_format($item->jumlah_harga) }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4">Total Pendapatan :</th>
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
