<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'amount',
        'date',
        'user_id',
        'colocation_id',
        'category_id',
    ];

    public function person()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
}
