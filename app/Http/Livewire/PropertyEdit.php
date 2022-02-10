<?php

namespace App\Http\Livewire;

use App\Models\Property;
use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PropertyEdit extends Component
{
    use LivewireAlert;
    public $uploaded_by, $name, $owner_id, $location, $type, $status, $photos, $users,
            $description, $price, $total_units, $available_units, $terms, $property, $property_id;

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
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function mount ($id) {
        $this->uploaded_by = auth()->user()->id;
        $this->users = User::all();
        $this->property = Property::find($id);
        $this->name = $this->property->name;
        $this->owner_id = $this->property->owner_id;
        $this->location = $this->property->location;
        $this->type = $this->property->type;
        $this->status = $this->property->status;
        $this->terms = $this->property->terms;
        $this->description = $this->property->description;
        $this->price = $this->property->price;
        $this->total_units = $this->property->total_units;
        $this->available_units = $this->property->available_units;
    }

    public function render()
    {
        return view('livewire.property-edit', [
            'property' => $this->property
        ]);
    }

    public function edit() {
        Property::where('id', $this->property->id)
            ->update([
                'created_at' => now(),
                'updated_at' => now(),
                'uploaded_by' => $this->uploaded_by,
                'name' => $this->name,
                'owner_id' => auth()->user()->id,
                'location' => $this->location,
                'type' => $this->type,
                'status' => $this->status,
                'terms' => $this->terms,
                'description' => $this->description,
                'price' => $this->price,
                'total_units' => $this->total_units,
                'available_units' => $this->available_units,
            ]);

        $this->flash('success','Property Updated Successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => 'New property information has been pushed to the database.',
            'timerProgressBar' => true,
            ]);

        activity()
            ->performedOn($this->property)
            ->causedBy(auth()->user()->name)
            ->createdAt(now()->subDays(7))
            ->log('Admin ID' . $this->property->uploaded_by . 'edited property ID' . $this->property->id . '.');

        return redirect('admin/details/' . $this->property->id . '');
    }

}
