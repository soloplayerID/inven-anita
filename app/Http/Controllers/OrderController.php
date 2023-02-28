<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('petugas_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('pages.user.history.index',compact('order'));
    }
    public function destroyCode($id)
    {

        $order = Order::where('code_transaksi',$id)->get();

        foreach ($order as $item) {
            $item->delete();
        }
        Activity()->log('Menghapus Transaksi ' . $id);
        return back()->with('success','Data Telah Di Hapus');
    }

    public function cetakInv($id)
    {
        $order = Order::where('code_transaksi',$id)->get();
        $jumlahHarga = Order::where('code_transaksi',$id)->sum('jumlah_harga');
        $pdf = PDF::loadview('pages.user.history.invoice',compact('order','jumlahHarga'));
    	// return $pdf->stream('Invoice',$id);
        return $pdf->download('Invoice_'.$id.'.pdf');
    }

    public function laporanKasir(Request $request)
    {
        // $order = Order::where('code_transaksi',$id)->get();
        $order = Order::where('petugas_id',Auth::user()->id)->whereBetween('created_at', [ Carbon::now()->format('Y-m-d'). ' 00:00:00',  Carbon::now()->format('Y-m-d'). ' 23:59:59'])->get();
        $totalOrder = Order::groupBy('code_transaksi')->whereBetween('created_at', [Carbon::now()->format('Y-m-d'). ' 00:00:00',  Carbon::now()->format('Y-m-d'). ' 23:59:59'])->count();
        // $produk = Order::whereBetween('created_at', [$startDay. ' 00:00:00', $endDay. ' 23:59:59'])->groupBy('produk_id')->get();
        $terjual =  Order::where('petugas_id',Auth::user()->id)->with('nameMenu')->where('status','SUCCESS')->whereBetween('created_at', [Carbon::now()->format('Y-m-d'). ' 00:00:00',  Carbon::now()->format('Y-m-d'). ' 23:59:59'])
                ->select(DB::raw('produk_id, SUM(quantity) as terjual ,SUM(jumlah_harga) as jumlah_harga'))
                ->groupBy('produk_id')->get();
        $totalPendapatan = $terjual->sum('jumlah_harga');

        // dd($terjual);
        $setting = Setting::get()->first();
        // $jumlahHarga = Order::where('code_transaksi',$id)->sum('jumlah_harga');
        $pdf = PDF::loadview('pages.user.POS.laporanKasir',compact('order','totalOrder','terjual','totalPendapatan','setting'));
    	return $pdf->stream('Invoice');
    }

}
