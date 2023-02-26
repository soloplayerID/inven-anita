<?php

namespace App\Exports;

use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MenuExport implements FromView
{
    public function view(): View
    {
        return view('pages.manager.menu.report', [
            'datas' => Menu::all()
        ]);
    }
}
