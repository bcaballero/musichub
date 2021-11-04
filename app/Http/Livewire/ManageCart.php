<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Session;

class ManageCart extends Component
{
    public $showSuccesRemove  = false;
    public $removedMusic = '';
    public $totalAmount = 0.00;

    public function render()
    {
        $currentsession = Session::getId();

        $cart = Cart::join('music', 'music.id', '=', 'carts.musicid')
                                ->where('carts.sessionid','=',$currentsession)
                                ->get(['carts.id','music.title','music.singer','music.amount']);

        $this->totalAmount = Cart::join('music', 'music.id', '=', 'carts.musicid')
                                ->where('carts.sessionid','=',$currentsession)
                                ->sum('music.amount');

        return view('livewire.manage-cart', [
            'cart' => $cart
        ]);
    }
}
