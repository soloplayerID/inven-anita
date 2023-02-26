@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('settingAplication') }}
@endsection

@section('subhead')
<title>Add New User</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')
<!-- END: Modal CREATED -->
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Settings Aplication</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button class="btn btn-primary shadow-md mr-2">Add New User</button> --}}
        {{-- <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export Excel
        </button> --}}

        </a>


    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
        <div class="flex mt-5 sm:mt-0">


        </div>
    </div>
    <div class="overflow-x-auto scrollbar-hidden">
        <div class="overflow-x-auto">
            <form action="{{ route('settingsAplication.update',1) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-span-12">
                    <label for="modal-form-1" class="form-label">Nama Aplikasi</label>
                    <input name="name" id="modal-form-1" type="text" required class="form-control"
                        placeholder="inputkan nama Aplikasi" value="{{ $setting->name_application }}">
                </div>
           
                <div class="col-span-12 mt-3">
                    <label for="modal-form-1" class="form-label">Logo Aplikasi</label>
                    {{-- @foreach ($setting as $item)
                    @endforeach --}}
                        @if ($setting->logo == null)
                        <img style="width: 150px" src="{{ asset('imageComponent/download.png') }}" alt="{{ $setting->name }}">
                        @else
                        <img alt="{{ $setting->logo }}" src="{{ asset('/fotoSetting/' . $setting->logo) }}">
                        @endif
               
                    <input name="logo" id="modal-form-1" type="file"  class="form-control mt-3"
                        placeholder="inputkan nama Aplikasi">
                </div>
                <button type="submit" class="btn btn-primary w-20 mt-5 float-right">Chage</button>
                

            </form>
        </div>
    </div>
</div>
<!-- END: HTML Table Data -->
@endsection
