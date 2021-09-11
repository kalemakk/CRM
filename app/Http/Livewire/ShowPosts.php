<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    public $number = 1;
    public function render()
    {
        $number = $this->number;
        return view('livewire.show-posts',[compact('number')]);
    }

    public function increment(){
        $this->number++;
    }

    public function decrement(){
        $this->number--;
    }
}
