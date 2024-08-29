<?php

namespace App\Http\Livewire;

use App\Models\Visitor;
use Livewire\Component;

class VisitorUpdate extends Component
{
    public $id_visitor, $document, $security, $email, $guest, $name, $idCard, $police, $company, $meet, $purpose, $info, $status = "keluar", $photo;

    protected $listeners = [
        'getVisitor' => 'showVisitor'
    ];

    public function render()
    {
        return view('livewire.visitor-update');
    }
    public function showVisitor($visitorEdit)
    {
        $this->id_visitor = $visitorEdit['id'];
        $this->document = $visitorEdit['document'];
        $this->security = $visitorEdit['security'];
        $this->email = $visitorEdit['email'];
        $this->guest = $visitorEdit['guest'];
        $this->name = $visitorEdit['name'];
        $this->idCard = $visitorEdit['idCard'];
        $this->police = $visitorEdit['police'];
        $this->company = $visitorEdit['company'];
        $this->meet = $visitorEdit['meet'];
        $this->purpose = $visitorEdit['purpose'];
        $this->info = $visitorEdit['info'];
        $this->photo = $visitorEdit['photo'];
    }
    public function update()
    {
        if($this->id_visitor)
        {
            $visitors = Visitor::find($this->id_visitor);
            $visitors->update([
                'status' => $this->status,
            ]);
            return redirect('/visitors')->with('success', 'Edit data Visitor, Successfull !');
        }
    }
}

