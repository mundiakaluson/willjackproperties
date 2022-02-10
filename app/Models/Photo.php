<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['photo_paths', 'property_id'];

    protected $table = 'photos';

    public function property () {
        return $this->belongsTo('App\Models\Property', 'id');
    }
}
