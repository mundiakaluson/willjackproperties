<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Feed extends Component
{
    public $feeds, $refreshFeed;

    public function mount() {
        $this->feeds = Activity::with('causer')->latest()->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.feed');
    }

    public function refreshFeeds () {
        $this->feeds = Activity::with('causer')->latest()->limit(3)->get();
    }
}
