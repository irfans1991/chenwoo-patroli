<?php

namespace App\Exports;

use App\Models\StorePhone;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class storedExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('smartphone._exportStored',[
            'storedExport' => StorePhone::all(),
        ]);
    }
}
