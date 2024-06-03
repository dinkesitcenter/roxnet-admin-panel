<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.pages.admin.dashboard');
    }
}
