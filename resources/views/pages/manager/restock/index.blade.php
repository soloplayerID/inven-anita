@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('restock') }}
@endsection
@section('subhead')
<title>Restock Menu</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Restock Barang</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <form method="POST" action="{{ route('reportBarangMasuk') }}" class="flex flex-row items-center">
            @csrf
            From
            <input id="modal-datepicker-1"
            class="datepicker form-control ml-3 mr-3" name="form" data-single-mode="true">
            To
            <input id="modal-datepicker-2"
                                class="datepicker form-control ml-3" name="to" data-single-mode="true">

            <button type="submit" class=" tooltip btn btn-primary shadow-md ml-2 " title="Generate Laporan">
                <i class="w-5 h-5" data-feather="printer"></i>
            </button>
        </form>
    </div>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-7">

        <div class="intro-y box p-5 mt-5">
            <div class="flex flex-col sm:flex-row items-center p-1 mb-3">
                <h2 class="font-medium text-base mr-auto">
                    Data Terbaru
                    
                </h2>
             
                {{-- <a href="#" class="tooltip btn btn-dark-soft shadow-md mr-2" title="History Transaksi"
                    data-toggle="modal" data-target="#history">
                    <i class="w-4 h-4" data-feather="rotate-cw"></i>
                </a> --}}


            </div>
            <div class="overflow-x-auto scrollbar-hidden">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">No</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Name Product</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Satuan/Unit</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Jumlah Restock</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Harga Beli</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Total Harga</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restock as $item)

                            <tr class="hover:bg-gray-200">
                                <td class="border">{{ $no++ }}</td>
                                <td class="border">{{ $item->menu->name }}</td>
                                <td class="border">{{ $item->menu->satuan }}</td>
                                <td class="border">{{ number_format($item->quantity) }}</td>
                                <td class="border">
                                   RP. {{ number_format($item->harga_beli_satuan) }}
                                </td>
                                <td class="border">
                                    RP. {{ number_format($item->total_harga) }}
                                 </td>

                                <td class="border whitespace-nowrap">
                                    <a href="javascript:;" class="tooltip btn btn-danger-soft shadow-md mr-2"
                                        title="Delete Data" data-toggle="modal"
                                        data-target="#delete-{{ $item->id }}">
                                        <i class="w-4 h-4" data-feather="trash"></i>
                                    </a>
                                </td>

                            </tr>
                            {{-- {{ $item->links() }} --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-5 mt-4" style="margin-top: 20px">
        <!-- BEGIN: Single File Upload -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Input Restock
                </h2>

            </div>
            <form enctype="multipart/form-data" method="POST" action="{{ route('restock.store') }}">
                @csrf
                <div class=" grid grid-cols-12 gap-4 gap-y-3 box p-4 mt-2">

                    <div class="col-span-12">
                        <label for="modal-form-1" class="form-label">Menu Product</label>
                        <select id="selectMenu" class="form-select " required name="menu_id">
                            <option disabled="true" selected="true"> Pilih Menu </option>
                            @foreach ($menu as $item)
                            <option value="{{$item->id}}">{{$item->name}} Stock : {{ $item->stock }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-span-12">
                        <label for="modal-form-1" class="form-label">Supplier</label>
                        <select id="selectSupplier" class="form-select " required name="supplier_id">
                            <option disabled="true" selected="true"> Pilih Menu </option>
                            @foreach ($supplier as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Jumlah Restock</label>

                        <input name="quantity" id="jumlah" type="number" required class="form-control  "
                            placeholder="Jumlah">
                    </div>
                    <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Harga Beli satuan</label>

                        <input name="harga_beli_satuan" id="harga" type="number" required class="form-control  "
                            placeholder="Harga Beli">
                    </div>
                    <div class="col-span-12">
                        <label for="modal-form-1" class="form-label text-center">Total Harga</label>

                        <input name="total_harga" id="total" readonly type="number" required class="form-control  text-center "
                            placeholder="Total Harga">
                    </div>
                    {{-- <div class="col-span-12">
                        <label for="modal-form-1" class="form-label">Tanggal Setor</label>
                        <input name="tanggal_setor" id="modal-form-1" type="date" required class="form-control  "
                            placeholder="Banyaknya Transakti (RP)">
                    </div> --}}
                    <div class="col-span-12 ">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary w-20 ">Send</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>
</div>

@foreach ($restock as $deleterestock)
<!-- BEGIN: Modal Content -->
<div id="delete-{{ $deleterestock->id }}" class="modal" data-backdrop="static" tabindex="-1" aria-hidden="true">
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
                    <form action="{{ route('restock.destroy',$deleterestock->id) }}" method="post">
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
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah, #harga").keyup(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
    });
    $(document).ready(function () {
        $('#selectMenu').select2();
        $('#selectSupplier').select2();
    });

</script>
@endsection

@endsection
