<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function quit ()
    {
        $myMembership = auth()->user()->memberships()->where('isActive', true)->firstOrFail();

        if ($myMembership->role === 'owner') return redirect()->back()->withErrors('Owner ne peut pas quitter la colocation !');

        $myCredits = auth()->user()->credits()->where('is_payed', false)->get();

        return $myCredits;
    }
}
