<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColocationRequest;
use App\Models\Colocation;
use App\Models\Membership;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    public function mycolocation ()
    {
        $activeMembership = auth()->user()->memberships()->where('isActive', true)->first();
        
        return view('mycolocation', compact('activeMembership'));
    }

    public function colocationForm ()
    {
        return view('createcolocation');
    }

    public function createColocation (StoreColocationRequest $request)
    {
        $activeMembership = auth()->user()->memberships()->where('isActive', true)->first();

        if (!$activeMembership) {
            $createdColocation = Colocation::create([
                'name' => $request->name,
                'address' => $request->address,
                'token' => Colocation::generateToken(),
                'owner_id' => Auth::id(),
            ]);

            Membership::create([
                'role' => 'owner',
                'joinedAt' => Carbon::today(),
                'user_id' => Auth::id(),
                'colocation_id' => $createdColocation->id,
            ]);

            if (Auth::user()->person) Auth::user()->person->update(['isOwner' => true]);
        }

        return redirect('/mycolocation');
    }

    public function currentColocation ($token)
    {
        $colocation = Colocation::with(['categories', 'memberships.person'])->where('token', $token)->where('is_active', true)->firstOrFail();
        $membership = auth()->user()->memberships()->where('isActive', true)->firstOrFail();

        if ($membership->colocation_id === $colocation->id) {

            $roommates = $colocation->memberships;
            return view('currentcolocation', compact(['colocation', 'membership', 'roommates']));
        }

        abort(404);
    }
}
