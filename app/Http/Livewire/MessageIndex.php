<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MessageIndex extends Component
{
    public $name, $security, $message, $feedback, $title;
    public function mount()
    {
        $this->name = Auth::User()->name;
    }

    public function render()
    {
        $messageFetch = Message::all();
        $data = [
            'title' => 'Patroli Cwf',
            'active' => 'message',
            'sub' => 'visitor',
            'page' => 'Message / Create',
            'fetch' => $messageFetch
        ];
        return view('livewire.message-index', $data)
        ->extends('header.header', $data)
        ->section('content');
    }
    
    protected $rules = [
        'name' => 'nullable',
        'security' => 'nullable',
        'title' => 'required|min:5',
        'message' => 'required|min:5',
        'feedback' => 'nullable',
    ];

    public function store()
    {
        $this->validate();
        $messages = Message::create([
            'name' => $this->name,
            'security' => $this->security,
            'message' => $this->message,
            'title' => $this->title,
            'feedback' => $this->feedback
        ]);

        $this->resetInput();
        $this->emit('messages');

        session()->flash('success', $messages->title. ' has been successfully !');
    }

    public function updated($propety)
    {
        $this->validateOnly($propety);
    }

    public function resetInput()
    {
        $this->name = Auth::User()->name;
        $this->title = null;
        $this->security = null;
        $this->message = null;
        $this->feedback = null;
    }

    public function destroy($id)
    {
        if($id)
        {
            $data = Message::find($id);
            $data->delete();
            $this->emit('messages');
            session()->flash('success', 'Massage Has Been Delete !');
        }
    }
}
