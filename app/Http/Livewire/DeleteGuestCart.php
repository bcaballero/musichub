<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Music;
use App\Models\GuestCart;
use Session;
use Illuminate\Http\Request;


class DeleteGuestCart extends Component
{
    public GuestCart $cart;
    public Music $music;

    public function mount(Request $request)
    { 
        $this->cart = GuestCart::find($request->id);
    }

    public function save()
    {
        $this->cart->delete();

        return redirect('/cart');
    }

    public function render()
    {
        $currentsession = Session::getId();

        if($currentsession != $this->cart->sessionid)
        {
            abort(403, 'Unauthorized action.');
        }

        $this->music = Music::find($this->cart->musicid);

        return view('livewire.delete-guest-cart');
    }
}
