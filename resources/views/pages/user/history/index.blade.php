@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('historyOrder') }}
@endsection
@section('subhead')
<title>History Order</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">History Order</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button class="btn btn-primary shadow-md mr-2">Add New User</button> --}}
        {{-- <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export Excel
        </button>

        {{-- </a> --}}
        <a href="{{ route('laporanKasir') }}" target="_blank"  class="tooltip btn btn-primary shadow-md mr-2" title="Laporan Transaksi Hari Ini">
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
                        {{--<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Nama Customer
                        </th>--}}
                        {{-- <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Meja Customer</th> --}}
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Status</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->unique('code_transaksi') as $item)
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">{{ $loop->iteration }}</td>
                        <td class="border">{{ $item->code_transaksi }}</td>
                        {{--<td class="border">{{ $item->customer->name }}</td>--}}
                        {{-- <td class="border">
                            {{ number_format($item->meja_customer) }}
                        </td> --}}
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
                        <td class="border">
                            @if ($item->status == 'SUCCESS')
                            <a href="{{ route('invoice',$item->code_transaksi) }}"
                                class="tooltip btn bg-blue-300 shadow-md mr-2" title="Detail Invoice">
                                <i class="w-4 h-4 " data-feather="eye"></i>
                            </a>
                            <a href="{{ route('cetakInv',$item->code_transaksi) }}" target="_blank" class="tooltip btn btn-success-soft shadow-md mr-2"
                                title="Generate Invoice" >
                                <i class="w-4 h-4" data-feather="printer"></i>
                            </a>
                            @endif
                            @if ($item->jenis_pembayaran == 2)
                            <a href="{{ $item->url_midtrans }}" target="_blank" class="tooltip btn bg-blue-300 shadow-md mr-2" title="Bayar">
                                <i class="w-4 h-4 " data-feather="credit-card"></i>
                            </a>
                            @endif
                            <a href="javascript:;" class="tooltip btn btn-danger-soft shadow-md mr-2"
                                title="Delate Transaksi" data-toggle="modal" data-target="#delete-order-{{ $item->id }}">
                                <i class="w-4 h-4" data-feather="trash"></i>
                            </a>
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
                <div class="p-5 text-center"> <i data-feather="x-circle"
                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot
                        be undone.</div>
                </div>
                <div class="px-5 pb-8 text-center flex items-center justify-center">

                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <form action="{{ route('destroyCode',$deleteorder->code_transaksi) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-24"> Hapus </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

