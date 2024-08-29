<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MutasiIndex extends Component
{
    public function render()
    {
        $dataMutasi = [
            'title' => 'Patroli Cwf',
            'active' => 'mutasi',
            'sub' => 'visitor',
            'page' => 'Mutasi / Index'
        ];
        return view('livewire.mutasi-index', $dataMutasi)->layout('mutasiMasuk.index');
    }
}
