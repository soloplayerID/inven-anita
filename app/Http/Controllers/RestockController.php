<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Menu;
use App\Models\Setting;
use Carbon\Carbon;
use App\Models\Mutasi;
use PDF;
use App\Models\Restock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class RestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restock = Restock::orderBy('created_at','DESC')->take(5)->get();
        $supplier = Supplier::orderBy('name','DESC')->get();
        $no = 1;
        $menu = Menu::orderBy('name')->get();
        return view('pages.manager.restock.index',compact('restock','no','menu','supplier'));
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
        // dd($request);
        $restock = new Restock();
        $restock->menu_id = $request->menu_id;
        $restock->supplier_id = $request->supplier_id;
        $restock->harga_beli_satuan = $request->harga_beli_satuan;
        $restock->quantity = $request->quantity;
        $restock->total_harga = $request->total_harga;
        $menu_id = $request->menu_id;
        $menu = Menu::findOrfail($menu_id);
        
        
        // $menu = Menu::where('id',$request->menu_id)->get();
        
        
        $check_mutasi = Mutasi::where('produk_id', $request->menu_id)->whereDate('tgl_mutasi', date('Y-m-d'))->first();
                    if($check_mutasi != null){
                        //update
                        Mutasi::where('produk_id', $request->menu_id)->where('tgl_mutasi', date('Y-m-d'))->update(['barang_masuk'=> $check_mutasi->barang_masuk+$request->quantity]);
                    }else{
                        //insert
                        $datastok = Menu::where('id',$request->menu_id)->first();
                        Mutasi::create(['tgl_mutasi'=> date('Y-m-d'), 'produk_id'=> $request->menu_id, 'stok_awal'=> $menu->stock, 'barang_masuk'=> $request->quantity]);
                        
                    }
        $menu->stock += $request->quantity;
        $restock->save();
        $menu->save();
        Activity()->log('Restock Product');
        return back()->with('success','Restock Product Berhasil');

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
        $restock = Restock::findOrFail($id);
        $restock->delete();
        return back()->with('success','Data Berhasil Di Hapus');
    }
    public function report_barang_masuk(Request $request)
    {
        // $order = Order::where('code_transaksi',$id)->get();
        $startDay_d = explode("-",Carbon::parse($request->form)->format('Y-m-d')) ;
        $endDay_d = explode("-",Carbon::parse($request->to)->format('Y-m-d'));
        $date = preg_replace('/\(.*\)$/', '', $request->form);
        $startDay = explode(", ", $request->form)[1]."-".$startDay_d[1]."-".$startDay_d[2];
        $endDay = explode(", ", $request->to)[1]."-".$endDay_d[1]."-".$endDay_d[2];
        
        $restock = Restock::whereBetween('created_at', [$startDay. ' 00:00:00', $endDay. ' 23:59:59'])->get();
        $totalPengeluaran = $restock->sum('total_harga');
        // dd($totalPengeluaran);
        $setting = Setting::get()->first();
        // $jumlahHarga = Order::where('code_transaksi',$id)->sum('jumlah_harga');
        $pdf = PDF::loadview('pages.manager.restock.report',compact('restock','startDay','endDay','totalPengeluaran', 'setting'));
    	return $pdf->stream('Laporan Barang Masuk ' . $startDay ."". $endDay);
    }
}
