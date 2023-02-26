<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Menu;
use App\Models\Mutasi;
use App\Models\Restock;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('petugas_id')) {
            $order = Order::where('petugas_id', 'LIKE', '%' . $request->petugas_id . '%')->get();
        }else if($request->has('filter_tanggal')){
            $Day = Carbon::parse($request->filter_tanggal)->format('Y-m-d');
            $order = Order::whereBetween('created_at', [$Day. ' 00:00:00', $Day. ' 23:59:59'])->get();
        }
        else{
            $order = Order::orderBy('created_at','DESC')->get();
        }
        $user = User::where('role','kasir')->orderBy('name')->get();
        return view('pages.manager.catatanTransaksi.index',compact('order','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function laporan()
    {
        // $petugas = User::where('role','kasir')->with('manyOrder')->get();

        $terjual = Order::with('nameMenu')->whereBetween('created_at', [ Carbon::now()->format('Y-m-d'). ' 00:00:00',  Carbon::now()->format('Y-m-d'). ' 23:59:59'])
        ->select(DB::raw('produk_id, SUM(quantity) as terjual ,SUM(jumlah_harga) as jumlah_harga'))
        ->groupBy('produk_id')->get();
        $totalPendapatan = $terjual->sum('jumlah_harga');

        $pdf = PDF::loadview('pages.manager.catatanTransaksi.laporan',compact('terjual','totalPendapatan'));
    	return $pdf->stream('Invoice');
    }
    public function pendapatanBulanIni()
    {
        // $petugas = User::where('role','kasir')->with('manyOrder')->get();
        // $test = now()->format('Y');
        // dd($test);
        $terjual = Order::with('nameMenu')->whereYear('created_at' ,now()->format('Y'))->whereMonth('created_at', now()->format('m'))
        ->select(DB::raw('produk_id, SUM(quantity) as terjual ,SUM(jumlah_harga) as jumlah_harga'))
        ->groupBy('produk_id')->get();
        $totalPendapatan = $terjual->sum('jumlah_harga');

        $pdf = PDF::loadview('pages.manager.catatanTransaksi.laporanBulanIni',compact('terjual','totalPendapatan'));
    	return $pdf->stream('Invoice');
    }
    public function invoice($id)
    {
        $setting = Setting::get()->first();
        
        $order = Order::join('menus', 'menus.id','=', 'orders.produk_id')->where('orders.code_transaksi',$id)->get();
        
        $totalAmount =  Order::where('code_transaksi',$id)->sum('jumlah_harga');
        return view('pages.manager.catatanTransaksi.invoice',compact('order','totalAmount','setting', 'id'));
    }
    
    public function catatanMutation(Request $request)
    {
        
        // $list_produk = Order::join('menus', 'menus.id','=', 'orders.produk_id')->select(DB::raw('produk_id, SUM(quantity) as terjual, menus.*'))->groupBy('produk_id')->get();
       
        $list_produk = Mutasi::select('mutasi.tgl_mutasi','mutasi.stok_awal','mutasi.barang_masuk', 'mutasi.barang_keluar', 'mutasi.produk_id', 'menus.name', 'menus.satuan')->join('menus', 'menus.id', '=', 'mutasi.produk_id')->get();
        
        // $data_mateng = [];
        // foreach($list_produk as $lp){
        //     $check_order = Order::where('created_at', '=', $lp->created_at)->select(DB::raw('SUM(quantity) as terjual'))->first();
        //     $a["terjual"] = $check_order->terjual;
        //     $a['stok_masuk'] = $lp->quantity;
        //     $a['created_at'] = Carbon::parse($lp->created_at)->toString();
        //     $data_mateng[] = $a;
        // }
        
        // dd($data_mateng);
        
        //dd($list_produk);
        return view('pages.manager.catatanTransaksi.mutation', compact('list_produk'));
    }
    public function catatanMutationReport(Request $request)
    {

        $list_produk = Mutasi::select('mutasi.tgl_mutasi','mutasi.stok_awal','mutasi.barang_masuk', 'mutasi.barang_keluar', 'mutasi.produk_id', 'menus.name', 'menus.satuan')->join('menus', 'menus.id', '=', 'mutasi.produk_id')->get();
        
        $pdf = PDF::loadview('pages.manager.catatanTransaksi.reportmutation',compact('list_produk'));
    	return $pdf->stream('Mutasi');
    }
    
    
}
