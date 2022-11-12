<?php

namespace App\Http\Livewire\Request\Request23;

use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        $this->emit('emits');
        return view('livewire.request.request23.index-component');
    }
}
