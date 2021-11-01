<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Music;
use Illuminate\Support\Facades\Hash;

class MusicCreate extends Component
{
    use WithFileUploads;

    public $title = '';
    public $singer = '';
    public $path = '';
    public $public = 0;
    public $file;

    protected $rules = [
        'title' => 'required',
        'singer' => 'required',
        'file' => 'required|mimes:mp3'
    ];

    public function save()
    {
        $this->validate();

        $filename = time() . $this->file->getClientOriginalName();

        if($this->path = $this->file->storeAs('music', $filename))
        {
            $music = Music::create([
                'title'     => $this->title,
                'singer'    => $this->singer,
                'path'      => $this->path,
                'public'    => $this->public
            ]);    

            return redirect('/admin/music-management')->with( [
                'successadd' => true,
                'newmusic' => $music->title
            ] );
        }
        else
        {
            return $this->addError('title', 'Cannot save file.'); 
        }
    }

    public function render()
    {
        return view('livewire.admin.music-create');
    }
}
