<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Membership;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function join (Request $request)
    {
        $colocationToJoin = Colocation::where('token', $request->token)->firstOrFail();

        $membership = auth()->user()->memberships()->where('isActive', true)->first();

        if (!$membership) {
            Membership::create([
                'role' => 'member',
                'joinedAt' => Carbon::today(),
                'user_id' => Auth::id(),
                'colocation_id' => $colocationToJoin->id,
            ]);
        }

        return redirect('/colocation/'.$request->token);
    }
}