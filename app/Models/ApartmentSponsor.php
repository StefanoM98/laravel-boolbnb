<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentSponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'sponsor_id',
        'start_date',
        'end_date'
    ];

    protected $table = 'apartment_sponsor';
}
