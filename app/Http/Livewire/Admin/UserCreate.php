<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    // public $user;
    public $name = '';
    public $email = '';
    public $password = '';
    public $isadmin = 0;
    public $phone = '';
    public $about = '';
    public $location = '';

    protected $rules = [
        'name' => 'required|max:40|min:3',
        'email' => 'required|email:rfc,dns',
        'phone' => 'required|digits:11',
        'about' => 'max:200',
        'location' => 'min:3'
    ];

    /*public function mount($post) { 
        $this->name     = $post->name;
        $this->email    = $post->email;
        $this->password = $post->password;
        $this->isadmin  = $post->isadmin;
        $this->phone    = $post->phone;
        $this->about    = $post->about;
        $this->location = $post->location;
    }*/

    public function save()
    {
        $this->validate();
        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => Hash::make($this->password),
            'isadmin'   => $this->isadmin,
            'phone'     => $this->phone,
            'about'     => $this->about,
            'location'  => $this->location
        ]);

        return redirect('/admin/user-management')->with( ['success' => true] );
    }

    public function render()
    {
        return view('livewire.admin.user-create');
    }
}
