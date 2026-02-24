<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'role',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
}
