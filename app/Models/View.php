<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
    ];

    // creata relazione con la tabella apartments
    public function apartments() {
        return $this->belongsTo(Apartment::class);
    }

}
