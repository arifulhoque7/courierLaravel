<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Carbon\Carbon;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'company' => 'string',
        ]);

    
        Subscriber::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'company'=> $request->company,
            'created_at'=> Carbon::now(),
        ]);

        return back()->with('success', 'Subscribed Successfully..!!');
    }
}
