@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('menu') }}
@endsection
@section('subhead')
<title>Product Menu</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Data Barang</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button class="btn btn-primary shadow-md mr-2">Add New User</button> --}}
        <a href="javascript:;" class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false" title="Add New" data-toggle="modal"
            data-target="#add_report">
            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export Excel
        </a>

        </a>
        <a href="javascript:;" class="tooltip btn btn-primary shadow-md mr-2" title="Add New" data-toggle="modal"
            data-target="#add_menu">
            <i class="w-4 h-4" data-feather="plus"></i>
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
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Nama Product</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Stock</th>
                        <!--<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Stock Awal</th>-->
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Satuan</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Harga</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menu as $item)
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">{{ $loop->iteration }}</td>
                        <td class="border">{{ $item->name }}</td>
                        <td class="border text-center">
                            @if ($item->stock == 0 )
                            <span class=" text-xs btn btn-rounded btn-danger-soft">Habis</span>
                            @elseif($item->stock <= 50 ) <span class=" text-xs btn btn-rounded btn-warning-soft">
                                {{ $item->stock }}</span>
                                @else
                                <span class=" text-xs btn btn-rounded btn-success-soft">{{ $item->stock }}</span>
                                @endif
                        </td>

                        <td class="border"> {{ $item->satuan }}</td>
                        <td class="border">
                            RP. {{ number_format($item->harga) }}
                        </td>
                        <td class="border">
                            <a href="javascript:;" class="tooltip btn bg-blue-300 shadow-md mr-2" title="Detail Menu"
                                data-toggle="modal" data-target="#detail-{{ $item->id }}">
                                <i class="w-4 h-4 " data-feather="eye"></i>
                            </a>
                            <a href="javascript:;" class="tooltip btn btn-warning-soft shadow-md mr-2"
                                title="Edit" data-toggle="modal" data-target="#edit-{{ $item->id }}">
                                <i class="w-4 h-4" data-feather="edit-2"></i>
                            </a>
                            <a href="javascript:;" class="tooltip btn btn-danger-soft shadow-md mr-2"
                                title="Delete" data-toggle="modal" data-target="#delete-{{ $item->id }}">
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
@foreach ($menu as $item)
<div id="detail-{{ $item->id }}" data-backdrop="static" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Detail Menu</h2>
                <a data-dismiss="modal" href="javascript:;"> <i data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>
            </div> <!-- END: Modal Header -->

            <!-- BEGIN: Modal Body -->
            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-6">
                    @if ($item->gambar == null)
                    <img style="width: 300px" src="{{ asset('imageComponent/download.png') }}" alt="">
                    @else

                    <img style="width: 300px" src="{{ asset('/fotoMenu/'.$item->gambar) }}" alt="">
                    @endif
                </div>
                <div class="col-span-6">
                    <div class="intro-y box p-5 mt-5 ">
                    <table style="width: 100% ;" class="p-5">
                        <tr>
                            <td colspan="2" > Nama Produk</td>
                            <td colspan="6">: {{$item->name}}</td>

                        </tr>
                        <tr>
                            <td colspan="2">Kategori </td>
                            @if ($item->kategori_id == null)
                            <td colspan="6">: Kategori Belum Di pilih</td>
                            @else
                            <td colspan="6">: {{$item->kategori->name}}</td>
                            @endif

                        </tr>

                        <tr>
                            <td colspan="2">Deskripsi </td>
                            <td colspan="6">: {{$item->deskripsi}}</td>

                        </tr>
                        <tr>
                            <td colspan="2">Harga Jual </td>
                            <td colspan="6">: RP. {{number_format($item->harga)}}</td>

                        </tr>
                        <tr>
                            <td colspan="2">Harga Beli</td>
                            <td colspan="6">: RP. {{number_format($item->harga_beli)}}</td>

                        </tr>

                        <tr>
                            <td colspan="2">stock </td>
                            <td colspan="6">: {{number_format($item->stock)}}</td>

                        </tr>
                    </table>
                    </div>
                </div>



            </div> <!-- END: Modal Body -->

            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer text-right">
                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>

            </div>

        </div>
    </div>
