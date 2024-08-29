<?php

namespace App\Http\Livewire;


use App\Models\Visitor;
use Livewire\Component;
use Illuminate\Support\facades\Auth;
use Livewire\WithFileUploads;
class VisitorCreate extends Component
{
    use WithFileUploads;
    public $document, $security, $email, $guest, $name, $idCard, $police, $company, $meet, $purpose, $info, $status, $photo;
    
    public function render()
    {
        return view('livewire.visitor-create', [
            'title' => 'Patroli Cwf',
            'active' => 'visitor',
            'slug' => 'tambah-user',
            'page' => 'Visitor / Create'
        ]);
        
    }
    public function mount()
        {
            $this->security = Auth::user()->name;
            $this->document = "Dok. No. : FRM.SEC.01.07. Rev.01";
            $this->status = "masuk";
        }

    public function store()
    {
        
        $this->validate();
       $visitors = Visitor::create([
            'document' => $this->document,
            'security' => $this->security,
            'email' => $this->email,
            'guest' => $this->guest,
            'name' => $this->name,
            'idCard' => $this->idCard,
            'police' => $this->police,
            'company' => $this->company,
            'meet' => $this->meet,
            'purpose' => $this->purpose,
            'info' => $this->info,
            'status' => $this->status,
            'photo' => $this->photo->store('photo', 'public'),
        ]);
        // dd($visitors);
        return redirect('/visitors')->with('success', 'Create data Visitor, Successfull !');
    }

    protected $rules = [

        'document' => ['nullable'],
        'security' => ['nullable'],
        'email' => ['nullable', 'email'],
        'guest' => ['required'],
        'name' => ['required', 'min:5'],
        'idCard' => ['required'],
        'police' => ['nullable', 'min:5'],
        'company' => ['nullable', 'min:5'],
        'meet' => ['required', 'min:5'],
        'purpose' => ['required'],
        'info' => ['required', 'max:255'],
        'status' => ['required'],
        'photo' => ['nullable', 'max:1024'],
];

    protected $messages = [
            'info.required' => 'Info Tidak Boleh Kosong !',
            'photo.required' => 'Upload File Tidak Boleh Kosong!',
    ];

public function updated($propety)
{
    $this->validateOnly($propety);
}
}
