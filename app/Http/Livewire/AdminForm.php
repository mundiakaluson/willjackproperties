<?php

namespace App\Http\Livewire;

use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class AdminForm extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $users;
    public $uploaded_by, $name, $owner_id, $location, $type, $status, $photos,
        $description, $price, $total_units, $available_units, $terms;

    protected $listeners = ['feedsRefresh' => '$refresh'];

    public $property;

    protected $rules = [
        'uploaded_by' => 'required',
        'name' => 'required',
        'owner_id' => 'required',
        'location' => 'required',
        'type' => 'required',
        'status' => 'required',
        'terms' => 'required',
        'description' => 'required',
        'price' => 'required',
        'total_units' => 'required',
        'available_units' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $this->users = User::all()->where('is_admin', 0);
        return view('livewire.admin-form');
    }

    public function new()
    {

        DB::transaction(function () {
            $this->property = Property::create([
                'created_at' => now(),
                'updated_at' => now(),
                'uploaded_by' => $this->uploaded_by,
                'name' => $this->name,
                'owner_id' => $this->owner_id,
                'location' => $this->location,
                'type' => $this->type,
                'status' => $this->status,
                'terms' => $this->terms,
                'description' => $this->description,
                'price' => $this->price,
                'total_units' => $this->total_units,
                'available_units' => $this->available_units,
            ]);

            foreach ($this->photos as $key => $photo) {

                $this->photos[$key] = $photo->store('properties', 'public');
            }
            $this->property->photos()->create([
                'property_id' => $this->property->id,
                'photo_paths' => json_encode($this->photos),
            ]);

            $this->property->save();
            activity()
                ->performedOn(new Property())
                ->causedBy(auth()->user()->id)
                ->createdAt(now())
                ->log('Admin ID ' . optional(Auth::user())->id . ' created property ID ' . $this->property->id . '.');
        });

        $this->reset();

        $this->flash('success', 'Action Successful!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => 'The landlord can track their property from their portal',
            'timerProgressBar' => true,
        ]);
        return redirect('admin/properties');
    }
}
