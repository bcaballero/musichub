<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GuestCart;

class ManageGuestCart extends Component
{
    public $showSuccesRemove  = false;
    public $removedMusic = '';
    public $totalAmount = 0.00;

    public function render()
    {
        $cart = GuestCart::join('music', 'music.id', '=', 'guest_carts.musicid')->get(['guest_carts.id','music.title','music.singer','music.amount']);

        return view('livewire.manage-guest-cart', [
            'cart' => $cart
        ]);
    }
}
