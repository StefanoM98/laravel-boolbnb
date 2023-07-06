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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Creata relazione con tabella service
    public function services()
    {
        return $this->belongsToMany(Service::class, 'apartment_service');
    }
    // Creata relazione con tabella sponsor
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'apartment_sponsor');
    }
    // Creata relazione con tabella view
    public function views()
    {
        return $this->belongsToMany(View::class);
    }
    // Creata relazione con tabella message
    public function messages()
    {
        return $this->belongsToMany(Message::class);
    }

    public function getImageUri()
    {
        $img404 = 'Image_not_available.png';
        $imgPath = public_path('img/' . $img404);
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return url('storage/' . $this->image);
        } else {
            return $imgPath;
        }
    }
}
