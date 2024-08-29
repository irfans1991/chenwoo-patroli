<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Smartphone;

class SmartphoneList extends Component
{

    protected $listeners = [
        'smartphoneStored' => 'handleStored'
    ];
    public function render()
    {
        $smartphones = Smartphone::latest()->get();
        $data = [
            'title' => 'Patroli Cwf',
            'active' => 'smartphone',
            'sub' => 'visitor',
            'page' => 'Smartphone / List',
            'smartphones' => $smartphones
        ];
        return view('livewire.smartphone-list', $data)
        ->extends('header.header', $data)
        ->section('content');
    }

    public function handleStored($stored)
    {
        // dd($stored);
    }

}
