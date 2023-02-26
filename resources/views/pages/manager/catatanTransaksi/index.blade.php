@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('catatan_transaksi') }}
@endsection
@section('subhead')
<title>History Order</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">History Order</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button class="btn btn-primary shadow-md mr-2 ml-3">Add New </button> --}}
        <form method="GET" class="flex flex-row items-center">
            <div class="relative w-56 mx-auto">
                <div
                    class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                    <i data-feather="calendar" class="w-4 h-4"></i> </div> <input name="filter_tanggal" id="filter_tanggal" data-category="filter_tanggal" data-dependent="filter_tanggal" type="date"
                    class=" form-control pl-12">
            </div>

            <button type="submit" class=" tooltip btn btn-link box shadow-md ml-2 " title="Filter by Tanggal">
                <i class="w-5 h-5" data-feather="filter"></i>
            </button>
        </form>
        <form method="GET" class="flex flex-row items-center">
            <select name="petugas_id" id="petugas_id" class="dropdown-toggle btn btn-link box shadow-md ml-2 filter"
                data-category="petugas_id" data-dependent="petugas_id">
                <option selected disabled>Filter by Petugas</option>
                @foreach ($user as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>

            <button type="submit" class=" tooltip btn btn-link box shadow-md ml-2 " title="Filter by Petugas">
                <i class="w-5 h-5" data-feather="filter"></i>
            </button>
        </form>

        <a href="{{ route('catatan.index') }}" class="tooltip btn btn-link box shadow-md ml-10" title="Reset All Filter">
            <i class="w-5 h-5" data-feather="refresh-cw"></i>
        </a>
        {{-- </a> --}}
        <a href="{{ route('laporan') }}" target="_blank" class="tooltip btn btn-primary shadow-md ml-2 mr-2"
            title="Laporan Transaksi Hari Ini">
            <i class="w-4 h-4" data-feather="printer"></i>
        </a>
        <a href="{{ route('pendapatanBulanIni') }}" target="_blank" class="tooltip btn btn-primary-soft shadow-md "
            title="Laporan Transaksi Bulan Ini">
            <i class="w-4 h-4" data-feather="printer"></i>
        </a>


    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">


        </form>
        <div class="flex mt-5 sm:mt-0">


        </div>
    </div>
    <div class="overflow-x-auto scrollbar-hidden">
        <div class="overflow-x-auto">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center ">No</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">No Transaksi</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Nama Petugas
                        </th>
                        {{--<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Nama Customer
                        </th>--}}
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Status</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->unique('code_transaksi') as $item)
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">{{ $loop->iteration }}</td>
                        <td class="border">{{ $item->code_transaksi }}</td>
                        <td class="border">{{ $item->user->name }}</td>
                        {{--<td class="border">{{ $item->customer->name }}</td>--}}
                      
                        <td class="border">
                            @if ($item->status == 'SUCCESS')
                            <span class=" text-xs btn btn-rounded-success">Success</span>
                            @elseif($item->status == 'PENDING')
                            <span class=" text-xs btn btn-rounded-warning">Pending</span>
                            @elseif($item->status == 'CANCEL')
                            <span class=" text-xs btn btn-rounded-danger">Cancel</span>
                            @else
                            <span class=" text-xs btn btn-rounded-primary">Waiting</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('invoice',$item->code_transaksi) }}"
                                class="tooltip btn bg-blue-300 shadow-md mr-2" title="Detail Infoice">
                                <i class="w-4 h-4 " data-feather="eye"></i>
                            </a>
                            <a href="javascript:;" class="tooltip btn btn-danger-soft shadow-md mr-2"
                                title="Delate Transaksi" data-toggle="modal" data-target="#delete-order-{{ $item->id }}">
                                <i class="w-4 h-4" data-feather="trash"></i>
                            </a>
                        </td>
                        {{-- <td class="border">
                            @if ($item->status == 'SUCCESS')
                            <a href="{{ route('cetakInv',$item->code_transaksi) }}" target="_blank" class="tooltip btn
                        btn-success-soft shadow-md mr-2"
                        title="Generate Invoice" >
                        <i class="w-4 h-4" data-feather="printer"></i>
                        </a>
                        @endif
                        @if ($item->jenis_pembayaran == 2)
                        <a href="{{ $item->url_midtrans }}" target="_blank"
                            class="tooltip btn bg-blue-300 shadow-md mr-2" title="Bayar">
                            <i class="w-4 h-4 " data-feather="credit-card"></i>
                        </a>
                        @endif
                        <a href="javascript:;" class="tooltip btn btn-danger-soft shadow-md mr-2"
                            title="Delate Transaksi" data-toggle="modal" data-target="#delete-order-{{ $item->id }}">
                            <i class="w-4 h-4" data-feather="trash"></i>
                        </a> --}}
                        </td>
                    </tr>
                    @empty
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center" colspan="5">Data Menu Masih Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@foreach ($order as $deleteorder)
<!-- BEGIN: Modal Content -->
<div id="delete-order-{{ $deleteorder->id }}" class="modal" data-backdrop="static" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body p-0">
            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot
                    be undone.</div>
            </div>
            <div class="px-5 pb-8 text-center flex items-center justify-center">

                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                <a href="{{ route('destroyCode2',$deleteorder->code_transaksi) }}"><button type="button" class="btn btn-danger w-24">Hapus</button></a>
                {{--<form action="{{ route('destroyCode2',$deleteorder->code_transaksi) }}" method="post">
                    @csrf
                    
                    <input type="submit" class="btn btn-danger w-24" value="Hapus">
                </form>--}}
            </div>
        </div>
    </div>
</div>
</div>
@endforeach

@endsection
