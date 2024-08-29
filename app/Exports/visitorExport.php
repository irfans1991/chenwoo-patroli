<?php

namespace App\Exports;

use App\Models\Visitor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class visitorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View 
    {
        return view('visitors._viewExcel',[
            'visitors' => Visitor::all()
        ]);
    }
}