</div>
@endforeach
@foreach ($menu as $item)
<div id="edit-{{ $item->id }}" data-backdrop="static" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Edit Menu Baru</h2>
            </div> <!-- END: Modal Header -->

            {{-- Form --}}
            <form enctype="multipart/form-data" action="{{ route('menu.update',$item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Nama Produk</label>
                        <input name="name" id="modal-form-1" type="text" required class="form-control"
                            placeholder="inputkan nama" value="{{ $item->name }}">

                    </div>
                    <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Kategori</label>
                        <select id="kategori" class="select_user form-select" required name="kategori">
                            <option disabled="true" selected="true">--- Pilih Kategori ---</option>
                            @foreach ($kategori as $items)
                            <option value="{{ $items->id  }}" {{ $items->id == $item->kategori_id ? 'selected' : ''}}>{{ $items->name }}</option>

                            @endforeach
                            {{-- <option value="minuman" {{"minuman" == $item->kategori ? 'selected' : ''}}>Minuman</option> --}}

                        </select>
                    </div>
                    <div class="col-span-12">
                        <label>Deskripsi</label>

                        <textarea type="text" class="form-control" name="deskripsi">{{ $item->deskripsi }}</textarea>
                    </div>
                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Harga Jual</label>
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">RP</div>
                            <input type="number" class="form-control" name="harga" value="{{ $item->harga }}"
                                placeholder="Unit" aria-describedby="input-group-3">
                        </div>
                    </div>
                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Harga Beli</label>
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">RP</div>
                            <input type="number" class="form-control" name="harga_beli" value="{{ $item->harga_beli }}"
                                placeholder="Unit" aria-describedby="input-group-3">
                        </div>
                    </div>

                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Quantity / Stock</label>
                        <div class="input-group">
                            <input id="stock" name="stock" type="number" class="form-control" value="{{ $item->stock }}"
                                placeholder="Quantity" aria-describedby="input-group-1">

                        </div>
                    </div>


                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Satuan</label>
                        <div class="input-group">
                            <input id="satuan" name="satuan" type="text" class="form-control" value="{{ $item->satuan }}"
                                placeholder="Satuan" aria-describedby="input-group-1">

                        </div>
                    </div>

                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Gambar</label>
                        <input name="gambar" type="file">
                    </div>

                    {{-- <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Code Pembayaran</label>
                        <input name="code" id="modal-form-1" type="text" readonly value="{{ $code }}"
                    class="form-control" placeholder="inputkan code">
                </div> --}}


        </div> <!-- END: Modal Body -->

        <!-- BEGIN: Modal Footer -->
        <div class="modal-footer text-right">
            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
            <button type="submit" class="btn btn-primary w-20">Send</button>
        </div>
        </form>
    </div>
</div>
</div>
@endforeach
@foreach ($menu as $deletemenu)
<!-- BEGIN: Modal Content -->
<div id="delete-{{ $deletemenu->id }}" class="modal" data-backdrop="static" tabindex="-1" aria-hidden="true">
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
                    <form action="{{ route('menu.destroy',$deletemenu->id) }}" method="post">
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
<div id="add_menu" data-backdrop="static" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Tambah Menu Baru</h2>
            </div> <!-- END: Modal Header -->

            {{-- Form --}}
            <form enctype="multipart/form-data" action="{{ route('menu.store') }}" method="POST">
                @csrf
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Nama Produk</label>
                        <input name="name" id="modal-form-1" type="text" required class="form-control"
                            placeholder="inputkan nama">

                    </div>
                    <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Kategori</label>
                        <select id="kategori" class="select_user form-select" required name="kategori">
                            <option disabled="true" selected="true">--- Pilih Kategori ---</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            {{-- <option value="minuman">Minuman</option> --}}

                        </select>
                    </div>
                    <div class="col-span-12">
                        <label>Deskripsi</label>

                        <textarea type="text" class="form-control" name="deskripsi"></textarea>
                    </div>
                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Harga Jual</label>
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">RP</div>
                            <input type="number" class="form-control" name="harga" placeholder="Unit"
                                aria-describedby="input-group-3">
                        </div>
                    </div>
                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Harga Beli</label>
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">RP</div>
                            <input type="number" class="form-control" name="harga_beli" placeholder="Total"
                                aria-describedby="input-group-3">
                        </div>
                    </div>

                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Quantity / Stock</label>
                        <div class="input-group">
                            <input id="stock" name="stock" type="number" class="form-control" placeholder="Quantity"
                                aria-describedby="input-group-1">

                        </div>
                    </div>



                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Satuan</label>
                        <div class="input-group">
                            <input id="satuan" name="satuan" type="text" class="form-control" placeholder="Satuan"
                                aria-describedby="input-group-1">

                        </div>
                    </div>

                    <div class="col-span-6">
                        <label for="crud-form-3" class="form-label">Gambar</label>
                        <input name="gambar" type="file">
                    </div>

                    {{-- <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Code Pembayaran</label>
                        <input name="code" id="modal-form-1" type="text" readonly value="{{ $code }}"
                    class="form-control" placeholder="inputkan code">
                </div> --}}


        </div> <!-- END: Modal Body -->

        <!-- BEGIN: Modal Footer -->
        <div class="modal-footer text-right">
            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
            <button type="submit" class="btn btn-primary w-20">Send</button>
        </div>
        </form>
    </div>
</div>
</div>
<div id="add_report" data-backdrop="static" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Print report product</h2>
            </div> <!-- END: Modal Header -->

            {{-- Form --}}
            <form enctype="multipart/form-data" action="{{ route('reportStock') }}" method="GET">
                @csrf
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <div class="col-span-6">
                        <label for="modal-form-1" class="form-label">Kategori</label>
                        <select id="kategori" class="select_user form-select" required name="kategori">
                            <option disabled="true" selected="true">--- Pilih Kategori ---</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            {{-- <option value="minuman">Minuman</option> --}}

                        </select>
                    </div>
                    


        </div> <!-- END: Modal Body -->

        <!-- BEGIN: Modal Footer -->
        <div class="modal-footer text-right">
            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
            <button type="submit" class="btn btn-primary w-20">print</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
