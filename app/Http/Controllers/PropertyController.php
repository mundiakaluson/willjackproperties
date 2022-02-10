<?php

namespace App\Http\Controllers;

use App\Models\Property;

class PropertyController extends Controller
{
    public function index() {
        $properties = Property::all();
        return view('properties', ['properties' => $properties]);
    }
}
