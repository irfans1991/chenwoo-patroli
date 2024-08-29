<?php

namespace App\Exports;

use App\Models\Permission;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PermissionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view("permission._permissionExport",[
            'permission' => Permission::all()
        ]);
    }
}
