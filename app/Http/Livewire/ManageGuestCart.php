<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GuestCart;
use Session;

class ManageGuestCart extends Component
{
    public $showSuccesRemove  = false;
    public $removedMusic = '';
    public $totalAmount = 0.00;

    public function render()
    {
        $currentsession = Session::getId();

        $cart = GuestCart::join('music', 'music.id', '=', 'guest_carts.musicid')
                                ->where('guest_carts.sessionid','=',$currentsession)
                                ->get(['guest_carts.id','music.title','music.singer','music.amount']);

        $this->totalAmount = GuestCart::join('music', 'music.id', '=', 'guest_carts.musicid')
                                ->where('guest_carts.sessionid','=',$currentsession)
                                ->sum('music.amount');

        return view('livewire.manage-guest-cart', [
            'cart' => $cart
        ]);
    }
}
