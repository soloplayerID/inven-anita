@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('customReport') }}
@endsection
@section('subhead')
<title>Report</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Generate Laporan</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
    </div>
</div>
<div class="grid grid-cols-6 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-7">
        <div class="intro-y col-span-6 lg:col-span-5 mt-4" style="margin-top: 20px">
            <!-- BEGIN: Single File Upload -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Generate Laporan Pendapatan
                    </h2>

                </div>
                <form enctype="multipart/form-data" method="POST" action="{{ route('customReport') }}">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class=" grid grid-cols-12 gap-4 gap-y-3 box p-4 mt-2">
                        <div class="col-span-5 sm:col-span-6"> <label for="modal-datepicker-1"
                                class="form-label">From</label> <input id="modal-datepicker-1"
                                class="datepicker form-control" name="form" data-single-mode="true"> </div>
                        <div class="col-span-5 sm:col-span-6"> <label for="modal-datepicker-2"
                                class="form-label">To</label> <input id="modal-datepicker-2"
                                class="datepicker form-control" name="to" data-single-mode="true"> </div>
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

@endsection
