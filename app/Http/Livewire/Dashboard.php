<?php

namespace App\Http\Livewire;

use App\Models\Property;
use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $greetings;
    public $morning_greetings = ['Asubuhi Njema', 'Good Morning', 'Rise and Shine'];
    public $afternoon_greetings = ['Mchana Mwema', 'Good Afternoon', 'Happy Afternoon'];
    public $evening_greetings = ['Jioni Njema', 'Good Evening', 'Time to Sleep'];
    public $quote, $latest_properties, $all_properties, $all_landlords, $users_online,
            $all_units_occupied, $all_units_available, $all_properties_count;

    public function mount() {
        $this->quote = Inspiring::quote();
        $this->all_properties = Property::all();
        $this->all_properties_count = $this->all_properties->count();
        $this->latest_properties = $this->all_properties->take(3);
        $this->all_landlords = User::all()->where('is_admin', '0')->count();
        $this->all_units_occupied = DB::table('property')->get()->sum('total_units');
        $this->all_units_available = DB::table('property')->get()->sum('available_units');
        date_default_timezone_set('Africa/Nairobi');
        $hour = date('G');
         
        if ( $hour >= 4 && $hour <= 11 ) {
            $this->greetings = $this->morning_greetings[array_rand($this->morning_greetings)];
        } else if ( $hour >= 12 && $hour <= 14 ) {
            $this->greetings = $this->afternoon_greetings[array_rand($this->afternoon_greetings)];
        } else if ( $hour >= 15 || $hour <= 1 ) {
            $this->greetings = $this->evening_greetings[array_rand($this->evening_greetings)];
        }
    }

    public function inspire () { 
        $this->quote = Inspiring::quote();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
