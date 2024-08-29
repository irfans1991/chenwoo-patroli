<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Smartphone;
use Illuminate\Support\facades\Auth;

class SmartphoneCreate extends Component
{

    public $id_phone, $name, $section, $smartphone, $number;
    private $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected $rules = [
        'id_phone' => 'sometimes',
        'name' => 'required|string|min:2',
        'section' => 'sometimes',
        'smartphone' => 'required|string',
        'number' => 'required|numeric|min:12'
    ];

    public function mount()
    {
        $this->id_phone = substr(str_shuffle($this->permitted_chars), 0, 16);
    }

    public function render()
    {
        $smartphones = Smartphone::latest()->get();
        $data = [
            'title' => 'Patroli Cwf',
            'active' => 'smartphone',
            'sub' => 'visitor',
            'page' => 'Smartphone / List',
            'smartphones' => $smartphones,
        ];
        return view('livewire.smartphone-create', $data)
        ->extends('header.header', $data)
        ->section('content');
    }

    public function store()
    {
        $this->validate();
        $stored = Smartphone::create([
            'id_phone' => $this->id_phone,
            'name' => $this->name,
            'section' => $this->section,
            'smartphone' => $this->smartphone,
            'number' => $this->number,
        ]);
        $this->resetInput();
        $this->emit('stored');

        session()->flash('success', $stored->name. ' has been successfully !');
    }
        public function updated($propety)
    {
        $this->validateOnly($propety);
    }

    public function resetInput()
    {
        $this->id_phone = substr(str_shuffle($this->permitted_chars), 0, 16);
        $this->name = null;
        $this->section = null;
        $this->smartphone = null;
        $this->number = null;
    }

    public function destroy($id)
    {
        if($id)
        {
            $data = Smartphone::find($id);
            $data->delete();
            session()->flash('success', 'Smartphone Has Been Delete !');
        }
    }
}
