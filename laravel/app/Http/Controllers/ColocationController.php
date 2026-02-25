<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColocationRequest;
use Illuminate\Http\Request;

class ColocationController extends Controller
{
    public function mycolocation ()
    {
        $activeMemberships = auth()->user()->memberships()->where('isActive', true)->get();

        return view('mycolocation', compact('activeMemberships'));
    }

    public function colocationForm ()
    {
        return view('createcolocation');
    }

    public function createColocation (StoreColocationRequest $request)
    {
        return "validated";
    }
}
