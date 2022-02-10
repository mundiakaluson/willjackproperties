<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MyProperties extends Component
{
    public $properties;

    public function mount () {
        $this->properties = DB::table('property')->where('owner_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.my-properties');
    }
}
