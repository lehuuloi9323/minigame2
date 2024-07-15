<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LuckyNumberController extends Controller
{
    //
    public function guest(Request $request){
        return view('lucky_random_number');
    }
    public function add(Request $request){
        return view('lucky_number.add');
    }
}
