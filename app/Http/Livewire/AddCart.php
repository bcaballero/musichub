<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Music;
use App\Models\Cart;
use Session;
use Illuminate\Http\Request;

class AddCart extends Component
{
    public Music $music;

    public function mount(Request $request)
    { 
        $this->music = Music::find($request->id);
    }

    public function save()
    {
        $currentsession = Session::getId();

        $newcart = Cart::firstOrCreate([
            'sessionid'     => $currentsession,
            'musicid'    => $this->music->id
        ]);

        return redirect('/cart');
    }



    public function render()
    {
        return view('livewire.add-cart');
    }
}
