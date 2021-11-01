<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Music;

class MusicManagement extends Component
{
    public $showSuccesAdd  = false;
    public $newMusic = '';
    public $showSuccesUpdate  = false;
    public $updatedMusic = '';

    public function render()
    {
        $musics = Music::paginate(10);

        return view('livewire.admin.music-management', [
            'musics' => $musics
        ]);
    }
}
