<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public function render()
    {
        return view('livewire.admin.user-management', [
            'users' => User::paginate(15)
        ]);
    }
}
