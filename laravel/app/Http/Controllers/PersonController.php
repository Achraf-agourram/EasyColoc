<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function quit ()
    {
        $myMembership = auth()->user()->memberships()->with('colocation.owner')->where('isActive', true)->firstOrFail();

        if ($myMembership->role === 'owner') return redirect()->back()->withErrors('Owner ne peut pas quitter la colocation !');

        $myCredits = auth()->user()->credits()->with('expense')->where('is_payed', false)->get();
        $colocationOwnerMembership = $myMembership->colocation->owner->memberships()->where('isActive', true)->firstOrFail();
        
        foreach ($myCredits as $credit) {
            $credit->update(['user_id' => $myMembership->colocation->owner->id]);

            if ($credit->expense->user_id === $myMembership->colocation->owner->id) $credit->update(['is_payed' => true]);

            $colocationOwnerMembership->decrement('balance', $credit->amount);
        }
        
        auth()->user()->decrement('reputation', 1);
        $myMembership->update(['balance' => 0, 'isActive' => false, 'leftAt' => Carbon::today()]);

        return redirect('/mycolocation')->withErrors('Vous avez quitter la colocation');
    }
}
