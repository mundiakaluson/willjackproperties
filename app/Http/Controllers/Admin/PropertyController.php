<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public $str_clean;
    public function index() {
        $properties = DB::table('property')->orderBy('created_at', 'desc')->get();
        return view('admin.properties.index', ['properties' => $properties]);
    }

    public function new() {
        return view('admin.properties.new');
    }

    public function edit($id) {
        $property = Property::find($id);
        $users = User::all();
        return view('admin.properties.edit', [
            'property' => $property,
            'users' => $users,
        ]
    );
    }

    public function details($id) {
        $property = Property::find($id);
        $photos = DB::table('photos')->select('photo_paths')->where('id', $id)->get();
        $photos_array = json_decode($photos);

        foreach ($photos_array as $photo_instance) {
            foreach ($photo_instance as $photos) {
                $url_format = substr($photos, 1, -1);
                $this->str_clean = str_replace(['"', "\\"], "", $url_format);
                $this->str_clean = explode(',', $this->str_clean);
            }
        }

        return view('details', ['property' => $property, 'photos' => $this->str_clean]);
    }

    public function landlord($id) {
        $landlord = DB::table('users')->find($id);
        return view('admin.properties.landlord', [
            'landlord' => $landlord,
        ]);
    }
}
