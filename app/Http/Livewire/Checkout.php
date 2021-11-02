<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GuestCart;
use Session;

class Checkout extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $totalAmount = 0.00;

    protected $rules = [
        'name' => 'required|max:40|min:3',
        'email' => 'required|email:rfc,dns',
        'phone' => 'required|digits:11'
    ];

    public function render()
    {
        $currentsession = Session::getId();

        $cart = GuestCart::join('music', 'music.id', '=', 'guest_carts.musicid')
                                ->where('guest_carts.sessionid','=',$currentsession)
                                ->get(['guest_carts.id','music.title','music.singer','music.amount']);

        $this->totalAmount = GuestCart::join('music', 'music.id', '=', 'guest_carts.musicid')
                                ->where('guest_carts.sessionid','=',$currentsession)
                                ->sum('music.amount');

        return view('livewire.checkout', [
            'cart' => $cart
        ]);
    }
}
