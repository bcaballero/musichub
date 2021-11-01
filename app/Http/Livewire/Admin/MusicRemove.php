<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicRemove extends Component
{
    public Music $music;

    public function mount(Request $request)
    { 
        $this->music = Music::find($request->id);
    }

    public function save()
    {
        Storage::delete($this->music->path);
        $removed = $this->music->title;
        $this->music->delete();

        return redirect('/admin/music-management')->with( [
            'successremove' => true,
            'removedmusic' => $removed
        ] );
    }

    public function render()
    {
        return view('livewire.admin.music-remove');
    }
}
