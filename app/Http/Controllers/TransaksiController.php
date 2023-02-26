<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Keranjang;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\SelectPayment;
use App\Models\Setting;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('kategori_id')){
            $menu = Menu::where('kategori_id', 'LIKE', '%' . $request->kategori_id . '%')->orderBy('name','DESC')->get();
            $kategori = Menu::select('kategori_id', DB::raw('count(*) as total'))->groupBy('kategori_id')->get();
        }elseif ($request->kategori == 'allmenu') {
            $kategori = Menu::select('kategori_id', DB::raw('count(*) as total'))->groupBy('kategori_id')->get();
            $menu = Menu::orderBy('kategori_id','DESC')->get();
        }
        else{
            $kategori = Menu::select('kategori_id', DB::raw('count(*) as total'))->groupBy('kategori_id')->get();
            // dd($kategori);
            $menu = Menu::orderBy('kategori_id','DESC')->get();
        }
        // $menu = Menu::orderBy('stock','DESC')->get();
        $countAll = Menu::count();
        $setting = Setting::find(1);
        // dd($setting);
        $kategoriCount = Kategori::orderBy('name','DESC')->get();
        // $menuCount = Menu::groupBy;
        $countMenu= Menu::select('kategori_id', DB::raw('count(*) as total'))->groupBy('kategori_id')->get();
        
        // $contMenu =
        // $countMakanan = Menu::where('kategori','makanan')->count();
        // $countMinuman = Menu::where('kategori','minuman')->count();
        $customer = Customer::orderBy('name','DESC')->get();
        $subTotal = Keranjang::sum('jumlah_harga');

        $keranjang = Keranjang::where('petugas_id',Auth::user()->id)->orderBy('jumlah_harga','DESC')->get();
        // dd($countMakanan);

        return view('pages.user.POS.index',compact('menu','countAll',
        'keranjang','subTotal','kategori','countMenu','customer','setting'));
    }
    public function notification(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);
        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_SERVER_KEY'));
        // \dd($validSignatureKey, $notification->signature_key);
        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }

        $this->initPaymentGateway();
        $notif = new Notification();
        // $notif = \json_decode($payload);
        // $validSignatureKey = \hash('sha512', $notif->order_id . $notif->status_code . $notif->gross_amount . \env('MIDTRANS_SERVERKEY'));
        // if ($notif->signature_key != $validSignatureKey) {
        //     return \response(['message' => 'Invalid signature'], 403);
        // }

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        $order = Order::where('order_id', $order_id)->get();
        // $paymentStatus = null;
        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    // echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                    // $paymentStatus= "Transaction order_id: " . $order_id . " is challenged by FDS";
                    $transaction = SelectPayment::CHALLENGE;
                    foreach ($order as $item) {
                        $item->status = "WAITING";
                        $item->save();
                    }
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    // echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                    $transaction = SelectPayment::SUCCESS;
                    foreach ($order as $item) {
                        $item->status = "SUCCESS";
                        $item->save();
                    }
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            // echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
            $transaction = SelectPayment::SETTLEMENT;
            foreach ($order as $item) {
                $item->status = "SUCCESS";
                $item->save();
                $menu = Menu::where('id', $item->produk_id)->get();
                foreach ($menu as $items) {
                    $items->stock -= $item->quantity;
                    $items->update();
                }
            }
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            // echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
            $transaction = SelectPayment::PENDING;
            foreach ($order as $item) {
                $item->status = "PENDING";
                $item->save();
            }
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
            $transaction = SelectPayment::DENY;
            foreach ($order as $item) {
                $item->status = "CANCEL";
                $item->save();
            }
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
            $transaction = SelectPayment::EXPIRE;
            foreach ($order as $item) {
                $item->status = "CANCEL";
                $item->save();
            }
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $transaction = SelectPayment::CANCEL;
            foreach ($order as $item) {
                $item->status = "CANCEL";
                $item->save();
            }
        }
        // SelectPayment::create([
        //     'order_id' => $order->id,
        //     'gross_amount' => $notif->gross_amount,
        //     'transaction_status' => $transaction,
        //     'transaction_id' => $notif->transaction_id,
        //     'status_code' => $notif->status_code,
        //     'status_message' => $notif->status_message,
        //     'payment_type' => $notif->payment_type,
        //     'signature_key' => $notif->signature_key,
        //     'fraud_status' => $notif->fraud_status,
        // ]);
        // if ($paymentStatus && $payment) {
        //     DB::transaction(
        //         function () use ($order, $payment) {
        //             if (\in_array($payment->transaction_status, [Payment2::SUCCESS, Payment2::SETTLEMENT])) {
        //                 $order->payment_status = Order::PAID;
        //                 $order->save();
        //             }
        //         }
        //     );
        // }
        $message = 'Payment status is : ' . $transaction;
        $response = [
            'code' => 200,
            'message' => $message,
        ];
        return \response($response, 200);
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
    public function apiMenu(Request $request)
    {
        $menu = Menu::orderBy('stock','DESC')->get();
        if($request->kategori == 'allmenu'){
            $menu = Menu::orderBy('stock','DESC')->get();
        }else{
            $menu = Menu::where('kategori',$request->kategori)->orderBy('stock','DESC')->get();
        }
        $countAll = Menu::count();
        $countMakanan = Menu::where('kategori','makanan')->count();
        $countMinuman = Menu::where('kategori','minuman')->count();
        $subTotal = Keranjang::sum('jumlah_harga');

        $keranjang = Keranjang::where('petugas_id',Auth::user()->id)->orderBy('jumlah_harga','DESC')->get();
        return response()->json($menu);
    }
    
    
    

}
