<?php

namespace App\Exports;

use App\Models\Transportation;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransportExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('transport._exportTransport', [
            'transport' => Transportation::all()
        ]);
    }
}
