<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $isadmin = 0;
    public $phone = '';
    public $about = '';
    public $location = '';
    public $disabled = 0;

    protected $rules = [
        'name' => 'required|max:40|min:3',
        'email' => 'required|email:rfc,dns|unique:App\Models\User,email',
        'phone' => 'required|digits:11',
        'about' => 'max:200',
        'location' => 'min:3',
        'password' => 'required|min:8'
    ];

    public function save()
    {
        $this->validate();
        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => Hash::make($this->password),
            'isadmin'   => $this->isadmin,
            'disabled'   => $this->disabled,
            'phone'     => $this->phone,
            'about'     => $this->about,
            'location'  => $this->location
        ]);

        return redirect('/admin/user-management')->with( [
            'successadd' => true,
            'newuser' => $user->name
        ] );
    }

    public function render()
    {
        return view('livewire.admin.user-create');
    }
}
