<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview1()
    {
        $totalProducts = Menu::count();
        $totalOrder = Order::where('status','SUCCESS')->count();
        $totalItemTerjual = Order::where('status','SUCCESS')->sum('quantity');
        $totalPendapatan = Order::where('status','SUCCESS')->sum('jumlah_harga');
        $bestSeller = Order::with('nameMenu')->select(DB::raw('produk_id, SUM(quantity) as terjual'))
        ->groupBy('produk_id')->orderBy('terjual','DESC')->take(6)->get();
        //dd($bestSeller);
        return view('pages/dashboard-overview-1',compact('totalProducts','totalOrder','totalItemTerjual','totalPendapatan','bestSeller'));
    }
    public function chartPendapatan()
    {
        $order = Order::where('status','success')->select(
        DB::raw('SUM(jumlah_harga) as pendapatan'),
        DB::raw("DATE_FORMAT(created_at,'%M') as months"))
        ->whereYear('created_at',now()->format('Y'))
        ->where("created_at", ">", \Carbon\Carbon::now()->subMonths(12))
        ->orderBy('created_at', 'asc')
        ->groupBy('months')
        ->get();
        return response()->json($order);
    }


}
