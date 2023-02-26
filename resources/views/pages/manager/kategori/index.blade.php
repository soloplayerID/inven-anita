@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('kategori') }}
@endsection
@section('subhead')
<title>Kategori Product</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Data Kategori</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button class="btn btn-primary shadow-md mr-2">Add New User</button> --}}
        {{-- <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export Excel
        </button> --}}

        </a>
        <a href="javascript:;" class="tooltip btn btn-primary shadow-md mr-2" title="Add New User" data-toggle="modal"
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
            <table class="table">
                <thead>
                    <tr>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center ">No</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Nama Kategori</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">{{ $loop->iteration }}</td>
                        <td class="border">{{ $item->name }}</td>

                        <td class="border">
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
                        <td class="border text-center" colspan="5">Kategori Masih Kosong</td>
                    </tr>
                    @endforelse



                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- modals Delete --}}
@foreach ($kategori as $delete)
<div id="delete-{{ $delete->id }}" class="modal" data-backdrop="static" tabindex="-1" aria-hidden="true">
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
                <form action="{{ route('kategori.destroy',$delete->id) }}" method="post">
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
{{-- end Modals Delete --}}

{{-- edit kategori --}}
@foreach ($kategori as $item)
<div id="edit-{{ $item->id }}" data-backdrop="static" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Edit Kategori</h2>
            </div> <!-- END: Modal Header -->

            {{-- Form --}}
            <form enctype="multipart/form-data" action="{{ route('kategori.update',$item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label for="modal-form-1" class="form-label">Nama Kategori</label>
                        <input name="name" id="modal-form-1" value="{{ $item->name }}" type="text" required class="form-control"
                            placeholder="inputkan nama kategori">
                    </div>
                </div> <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer text-right">
                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
{{-- end edit kategori --}}

{{-- add Modals --}}
<div id="add_menu" data-backdrop="static" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Tambah Kategori Baru</h2>
            </div> <!-- END: Modal Header -->

            {{-- Form --}}
            <form enctype="multipart/form-data" action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label for="modal-form-1" class="form-label">Nama Kategori</label>
                        <input name="name" id="modal-form-1" type="text" required class="form-control"
                            placeholder="inputkan nama kategori">
                    </div>
                </div> <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer text-right">
                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end add modals --}}

@endsection
