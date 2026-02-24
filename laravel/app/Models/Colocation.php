<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'token',
    ];

    public function owner()
    {
        return $this->belongsTo(Person::class, 'owner_id');
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
