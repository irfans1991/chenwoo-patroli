<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Visitor;
use Livewire\Component;

class VisitorIndex extends Component
{
    public function render()
    {
        $visitor = Visitor::where('status', 'masuk')->whereDate('created_at', Carbon::today())->get();
        return view('livewire.visitor-index',[
            'visitors' => $visitor,
        ]);
    }
   
    public function getVisitor($id)
    {
        $visitorEdit = Visitor::find($id);
        $this->emit('getVisitor', $visitorEdit);
    }

    public function viewVisitorDetail($id)
    {
        $visitorDetail = Visitor::find($id);
        $this->emit('detailVisitor', $visitorDetail);

    }

}
