@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('catatanMutation') }}
@endsection
@section('subhead')
<title>Mutasi Barang</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">


        </form>
        <div class="flex mt-5 sm:mt-0">


        </div>
    </div>
    
    
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Data Mutasi</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            
            <a href="{{ route('mutationreport') }}" target="_blank" class="tooltip btn btn-primary-soft shadow-md ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer w-4 h-4"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                Print
            </a>
    
    
        </div>
    </div>
    <br>
    
    <div class="overflow-x-auto scrollbar-hidden">
        <div class="overflow-x-auto">
            <table class="table" id="dataTable2">
                <thead>
                    <tr>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center ">No</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Tgl Mutasi
                        </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Nama Barang
                        </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Satuan Barang/Unit
                        </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Stok Awal
                        </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Barang Masuk
                        </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Barang Keluar
                        </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Stok Akhir
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($list_produk as $lp)
                    @php
                    $barangmasuk = \App\Models\Restock::select(DB::raw('SUM(quantity) as barangmasuk'))
                        ->where('menu_id', $lp->produk_id)->first();
                    
                    @endphp
                    <tr>
                    <td class="border text-center">{{ $i++}}</td>
                    <td class="border">{{$lp->tgl_mutasi}}</td>
                    <td class="border">{{$lp->name}}</td>
                    <td class="border">{{$lp->satuan}}</td>
                    <td class="border">{{$lp->stok_awal}}</td>
                    <td class="border">{{$lp->barang_masuk}}</td>
                    <td class="border">{{$lp->barang_keluar}}</td>
                    <td class="border">{{($lp->stok_awal+$lp->barang_masuk)-$lp->barang_keluar}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Datatable JS -->
   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
   
   <script>
    $(document).ready(function(){
        $('#dataTable2').DataTable();
    //       var empDataTable = $('#dataTable2').DataTable({
    //          dom: 'Blfrtip',
    //         //  buttons: [
    //         //   {  
    //         //       extend: 'copy'
    //         //   },
    //         //   {
    //         //       extend: 'pdf',
    //         //       exportOptions: {
    //         //         columns: [0,1,2,3,4,5,6,7] // Column index which needs to export
    //         //       }
    //         //   },
    //         //   {
    //         //       extend: 'csv',
    //         //   },
    //         //   {
    //         //       extend: 'excel',
    //         //   } 
    //         //  ] 
        
    //       });
        
    });
   </script>
@endsection