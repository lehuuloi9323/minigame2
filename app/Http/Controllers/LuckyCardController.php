<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\luckycard;
class LuckyCardController extends Controller
{
    //
    public function guest(Request $request){
        $luckycards = luckycard::all();
        return view('lucky_card', compact('luckycards'));
    }
    public function add(Request $request){
        return view('luckycard.add');
    }
    public function create(Request $request){

        $url = Str::after($request->url, 'Luckycard/');
        $luckycard = luckycard::create([
            'name' => $request->name,
            'percent' => $request->percent,
            'url' => $url
        ]);
        return redirect()->route('lucky_card.add')->with('status', 'Thêm dữ liệu thành công! ');
    }
    public function list(Request $request){
        $luckycards = luckycard::all();
        return view('luckycard.list', compact('luckycards'));
    }
    public function edit(Request $request, $id){
        $luckycard = luckycard::find($id);
        return view('luckycard.edit', compact('luckycard'));
    }
    public function update(Request $request, $id){
        $url = Str::after($request->url, 'Luckycard/');
        $luckycard = luckycard::find($id);
        $luckycard->update([
            'name' => $request->name,
            'percent' => $request->percent,
            'url' => $url
        ]);
        return redirect()->route('lucky_card.list')->with('status', 'Cập nhật thành công ! ');
    }
    public function delete(Request $request, $id){
        $luckycard = luckycard::find($id);
        $luckycard->delete();
        return redirect()->route('lucky_card.list')->with('status', 'Đã xóa thành công !');
    }
}
