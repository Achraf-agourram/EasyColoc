<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add (Request $request)
    {
        $membership = auth()->user()->memberships()->where('isActive', true)->firstOrFail();

        if ($membership->role === 'owner') {
            Category::create([
                'title' => $request->name,
                'colocation_id' => $membership->colocation_id,
            ]);
        }

        return redirect()->back();
    }
}
