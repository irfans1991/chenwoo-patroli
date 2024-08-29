<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Users;
use App\Models\Message;
use Livewire\Component;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $user_id, $count=0, $notifPermission;
    protected $listeners = [
        'messages' => 'updateMessages'
    ];

    public function updateMessages()
    {
        $this->count = Message::where('feedback', Null)->count();
    }

    public function render()
    {
        $messages = Message::where('feedback', Null)->whereDate('created_at', Carbon::today())->get();
        $permission = Permission::where('security', Null)->whereDate('created_at', Carbon::today())->get();
        $users = Users::find($this->user_id);
        return view('livewire.navbar', [
            'permission' => $permission,
            'photos' => $users->profile,
            'notifCount' => $this->count,
            'message' => $messages,
            'notifPermission' => $this->notifPermission,

        ]);
    }

    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->count = Message::where('feedback', Null)->whereDate('created_at', Carbon::today())->count();
    }
}
