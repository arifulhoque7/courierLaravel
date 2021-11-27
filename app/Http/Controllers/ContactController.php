<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'number' => 'required|numeric',
        ]);

    
        ContactModel::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'number'=> $request->number,
            'message'=> $request->message,
            'created_at'=> Carbon::now(),
        ]);

        return back()->with('success', 'Send Your Message Successfully..!!');
    }
}
