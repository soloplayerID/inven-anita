<?php

namespace App;

use App\Models\Setting;

class Helper
{
    public static function formatCode($code)
    {
        return str_replace('>', 'HTMLCloseTag', str_replace('<', 'HTMLOpenTag', $code));
    }
    // if (!function_exists(function: 'setting')) {
       
    // }
    // function setting()
    // {
    //     $setting = Setting::find(1);
    //     return compact('setting');
    // }
}
