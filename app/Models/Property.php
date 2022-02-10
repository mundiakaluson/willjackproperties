<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploaded_by', 'owner_id', 'name', 'description', 'location', 'type', 'status', 'terms', 'price', 'total_units', 'available_units'
    ];

    protected $table = 'property';

    public function user() {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function photos() {
        return $this->hasMany('App\Models\Photo', 'property_id');
    }
}
