@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('activity') }}
@endsection
@section('subhead')
<title>Add New User</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')




<!-- END: Modal CREATED -->
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Activity Log</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button class="btn btn-primary shadow-md mr-2">Tambah akun baru</button> --}}
        {{-- <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Ekpor ke Excel
        </button> --}}

    {{-- </a>
        <a href="javascript:;" class="tooltip btn btn-primary shadow-md mr-2" title="Add New User" data-toggle="modal"
            data-target="#add_user">
            <i class="w-4 h-4" data-feather="plus"></i>
        </a> --}}

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
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">No</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Name User</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Deskripsi</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Time</th>
                        {{-- <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Tindakan</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activity as $item)
                    <tr class="hover:bg-gray-200">
                        <td class="border">{{ $loop->iteration }}</td>
                        <td class="border">{{ $item->userActi->name }}</td>
                        <td class="border"> <span class=" text-xs btn btn-rounded btn-primary-soft">{{ $item->description }}</span></td>
                        <td class="border"> <span class=" text-xs btn btn-rounded btn-danger-soft">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END: HTML Table Data -->
@endsection
