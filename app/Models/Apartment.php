<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'square_meters',
        'bed_number',
        'bathroom_number',
        'room_number',
        'address',
        'city',
        'state',
        'latitude',
        'longitude',
        'price',
        'image',
        'visibility'
    ];

    // Creata relazione con tabella user
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Creata relazione con tabella service
    public function service() {
        return $this->belongsToMany(Service::class, 'apartment_service');
    }

    public function sponsor() {
        return $this->belongsToMany(Sponsor::class, 'apartment_sponsor');
    }
    public function view() {
        return $this->belongsToMany(View::class);
    }


}

