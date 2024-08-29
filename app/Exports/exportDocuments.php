<?php

namespace App\Exports;

use App\Models\Document;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class exportDocuments implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('document._documentExport', [
            'document' => Document::all(),
        ]);
    }
}
