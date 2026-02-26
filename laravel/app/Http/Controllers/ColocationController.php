<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColocationRequest;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        Colocation::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'token' => 'kfkfkfkkfkf',
            'owner_id' => Auth::id(),
        ]);

        return redirect('/mycolocation');
    }
}
