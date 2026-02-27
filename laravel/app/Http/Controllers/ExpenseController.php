<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function add (StoreExpenseRequest $request)
    {
        $membership = auth()->user()->memberships()->where('isActive', true)->firstOrFail();

        Expense::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => Carbon::today(),
            'user_id' => Auth::id(),
            'colocation_id' => $membership->colocation_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->back();
    }
}
