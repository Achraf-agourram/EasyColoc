<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function join (Request $request)
    {
        return Colocation::where('token', $request->token)->firstOrFail();
    }
}