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
    public $showSuccesRemove  = false;
    public $removedMusic = '';

    public function render()
    {
        $this->showSuccesAdd = session()->get('successadd');
        $this->newMusic = session()->get('newmusic');
        $this->showSuccesUpdate = session()->get('successupdate');
        $this->updatedMusic = session()->get('updatedmusic');
        $this->showSuccesRemove = session()->get('successremove');
        $this->removedMusic = session()->get('removedmusic');

        $musics = Music::paginate(10);

        return view('livewire.admin.music-management', [
            'musics' => $musics
        ]);
    }
}
