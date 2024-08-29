<?php

namespace App\Exports;

use App\Models\Container;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContainerExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('container._containerExport',[
            'container' => Container::all(),
        ]);
    }
}
