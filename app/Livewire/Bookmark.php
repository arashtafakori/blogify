<?php

namespace App\Livewire;

use Livewire\Component;

class Bookmark extends Component
{
    public $post;

    private function save()
    {
        $this->post->usersThatBookmark()->attach(auth()->user()->id);
        $this->post->save();
    }

    private function remove()
    {
        $this->post->usersThatBookmark()->detach(auth()->user()->id);
        $this->post->save();
    }

    public function bookmarkToggle(){
        if($this->post->isBookmarked())
        {
            $this->remove();
        }else{
            $this->save();
        }
    }

    public function render()
    {
        return view('livewire.bookmark');
    }
}
