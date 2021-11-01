<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public $showSuccesAdd  = false;
    public $newUser = '';
    public $showSuccesUpdate  = false;
    public $updatedUser = '';

    public function render()
    {
        $this->showSuccesAdd = session()->get('successadd');
        $this->newUser = session()->get('newuser');
        $this->showSuccesUpdate = session()->get('successupdate');
        $this->updatedUser = session()->get('updateduser');

        $users = User::paginate(10);

        return view('livewire.admin.user-management', [
            'users' => $users
        ]);
    }
}
