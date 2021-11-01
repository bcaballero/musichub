<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Music;

class BrowseMusic extends Component
{
    public function render()
    {
        $currentsession = Session::getId();

        $musics = Music::where('public', 1)->get();

        return view('livewire.browse-music', [
            'musics' => $musics
        ]);
    }
}
