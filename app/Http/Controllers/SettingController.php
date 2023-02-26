<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::find(1);
        // dd($setting);
        return view('pages.admin.setting.settingAplication',compact('setting'));
    }

    public function indexMidtrans()
    {
        $setting = Setting::find(1);
        return view('pages.admin.setting.settingMidtrans',compact('setting'));
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
        $setting = Setting::find(1);
        // dd($setting);
        $setting->name_application = $request->name;

        if ($request->has('logo')) {
            $setting->name_application = $request->name;
            if(isset($setting->logo)){
                unlink("fotoSetting/" . $setting->logo);
                $file = $request->file('logo');
                $gambar_item_path = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'fotoSetting';
                $file->move($tujuan_upload,$gambar_item_path);
                $setting->logo=$gambar_item_path;
            }else{
                $file = $request->file('logo');
                $gambar_item_path = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'fotoSetting';
                $file->move($tujuan_upload,$gambar_item_path);
                $setting->logo = $gambar_item_path;
            }$setting->update();
        } else {
            $setting->name_application = $request->name;
            $setting->update();
        }
       
        return back()->with('success','setting Berhasil Di Ubah');
    }

    public function updateMidtrans(Request $request , $id)
    {
        $setting = Setting::find(1);
        // dd($request->server);
        $setting->midtrans_merchat_id = $request->merchant;
        $setting->midtrans_client_key = $request->client;
        $setting->midtrans_server_key = $request->server_key;
        $setting->update();
        return redirect()->route('settingMidtrans')->with('success','Konfigurasi Berhasil Di Update');
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
}
