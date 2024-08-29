<?php

namespace App\Http\Livewire;

use App\Models\Users;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PhotoProfile extends Component
{
    private $user_id;
    public function render()
    {
        $user = Users::find($this->user_id);
        return view('livewire.photo-profile', [
            'photo' => $user->profile,
        ]);
    }

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }
}
