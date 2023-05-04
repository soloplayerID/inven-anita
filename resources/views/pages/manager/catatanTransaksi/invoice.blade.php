@extends('../layout/' . $layout)
@section('tanda')
@if (Auth::user()->role == 'manager')
{{ Breadcrumbs::render('invoice',$order) }}
@else
{{ Breadcrumbs::render('invoiceKasir',$order) }}
@endif
@endsection
@section('subhead')
    <title>Invoice</title>
    <style>
      .margin-top {
				margin-top: 100px;
			}
    </style>
@endsection

@section('subcontent')
@include('sweetalert::alert')
    @foreach ($order->unique('code_transaksi') as $item)

    @endforeach
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Invoice Layout</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <button class="btn btn-primary shadow-md mr-2">Print</button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file" class="w-4 h-4 mr-2"></i> Export Word
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file" class="w-4 h-4 mr-2"></i> Export PDF
                        </a>
                    </div>
                </div>
            </div> --}}
            <a href="{{ route('cetakInv',$item->code_transaksi) }}" target="_blank"  class="tooltip btn btn-primary shadow-md mr-2" title="Laporan Transaksi Hari Ini">
                print invoicess
            </a>

        </div>
    </div>
    <!-- BEGIN: Invoice -->
    <div class="intro-y box overflow-hidden mt-5">

        <div class="border-b border-gray-200 dark:border-dark-5 text-center sm:text-left">
            <div class="px-5 py-10 sm:px-20 sm:py-20">

                <div class="text-theme-1 dark:text-theme-10 font-semibold text-3xl">INVOICE</div>
                <div class="mt-2">

                    <img src="{{ asset('fotoSetting/'.$setting->logo) }}" width="200px" height="100px"><br>
                    <div class="text-theme-1 dark:text-theme-10 font-semibold text-3xl">{{$setting->name_application }}</div>
                    <br>
                    <pre >Jl. Raya Hankam Ujung Aspal RT 004/006 No. 428 Kel. Jatimurni Kec. Pondok Melati, <br>Kota Bekasi, 17431</pre>
                    Receipt <span class="font-medium">#{{ $item->code_transaksi }}</span>
                </div>
                <div class="mt-1">{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Jakarta')->isoFormat('D MMMM YYYY ') }}</div>
            </div>
            <div class="flex flex-col lg:flex-row px-5 sm:px-20 pt-10 pb-10 sm:pb-20">
                {{--<div>
                    <div class="text-base text-gray-600">Customer Details</div>
                    <div class="text-lg font-medium text-theme-1 dark:text-theme-10 mt-2">Nama : {{ $item->customer->name }}</div>
                    <div class="mt-1">Table : {{ $item->customer->telepon }}</div>

                </div>--}}
                <div class="lg:text-right mt-10 lg:mt-0 lg:ml-auto">
                    <div class="text-base text-gray-600">Payment Method</div>
                    @if ($item->jenis_pembayaran == 1)
                    <div class="text-lg font-medium text-theme-1 dark:text-theme-10 mt-2">Cash</div>
                    @else
                    <div class="text-lg font-medium text-theme-1 dark:text-theme-10 mt-2">Transfer</div>
                    @endif
                    {{-- <div class="mt-1">left4code@gmail.com</div> --}}
                </div>
            </div>
        </div>
        <div class="px-5 sm:px-16 py-10 sm:py-20">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">NAME</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">NOTE</th>

                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">QTY</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">UNIT</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">PRICE</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)

                        <tr>
                            <td class="border-b dark:border-dark-5">
                                <div class="font-medium whitespace-nowrap">{{ $item->nameMenu->name }}</div>
                                {{-- <div class="text-gray-600 text-xs whitespace-nowrap">Regular License</div> --}}
                            </td>
                            <td class="border-b dark:border-dark-5">
                                <div class="font-medium whitespace-nowrap">{{ $item->note }}</div>
                                {{-- <div class="text-gray-600 text-xs whitespace-nowrap">Regular License</div> --}}
                            </td>
                            <td class="text-right border-b dark:border-dark-5 w-32">{{ $item->quantity }}</td>
                            <td class="text-right border-b dark:border-dark-5 w-32">{{ $item->satuan }}</td>
                            <td class="text-right border-b dark:border-dark-5 w-32">RP. {{ number_format($item->harga_satuan) }}</td>
                            <td class="text-right border-b dark:border-dark-5 w-32 font-medium">RP. {{ number_format($item->jumlah_harga) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
            {{-- <div class="text-center sm:text-left mt-10 sm:mt-0">
                <div class="text-base text-gray-600">Bank Transfer</div>
                <div class="text-lg text-theme-1 dark:text-theme-10 font-medium mt-2">Elon Musk</div>
                <div class="mt-1">Bank Account : 098347234832</div>
                <div class="mt-1">Code : LFT133243</div>
            </div> --}}
            <div class="text-center sm:text-right sm:ml-auto">
                <div class="text-base text-gray-600">Total Amount</div>
                <div class="text-xl text-theme-1 dark:text-theme-10 font-medium mt-2">RP. {{ number_format($totalAmount) }}</div>
                {{-- <div class="mt-1 tetx-xs">Taxes included</div> --}}
            </div>
        </div>
    </div>
    <p class="margin-top">Mengetahui <br><br><br><br>{{ Auth::user()->name }}</p>
    <!-- END: Invoice -->
@endsection
