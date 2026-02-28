<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Credit;
use App\Models\Expense;
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function add (StoreExpenseRequest $request)
    {
        $myMembership = auth()->user()->memberships()->where('isActive', true)->firstOrFail();

        $expense = Expense::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => Carbon::today(),
            'user_id' => Auth::id(),
            'colocation_id' => $myMembership->colocation_id,
            'category_id' => $request->category_id,
        ]);

        $roommates = Membership::where('colocation_id', $myMembership->colocation_id)->where('isActive', true)->where('user_id', '!=', $myMembership->user_id)->get();
        $amountToPay = $expense->amount / ($roommates->count() + 1);

        foreach($roommates as $mate) {

            Credit::create([
                'amount' => $amountToPay,
                'user_id' => $mate->user_id,
                'expense_id' => $expense->id,
            ]);

            $mate->decrement('balance', $amountToPay);
        }

        $myMembership->increment('balance', $amountToPay);

        return redirect()->back();
    }
}
