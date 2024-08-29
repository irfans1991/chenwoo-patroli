<?php

namespace App\Exports;

use App\Models\MutasiMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class mutasiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('mutasiMasuk._mutasiExport',[
            'mutasi' => MutasiMasuk::all(),
        ]);
    }
}
