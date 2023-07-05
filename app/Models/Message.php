<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'name',
        'email',
        'text',
        'state_message'
    ];

    // creata relazione con la tabella apartments
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
