<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColocationController extends Controller
{
    public function mycolocation ()
    {
        $activeMemberships = auth()->user()->memberships()->where('isActive', true)->get();

        return view('mycolocation', compact('activeMemberships'));
    }
}
