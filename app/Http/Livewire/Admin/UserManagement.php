<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public $showSuccesNotification  = false;

    public function render()
    {
        $this->showSuccesNotification = session()->get('success');

        $users = User::paginate(5);

        return view('livewire.admin.user-management', [
            'users' => $users
        ]);
    }
}
