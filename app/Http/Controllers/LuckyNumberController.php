<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Excel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\random_numberImport;
use App\Models\random_number;


class LuckyNumberController extends Controller
{
    //

    public function guest(Request $request){
        $random_numbers = random_number::all();
        return view('lucky_random_number', compact('random_numbers'));
    }
    public function add(Request $request){
        return view('lucky_number.add');
    }

    public function store(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv,xla',
        ]);
        $random_numbers = random_number::all();
        foreach ($random_numbers as $random_number) {
            $random_number->delete();
        }
        Excel::import(new random_numberImport, $request->file('file'));
        return redirect()->back()->with('status', 'Data Imported Successfully');
    }

    public function delete(Request $request){
        $random_numbers = random_number::all();
        foreach ($random_numbers as $random_number) {
            $random_number->delete();
        }
        return redirect()->back()->with('status', 'Xóa toàn bộ người chơi thành công !');
    }
}
