<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'role',
        'joinedAt',
        'isActive',
        'balance',
        'user_id',
        'colocation_id',
    ];

    public function person()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
}
