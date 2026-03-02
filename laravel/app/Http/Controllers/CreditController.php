<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    public function pay (Request $request)
    {
        $creditToPay = Credit::with(['expense.person', 'person'])->where('user_id', Auth::id())->where('is_payed', false)->findOrFail($request->credit);
        $payerMembership = $creditToPay->person->memberships->where('isActive', true)->firstOrFail();
        $payeeMembership = $creditToPay->expense->person->memberships->where('isActive', true)->firstOrFail();

        $payerMembership->increment('balance', $creditToPay->amount);
        $payeeMembership->decrement('balance', $creditToPay->amount);

        $creditToPay->update(['is_payed' => true]);

        return redirect()->back();
    }
}
