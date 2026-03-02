<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function quit ()
    {
        $myMembership = auth()->user()->memberships()->where('isActive', true)->firstOrFail();

        if ($myMembership->role === 'owner') return redirect()->back()->with('error', 'Owner ne peut pas quitter la colocation !');
        elseif ($myMembership->balance !== '0') return redirect()->back()->with('error', 'vous ne pouver pas quitter la colocation avec des credits !');;

        return "ah";
    }
}
