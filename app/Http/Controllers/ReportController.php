<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.report.index');
    }
    public function custom(Request $request)
    {
        // $order = Order::where('code_transaksi',$id)->get();
        $startDay = Carbon::parse($request->form)->format('Y-m-d') ;
        $endDay = Carbon::parse($request->to)->format('Y-m-d');
        $order = Order::whereBetween('created_at', [$startDay. ' 00:00:00', $endDay. ' 23:59:59'])->get();
        $totalOrder = Order::whereBetween('created_at', [$startDay. ' 00:00:00', $endDay. ' 23:59:59'])->where('status','SUCCESS')->count();
        // $produk = Order::whereBetween('created_at', [$startDay. ' 00:00:00', $endDay. ' 23:59:59'])->groupBy('produk_id')->get();
        $terjual =  Order::with('nameMenu')->where('status','SUCCESS')->whereBetween('created_at', [$startDay. ' 00:00:00', $endDay. ' 23:59:59'])
                ->select(DB::raw('produk_id , SUM(quantity) as terjual ,SUM(jumlah_harga) as jumlah_harga'))
                ->groupBy('produk_id')->get();
        $totalPendapatan = $terjual->sum('jumlah_harga');

        // dd($totalPendapatan);

        // $jumlahHarga = Order::where('code_transaksi',$id)->sum('jumlah_harga');
        $pdf = PDF::loadview('pages.report.custom',compact('order','startDay','endDay','totalOrder','terjual','totalPendapatan'));
    	return $pdf->stream('Invoice');
    }
    public function barangKeluar(Request $request)
    {
        // $order = Order::where('code_transaksi',$id)->get();
        $startDay = Carbon::parse($request->form)->format('Y-m-d') ;
        $endDay = Carbon::parse($request->to)->format('Y-m-d');
        $barangKeluar =  Order::with('nameMenu')->where('status','SUCCESS')->whereBetween('created_at', [$startDay. ' 00:00:00', $endDay. ' 23:59:59'])
                ->select(DB::raw('produk_id  , SUM(quantity) as terjual'))
                ->groupBy('produk_id')->get();
        $totalOrder = Order::where('status','SUCCESS')->whereBetween('created_at', [$startDay. ' 00:00:00', $endDay. ' 23:59:59'])->count();
        // dd($barangKeluar);

        $pdf = PDF::loadview('pages.report.laporanBarangKeluar',compact('startDay','endDay','barangKeluar','totalOrder'));
    	return $pdf->stream('Invoice');
    }
}
