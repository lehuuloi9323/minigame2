<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\colorluckywheel;
use App\Models\listgift;


class LuckyWheelController extends Controller
{
    //

    public function guest(Request $request){
        $color = colorluckywheel::first();
        $lists = listgift::all();
        return view('lucky_wheel', compact('color', 'lists'));
    }
    public function color(Request $request){
        $color = colorluckywheel::find(1);
        // return $color;
        return view('luckywheel.config_color', compact('color'));
    }
    public function update_color(Request $request){
        $color = colorluckywheel::find(1);
        $color->update([
            'color_background' => $request->input('color_background'),
            'color_title' => $request->input('color_title'),
            'color_tab1' => $request->input('color_tab1'),
            'color_tab2' => $request->input('color_tab2'),
            'color_pointer' => $request->input('color_pointer'),
            'color_center' => $request->input('color_center'),
            'color_border' => $request->input('color_border'),
        ]);
        return redirect()->route('lucky_wheel.color')->with('status', 'Đã cập nhật thành công');
    }

    public function list(Request $request){
        $lists = listgift::all();
        return view('luckywheel.list_gift', compact('lists'));
    }
    public function edit_gift(Request $request, $id){
        $gift = listgift::find($id);
        return view('luckywheel.edit_gift', compact('gift'));
    }
    public function update_gift(Request $request, $id){
        // return $id;
        $gift = listgift::find($id);
        // return $gift;
        $request->validate([
            'name' => 'required',
            'percent' => 'required',
        ],
        [
            'required' => ':attribute không được để trống',
        ],
        [
            'name' => 'Tên phần thưởng',
            'percent' => 'Phần trăm trúng thưởng',
        ]);
        $gift->update([
            'name' => $request->name,
            'percent' => $request->percent,
        ]);
        return redirect()->route('lucky_wheel.list')->with('status','Cập nhật thành công');
    }
    public function create_gift(Request $request){
        return view('luckywheel.create_gift');
    }
    public function store_gift(Request $request){


        $request->validate([
            'name' => 'required',
            'percent' => 'required',
        ],
        [
            'required' => ':attribute không được để trống',
        ],
        [
            'name' => 'Tên phần thưởng',
            'percent' => 'Phần trăm trúng thưởng',
        ]);
        // return $request->all();
        $gift = listgift::create([
            'name' => $request->name,
            'percent' => $request->percent
        ]);
        return redirect()->route('lucky_wheel.create')->with('status', 'Đã thêm phần thưởng thành công !');
    }
    public function delete_gift(Request $request,$id){
        $gift = listgift::find($id);
        $gift->delete();    
        return redirect()->route('lucky_wheel.list')->with('status', 'Đã xóa thành công !');
    }
}
