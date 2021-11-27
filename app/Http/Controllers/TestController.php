<?php

namespace App\Http\Controllers;

use App\Captain;
use App\Branch;
use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Helpers\TransactionHelper;
use App\Transaction;
use Illuminate\Http\Request;
use DB;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('text');
    }

    
}
