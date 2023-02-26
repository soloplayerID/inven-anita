<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menu;
use App\Models\Keranjang;
use App\Models\Order;
use App\Models\Mutasi;
use App\Models\SelectPayment;
use Midtrans\Snap;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class KerajangContoller extends Controller
{
    public function store(Request $request ,$id)
    {
        $menu = Menu::findOrFail($id);
        $keranjang_produk_id = Keranjang::where('produk_id', $id)->first();
        if ($menu->stock < $request->quantity) {
            Alert::error('Maaf', 'Stock Barang Tidak Mencukupi');
            return back();
        } else {
            if (empty($keranjang_produk_id)) {
                $keranjang = new Keranjang();
                $keranjang->produk_id = $menu->id;
                $keranjang->petugas_id = (Auth::user()->id);
                $keranjang->quantity = $request->quantity;
                $keranjang->harga_satuan = $menu->harga;
                $keranjang->jumlah_harga = $menu->harga * $request->quantity;
                $keranjang->note = $request->note;
                $keranjang->save();
                // $menu->stock -= $request->quantity;
                // $menu->update();
            } else {
                $quantityCounter = $keranjang_produk_id->quantity + $request->quantity;

                $keranjang_produk_id->update([
                    'quantity' => $quantityCounter,
                    'jumlah_harga' => $keranjang_produk_id->harga_satuan * $quantityCounter,
                    'note' => $request->note,
                ]);
                // $menu->stock -= $request->quantity;
                // $menu->update();
            }
            toast('Produk Masuk Keranjang','success');
            return back();
        }


    }

    public function updateKeranjang(Request $request ,$id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $menu = Menu::where('id',$keranjang->produk_id)->first();
        $keranjang->quantity = $request->quantity;
        $keranjang->harga_satuan = $menu->harga;
        $keranjang->jumlah_harga = $menu->harga * $request->quantity;
        $keranjang->note = $request->note;
        $keranjang->update();
        toast('Item Telah Di Update','success');
        return back();

    }

    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();
        toast('Item Telah Di Hapus','success');
        return back();

    }

    public function destroyALl($id)
    {
        $keranjang = Keranjang::where('petugas_id',Auth::user()->id)->get();
        foreach ($keranjang as $item) {
            $item->delete();
        }
        return back()->with('success','Produk Telah Di Hapus');
        // dd($keranjang);
    }

    // public function getApiUser()
    // {
    //     $getContent = "https://money-take.tepicode.com/api/listUser";

    // }

    public function addOrder(Request $request)
    {
        // dd($request);
        $keranjang = Keranjang::where('petugas_id', Auth::user()->id)->get();
        // dd($keranjang);
        $kdtransaksi = "INV".rand();
        $petugas_id = (Auth::user()->id);
        
        // return response(['status'=> 'failed', 'data'=> $request->customer_id]);
        if ($keranjang->count() == 0) {
            // dd('test');
            Alert::warning('Maaf', 'Harap Periksa Kembali Orderan Anda');
            // return back();
            return response(['status'=> 'failed', 'code_transaksi'=> $kdtransaksi, 'message'=> 'Harap Periksa Kembali Orderan Anda, Keranjang Kosong']);
        } else {
           
            
            if ($request->jenis_pembayaran == 1) {
                foreach ($keranjang as $item) {
                    $order = new Order();
                    $order->petugas_id = $petugas_id;
                    $order->produk_id = $item->produk_id;
                    if (is_numeric($request->customer_id)) {
                        $order->customer_id = $request->customer_id;
                    } else {
                       if ($request->nameCustomer != "") {
                           $newCustomer = new Customer();
                           $newCustomer->name = $request->nameCustomer;
                           $newCustomer->save();
                           $addNewCustomer = Customer::where('id',$newCustomer->id)->first();
                           $id_new_customer = $addNewCustomer->id;
                           $order->customer_id = $id_new_customer;

                       }else {
                            Alert::warning('Maaf', 'Harap Periksa Kembali Orderan Anda');
                            // return back();
                            return response(['status'=> 'failed', 'code_transaksi'=> $kdtransaksi, 'message'=> 'Harap Periksa Kembali Orderan Anda, Keranjang Kosong']);

                       }
                       
                    }
                    // $order->customer_id = 1;
                   
                    // $order->meja_customer = $request->tableCustomer;
                    $order->jenis_pembayaran = 1;
                    $order->code_transaksi = $kdtransaksi;
                    $order->quantity = $item->quantity;
                    $order->harga_satuan = $item->harga_satuan;
                    $order->jumlah_harga = $item->jumlah_harga;
                    
                    $cekStock = Menu::where('id',$item->produk_id)->get();
                    
                    $check_mutasi = Mutasi::where('produk_id', $item->produk_id)->whereDate('tgl_mutasi', date('Y-m-d'))->first();
                    $datastok = Menu::where('id',$item->produk_id)->first();
                    
                    if($check_mutasi != null){
                        //update
                       
                        Mutasi::where('produk_id', $item->produk_id)->where('tgl_mutasi', date('Y-m-d'))->update(['barang_keluar'=> $check_mutasi->barang_keluar + $item->quantity]);
                    }else{
                        //insert
                        
                        Mutasi::create(['tgl_mutasi'=> date('Y-m-d'), 'produk_id'=> $item->produk_id, 'stok_awal'=> (int) $datastok->stock, 'barang_keluar'=> $item->quantity]);
                        
                    }
                    
                    $order->note = $item->note;
                    $order->status = 'SUCCESS';
                    $cekStock = Menu::where('id',$item->produk_id)->get();
                    foreach ($cekStock as $cek) {
                        if ($cek->stock < $item->quantity) {
                            Alert::error('Maaf', 'Stock Barang Tidak Mencukupi');
                            $item->delete();
                            return back();
                        } else {
                            Activity()->log('Tambah Transaksi ' . $kdtransaksi);
                            $order->save();
                            $menu = Menu::where('id', $item->produk_id)->get();
                            foreach ($menu as $items) {
                                $items->stock -= $item->quantity;
                                $items->update();
                            }
                            $item->delete();
                        }
                    }


                }
                return response(['status'=> 'ok', 'code_transaksi'=> (string) $kdtransaksi, 'message'=> 'Segera Siapkan Pesanan']);
                // return redirect('invoice/'.$request->code_transaksi)->with('success', 'Segera Siapkan Pesanan');
            } else {
                foreach ($keranjang as $keranjang) {
                    $order = new Order();
                    $order->petugas_id = $petugas_id;
                    $order->produk_id = $keranjang->produk_id;
                    if ($request->has('nameCustomer')) {
                        $newCustomer = new Customer();
                        $newCustomer->name = $request->nameCustomer;
                        $newCustomer->save();
                        $addNewCustomer = Customer::where('name',$request->nameCustomer)->first();
                        $id_new_customer = $addNewCustomer->id;
                        $order->customer_id = $id_new_customer;

                    } else {
                         Alert::warning('Maaf', 'Harap Periksa Kembali Orderan Anda');
                        //  return back();
                         return response(['status'=> 'failed', 'code_transaksi'=> $kdtransaksi, 'message'=> 'Harap Periksa Kembali Orderan Anda']);
                    }
                    $order->meja_customer = $request->tableCustomer;
                    $order->jenis_pembayaran = 2;
                    $order->code_transaksi =  $kdtransaksi;
                    $order->order_id = time();
                    $order->quantity = $keranjang->quantity;
                    $order->harga_satuan = $keranjang->harga_satuan;
                    $order->jumlah_harga = $keranjang->jumlah_harga;
                    $cekStock = Menu::where('id',$keranjang->produk_id)->get();
                    
                    $check_mutasi = Mutasi::where('produk_id', $keranjang->produk_id)->whereDate('tgl_mutasi', date('Y-m-d'))->first();
                    
                    if($check_mutasi != null){
                        //update
                        
                        Mutasi::where('produk_id', $keranjang->produk_id)->where('tgl_mutasi', date('Y-m-d'))->update(['barang_keluar'=> $keranjang->quantity]);
                    }else{
                        //insert
                        $datastok = Menu::where('id',$keranjang->produk_id)->first();
                        // dd($datastok->stock);
                        Mutasi::create(['tgl_mutasi'=> date('Y-m-d'), 'produk_id'=> $keranjang->produk_id, 'stok_awal'=> $datastok->stock, 'barang_keluar'=> $keranjang->quantity]);
                        
                    }
                    foreach ($cekStock as $cek) {
                        if ($cek->stock < $keranjang->quantity) {
                            Alert::error('Maaf', 'Stock Barang Tidak Mencukupi');
                            $keranjang->delete();
                            return response(['status'=> 'failed', 'code_transaksi'=> $kdtransaksi, 'message'=> 'Stock Barang Tidak Mencukupi']);
                            // return back();
                        } else {
                            $order->note = $keranjang->note;
                            $order->status = 'Waiting';
                            $order->save();
                            Activity()->log('Tambah Transaksi ' . $kdtransaksi);
                        }
                    }

                }
                $keranjangDelete =Keranjang::where('petugas_id',Auth::user()->id)->get();
                foreach ($keranjangDelete as $items) {
                    $items->delete();
                }

                $tickets = Order::where('code_transaksi', $kdtransaksi)->get();
                // $menu = Menu::where('id', $item->produk_id)->first();
                $this->initPaymentGateway();
                // dd($ticket);
                foreach ($tickets as $ticket) {

                    $item_list[] = [
                        'id' => $ticket->id,
                        'price' => $ticket->harga_satuan,
                        'quantity' => $ticket->quantity,
                        'name' => $ticket->nameMenu->name
                    ];
                }
                $paymentUrl = $this->CreateSomePayment($item_list);
                try {
                    // Get Snap Payment Page URL
                    foreach ($tickets as $item) {
                        $item->snap_token = $paymentUrl->token;
                        $item->url_midtrans = $paymentUrl->redirect_url;
                        $item->save();
                    }
                    return redirect($paymentUrl->redirect_url);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                return redirect($paymentUrl->redirect_url);
            }
        }
    }
    private function CreateSomePayment($item_order, int $totalprice = 0)
    {
        $enable_payments = SelectPayment::PAYMENT_CHANNELS;
        // $code = $item_order->code_transaksi;
        // foreach ($item_order as $item) {
        //    $codeasle = $item->code_transaksi;
        // }
        // dd($codeasle);
        // $totalAmount = Order::where('code_transaksi', $item_order->code_transaksi)->sum('jumlah_harga');
        // $tax = $totalprice * 0.05;
        // $tax1 = $totalprice + $tax;
        // dd($totalAmount);
        $transaction_order = [
            'transaction_details' => [
                'order_id' => time(), // aturannya midtrans "order_id" itu time()
                'gross_amount' => $totalprice,
            ],
            'enabled_payments' => $enable_payments,
            'item_details' => $item_order,
        ];
        return Snap::createTransaction($transaction_order);
    }
}
