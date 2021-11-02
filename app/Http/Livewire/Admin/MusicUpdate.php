<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Music;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class MusicUpdate extends Component
{
    use WithFileUploads;
    
    public Music $music;
    public $file;

    protected $rules = [
        'music.title' => 'required',
        'music.singer' => 'required',
        'music.public' => 'boolean',
        'music.amount' => 'required|numeric'
    ];

    public function mount(Request $request)
    { 
        $this->music = Music::find($request->id);
    }

    public function save()
    {
        $this->validate();

        if($this->file)
        {
            $filename = time() . $this->file->getClientOriginalName();

            if($path = $this->file->storeAs('music', $filename))
            {
                // delete old file
                Storage::delete($this->music->path);
                $this->music->path = $path;
            }
        }

        $this->music->save();

        return redirect('/admin/music-management')->with( [
            'successupdate' => true,
            'updatedmusic' => $this->music->title
        ] );
    }

    public function render()
    {
        return view('livewire.admin.music-update');
    }
}
