<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Music;
use App\Models\GuestCart;
use Session;
use Illuminate\Http\Request;

class AddGuestCart extends Component
{
    public Music $music;

    public function mount(Request $request)
    { 
        $this->music = Music::find($request->id);
    }

    public function save()
    {
        $currentsession = Session::getId();

        $newcart = GuestCart::firstOrCreate([
            'sessionid'     => $currentsession,
            'musicid'    => $this->music->id
        ]);

        return redirect('/cart');
    }



    public function render()
    {
        return view('livewire.add-guest-cart');
    }
}
