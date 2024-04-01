<?php

namespace App\Livewire;

use Livewire\Component;

class Like extends Component
{
    public $post;

    // public $likes = 42;
    // public function likeToggle(){
    //     $this->likes++;
    // }

    private function like()
    {
        $this->post->usersThatLike()->attach(auth()->user()->id);
        $this->post->save();
    }

    private function undoLike()
    {
        $this->post->usersThatLike()->detach(auth()->user()->id);
        $this->post->save();
    }

    public function likeToggle(){
        if($this->post->isLiked())
        {
            $this->undoLike();
        }else{
            $this->like();
        }
    }

    public function render()
    {
        return view('livewire.like');
    }
}
