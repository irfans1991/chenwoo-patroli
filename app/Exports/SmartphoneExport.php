<?php

namespace App\Exports;

use App\Models\Smartphone;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class SmartphoneExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        
        return view('smartphone._exportSmartphone', [
            'smartphone' => Smartphone::all()
        ]);
    }
}
