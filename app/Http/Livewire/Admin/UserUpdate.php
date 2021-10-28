<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class UserUpdate extends Component
{
    public User $user;
    
    protected $rules = [
        'user.name' => 'required|max:40|min:3',
        'user.email' => 'required|email:rfc,dns',
        'user.phone' => 'required|digits:11',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount(Request $request) { 

        $this->user = User::find($request->id);
    }

    public function save()
    {
        $this->validate();
        $this->user->save();

        return redirect('/admin/user-management')->with( ['success' => true] );
    }

    public function render()
    {
        return view('livewire.admin.user-update');
    }
}
