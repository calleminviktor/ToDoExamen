<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToDo extends Component
{
    public $tasks;

    public function addTask(){
        dd($this->task);
    }
    public function render()
    {
        return view('livewire.to-do',[
        ]);
    }
}
