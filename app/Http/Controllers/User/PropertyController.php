<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index() {
        return view('user.properties.index');
    }

    public function details($id) {
        $property = DB::table('property')->find($id);
        return view('details', ['property' => $property]);
    }
}
