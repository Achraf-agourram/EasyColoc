<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'firstName',
        'lastName',
        'photo',
        'email',
        'password',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
