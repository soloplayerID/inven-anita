@extends('../layout/side-menu')
@section('tanda')
{{ Breadcrumbs::render('pos') }}
@endsection
@section('subhead')
<title>Transaksi</title>
@endsection

@section('subcontent')
@include('sweetalert::alert')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Point of Sale</h2>

</div>
{{-- @php
if(!isset($_GET['kategori'])){$_GET['kategori']=[];}
@endphp --}}
<div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
    <!-- BEGIN: Item List -->
    <div class="intro-y col-span-12 lg:col-span-8">
        <div class="lg:flex intro-y">
            <div class="relative text-gray-700 dark:text-gray-300">
                <input id="search" type="text"
                    class="form-control py-3 px-4 w-full lg:w-64 box pr-10 placeholder-theme-13"
                    placeholder="Search item...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
        <form class="grid grid-cols-12 gap-5 mt-5" method="get">
            <button type="submit" name="kategori" value="allmenu" class="col-span-12 {{ Request::get('kategori')=='allmenu'?'bg-theme-1 dark:bg-theme-1':'' }} sm:col-span-4 xxl:col-span-3 box p-5 cursor-pointer zoom-in">
                <div class="font-medium text-base {{ Request::get('kategori')=='allmenu'?'text-white':'text-gray' }}">All Menu</div>
                <div class="text-gray-500">{{ $countAll }} Items</div>
            </button>
            @foreach ($kategori as $item)
            <button type="submit" name="kategori_id" value="{{ $item->kategori_id }}" class="col-span-12 {{ Request::get('kategori_id')==$item->kategori_id?'bg-theme-1 dark:bg-theme-1':'' }} sm:col-span-4 xxl:col-span-3 box p-5 cursor-pointer zoom-in">
                <div class="font-medium text-base {{ Request::get('kategori_id')==$item->kategori_id?'text-white':'text-gray' }}">{{ $item->kategori->name }}</div>
                <div class="text-gray-500">{{ $item->total }} Items</div>
            </button>
            @endforeach
        </form>

        <div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t border-theme-5" id="produk">
            @foreach ($menu as $item)
            @if ($item->stock == 0)

            @else
            <a href="javascript:;" data-toggle="modal" data-target="#add-item-modal-{{ $item->id }}"
                class="intro-y block col-span-12 sm:col-span-4 xxl:col-span-3">
                <div class="box rounded-md p-3 relative zoom-in">
                    <div class="flex-none pos-image relative block">
                        <div class="pos-image__preview image-fit">
                            @if ($item->gambar == null)
                            <img src="{{ asset('imageComponent/download.png') }}" alt="{{ $item->name }}">
                            @else
                            <img alt="{{ $item->name }}" src="{{ asset('/fotoMenu/' . $item->gambar) }}">
                            @endif
                        </div>
                    </div>
                    <div class="block font-medium text-center truncate mt-3">{{ $item->name }}</div>
                    <div class="block font-medium text-center truncate mt-3">Stock :
                        @if ($item->stock <= 50 ) <span class=" text-xs  text-theme-9 ">{{ $item->stock }}</span>
                            @else
                            <span class=" text-xs  text-theme-9">{{ $item->stock }}</span>
                            @endif
                    </div>
                    <div class="block font-medium text-center truncate mt-3">Harga :
                        RP.{{ number_format($item->harga) }}</div>

                </div>
            </a>
            @endif

            @endforeach
        </div>
    </div>
    <!-- END: Item List -->
    <!-- BEGIN: Ticket -->
    <div class="col-span-12 lg:col-span-4">
        <div class="intro-y pr-1">
            <div class="box p-2">
                <div class="pos__tabs nav nav-tabs justify-center" role="tablist">
                    <a id="ticket-tab" data-toggle="tab" data-target="#ticket" href="javascript:;"
                        class="flex-1 py-2 rounded-md text-center active" role="tab" aria-controls="ticket"
                        aria-selected="true">Ticket</a>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="ticket" class="tab-pane active" role="tabpanel" aria-labelledby="ticket-tab">
                <div class="pos__ticket box p-2 mt-5">
                    @forelse ($keranjang as $item)
                    <a href="javascript:;" data-toggle="modal" data-target="#update-item-{{ $item->id }}" id="test"
                        class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
                        <div class="pos__ticket__item-name truncate mr-1 name">{{ $item->menuName->name }}</div>
                        <div class="text-gray-600">x {{ $item->quantity }}</div>
                        <i data-feather="edit" class="w-4 h-4 text-gray-600 ml-2"></i>
                        <div class="ml-auto font-medium">RP. {{ number_format($item->jumlah_harga) }} </div>
                    </a>
                    {{-- <i data-feather="edit" class="w-4 h-4 text-gray-600 ml-2"></i> --}}
                    @empty
                    <p class="text-center">Keranjang Masih Kosong</p>
                    @endforelse

                </div>
                {{--<form class="checkout">--}}
                {{--<form method="POST" action="" id="formdata">--}}
                    @csrf
                    
                    <div class="box flex p-5 mt-5">
                        <div class="w-full relative text-gray-700">
                            <label for="modal-form-1" class="form-label">Name</label>
                            <select 
                                class="form-select py-3 px-4 w-full bg-gray-200 border-gray-200 pr-10 placeholder-theme-13"
                                required name="customer_id" id="customer_id">
                                <option selected="true"> Pilih Customer </option>
                                <option value="tambah_user_baru">[+] User Baru</option>
                                @foreach ($customer as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              

                            </select>
                            <input type="text"
                                class="form-control py-3 px-4 w-full bg-gray-200 mt-5 border-gray-200 pr-10 placeholder-theme-13"
                                name="nameCustomer" id="nameCustomer"  style="display: none" placeholder="Customer Name">
                          
                            <label for="modal-form-1" class="form-label mt-2">Jenis Pembayaran</label>
                            {{--<input type="hidden" value="INV{{ rand() }}" name="code_transaksi">--}}

                            <select
                                class="form-select py-3 px-4 w-full bg-gray-200 border-gray-200 pr-10 placeholder-theme-13"
                                required name="jenis_pembayaran" id="jenis_pembayaran">
                                <option selected="true"> Pilih Jenis Pembayaran </option>
                                <option value="1">Cash</option>
                                @if (isset($setting->midtrans_server_key) )
                                <option value="2">Transfer</option>
                                @endif

                            </select>
                        </div>
                        {{-- <button class="btn btn-primary ml-2">Apply</button> --}}
                    </div>
                    <div class="box p-5 mt-5">
                        <div class="flex">

                            <div class="mr-auto">Subtotal</div>
                            <div class="font-medium">RP. {{ number_format($subTotal) }}</div>
                        </div>
                        {{-- <div class="flex mt-4">
                            <div class="mr-auto">Tax</div>
                            <div class="font-medium text-theme-6">5%</div>
                        </div> --}}
                        {{-- <div class="flex mt-4">
                        <div class="mr-auto">Tax</div>
                        <div class="font-medium">15%</div>
                    </div> --}}
                        <div class="flex mt-4 pt-4 border-t border-gray-200 dark:border-dark-5">

                            <div class="mr-auto font-medium text-base">Total Charge</div>
                            <input type="hidden"  name="subtotal" id="subtotal" value="{{ $subTotal }}">
                            <div class="font-medium text-base">RP .{{ number_format($subTotal) }}</div>
                        </div>
                    </div>
                    <div class="flex mt-5">
                        {{-- <form method="POST" action="{{ route('destroyAll',Auth::user()->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn w-32 border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-300"
                            type="submit">Clear Items</button>
                </form> --}}
                <a class="btn w-32 border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-300"
                    href="{{ route('destroyAll',Auth::user()->id) }}">Clear Items</a>
                <button class="btn btn-primary w-32 shadow-md ml-auto bayar" >Bayar</button>
            </div>
            {{--</form>--}}
        </div>

    </div>
</div>
<!-- END: Ticket -->
</div>
<!-- BEGIN: New Order Modal -->
<!-- END: New Order Modal -->
<!-- BEGIN: Add Item Modal -->
@foreach ($menu as $item)

<div id="add-item-modal-{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">{{ $item->name }}</h2>
            </div>
            <form method="POST" action="{{ route('addKeranjang',$item->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <div class="col-span-6">
                        <label for="pos-form-4" class="form-label">Quantity</label>
                        <div class="flex mt-2 flex-1">
                            {{-- <input id="subs" class="btn w-12 border-gray-300 bg-gray-200 dark:bg-dark-1 text-gray-600 dark:text-gray-300 mr-1" type="button" value="-"> --}}
                            <button  type="button" field="quantity"
                                class="qtyminus btn w-12 border-gray-300 bg-gray-200 dark:bg-dark-1 text-gray-600 dark:text-gray-300 mr-1">-</button>
                            <input id="pos-form-4 quantity" type="text" class="form-control w-24 text-center"
                                placeholder="Item quantity" name="quantity" required value="">
                            <button type="button" field="quantity"
                                class="qtyplus btn w-12 border-gray-300 bg-gray-200 dark:bg-dark-1 text-gray-600 dark:text-gray-300 ml-1">+</button>
                        </div>
                    </div>
                    <div class="col-span-6">
                        <label for="pos-form-4" class="form-label">Satuan</label>
                        <div class="flex mt-2 flex-1">
                            <span class="text-xs btn btn-rounded-success">{{ $item->satuan }}</span>
                        </div>
                    </div>
                    <div class="col-span-12">
                        <label for="pos-form-5" class="form-label">Notes</label>
                        <textarea id="pos-form-5" name="note" class="form-control w-full mt-2"
                            placeholder="Item notes"></textarea>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-24">Add Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@foreach ($keranjang as $item)

<div id="update-item-{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">{{ $item->menuName->name }}</h2>
                <form action="{{ route('destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button  class="tooltip text-theme-6 dark:text-gray-300" title="Delete ? "><i data-feather="trash-2"></i></button>
                </form>
                {{-- <a class="tooltip text-theme-6 dark:text-gray-300" title="Delete ? "
                    href="{{ route('destroyAll',Auth::user()->id) }}"><</a> --}}
                {{-- <h2 class="font-medium text-base mr-auto">{{ $item->menuName->name }}</h2> --}}
            </div>
            <form method="POST" action="{{ route('updateKeranjang',$item->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <div class="col-span-12">
                        <label for="pos-form-4" class="form-label">Quantity</label>
                        <div class="flex mt-2 flex-1">
                            {{-- <button type="button"
                                class="btn w-12 border-gray-300 bg-gray-200 dark:bg-dark-1 text-gray-600 dark:text-gray-300 mr-1">-</button> --}}
                            <input id="pos-form-4" type="text" class="form-control w-24 text-center"
                                placeholder="Item quantity" name="quantity" value="{{ $item->quantity }}">
                            {{-- <button type="button"
                                class="btn w-12 border-gray-300 bg-gray-200 dark:bg-dark-1 text-gray-600 dark:text-gray-300 ml-1">+</button> --}}
                        </div>
                    </div>
                    <div class="col-span-12">
                        <label for="pos-form-5" class="form-label">Notes</label>
                        <textarea id="pos-form-5" name="note" class="form-control w-full mt-2"
                            placeholder="Item notes">{{ $item->note }}</textarea>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-24">Add Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END: Add Item Modal -->

<!--<div id="buyyy" class="modal" data-backdrop="static" tabindex="-1" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-body p-0">-->
<!--                <div class="p-5 text-center"> <i data-feather="x-circle"-->
<!--                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>-->
<!--                    <div class="text-3xl mt-5">Are you sure?</div>-->
<!--                    <div class="text-gray-600 mt-2">Anda ingin melanjutkan pembayaran? <br>This process cannot-->
<!--                        be undone.</div>-->
<!--                </div>-->
<!--                <div class="px-5 pb-8 text-center flex items-center justify-center">-->

<!--                    <button type="button" data-dismiss="modal"-->
<!--                        class="btn btn-outline-secondary w-24 mr-1">TIDAK</button>-->
<!--                    <form action="https://new-inventory.all.yakin.pw/order/destroyCode/INV959839187" method="post">-->
<!--                        <input type="hidden" name="_token" value="mXXJdreTRMrzuDpTim0qUfuvlbQHyeBB9BXPtQY3">                        <input type="hidden" name="_method" value="YAKIN">                        <button class="btn btn-danger w-24"> Hapus </button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(document).ready(function () {
        $('#customer_id').select2().on('change', function () {
            // alert( this.value );
            if (this.value == 'tambah_user_baru') {
                $('#nameCustomer').show()
            } else {
                $('#nameCustomer').hide()
            }
        });
        $("#search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#produk a").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            // alert(value)
        });
        // $("#makanan").click(function () {
        //     $("#kategori").val("makanan");
        //     $("#filter").submit();
        // });
        // $("#minuman").click(function () {
        //     $("#kategori").val("minuman");
        //     $("#filter").submit();Keranjang Masih Kosong
        // });
        $("#allmenu").click(function () {
            $("#kategori").val("allmenu");
            $("#filter").submit();
        });
        
        
        // $("#allmenu").clickSwal.fire({
        //   title: 'Do you want to save the changes?',
        //   showDenyButton: true,
        //   showCancelButton: true,
        //   confirmButtonText: 'Save',
        //   denyButtonText: `Don't save`,
        // }).then((result) => {
        //   /* Read more about isConfirmed, isDenied below */
        //   if (result.isConfirmed) {
        //     Swal.fire('Saved!', '', 'success')
        //   } else if (result.isDenied) {
        //     Swal.fire('Changes are not saved', '', 'info')
        //   }
        // })

// This button will increment the value
$('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    
    // $(".bayar").on("click", function(e) {
    //     $flag = $(this).attr('data-flag');
    
    //     if($flag==0){
    //         e.preventDefault(); //to prevent submitting
    
    //         Swal.fire({
    //             title: "Confirmation",
    //             text: "Anda Yakin Melanjutkan Pembayaran ?",
    //             type: "warning",
    //             showCancelButton: true,
    //             confirmButtonColor: "#cc3f44",
    //             confirmButtonText: "YAKIN",
    //             closeOnConfirm: true,
    //             cancelButtonText: "TIDAK",
    //             html: false
    //         }, function( confirmed ) {
    //             if( confirmed ){
    //                 // if confirmed change the data-flag to 1 (as true), to submit
    //                 $('.checkout').attr('data-flag', '1');
    //                 $('.checkout').submit();
    //             }
    //         });
    //     }
    
    //     return true;
    // });
    
    // $('#formdata').attr('action', '{{ route("addOrder") }}');
    // $("#formdata").submit(function(e) {
        
    //     e.preventDefault();    
    //     var formData = new FormData(this);
    
    //     $.ajax({
    //         url: {{ route("addOrder") }},
    //         type: 'POST',
    //         data: formData,
    //         success: function (data) {
    //             alert(data)
    //         },
    //         cache: false,
    //         contentType: false,
    //         processData: false
    //     });
    // });
    // $(".bayar").click(function(e) {
    //     Swal.fire({
    //           title: 'Yakin Melanjutkan Orderan ??',
    //           showDenyButton: false,
    //           showCancelButton: true,
    //           confirmButtonText: 'YA',
    //           denyButtonText: `TIDAK`,
    //           cancelButtonText: 'TIDAK',
              
    //         }).then((result) => {
    //           /* Read more about isConfirmed, isDenied below */
    //           if (result.isConfirmed) {
                
                  
    //           }
    //         });
    //       console.log("BAYAR")
    //     //   
    // });
    $(".bayar").click(function(e) {
        Swal.fire({
              title: 'Yakin Melanjutkan Orderan ??',
              showDenyButton: false,
              showCancelButton: true,
              confirmButtonText: 'YA',
              denyButtonText: `TIDAK`,
              cancelButtonText: 'TIDAK',
              
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                
                  e.preventDefault();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                  
                  $.ajax({
                      url: '{{ route("addOrder") }}',
                      
                      data: {
                            
                            "customer_id": $("#customer_id").val(),
                            "nameCustomer": $("#nameCustomer").val(),
                            "jenis_pembayaran": $("#jenis_pembayaran").val(),
                            "subtotal": $("#subtotal").val()
                      },
                      type: 'POST',        
                      success: function(response) {              
                         var datany = JSON.stringify(response)
                         console.log(datany["code_transaksi"]);
                         console.log(response["status"]);
                         console.log($("#customer_id").val());
                         if(response["status"] == "failed"){
                             Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: response["message"]
                            });
                            console.log(response);
                         }else{
                            Swal.fire({
                              icon: 'success',
                              title: response["message"],
                              
                              
                              
                            });
                            window.location.href = "{{ url('invoice') }}/"+response["code_transaksi"];
                            // .then((result) => {
                            //   /* Read more about isConfirmed, isDenied below */
                            //   if (result.isConfirmed) {
                            //     //   https://new-inventory.all.yakin.pw/invoice/INV1967189806
                            //       window.location.href = "{{ url('invoice') }}/"+response["code_transaksi"];
                            //   }
                            // });
                            
                         }
                    //   document.getElementById("formMhs").reset();
                        //  window.location.href = "{{ url('transaksi') }}";
                      }
                  });
              }
            });
          console.log("BAYAR")
        //   
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });


    });

</script>
@endsection
