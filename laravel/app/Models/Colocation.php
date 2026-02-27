<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Colocation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'token',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function expenses ()
    {
        return $this->hasMany(Expense::class);
    }

    public static function generateToken()
    {
        return Str::random(40);
    }
}
