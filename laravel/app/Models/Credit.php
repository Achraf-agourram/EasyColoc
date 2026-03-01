<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'is_payed',
        'user_id',
        'expense_id',
    ];

    public function person ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expense ()
    {
        return $this->belongsTo(Expense::class);
    }
}
