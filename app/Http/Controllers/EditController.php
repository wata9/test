<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parts;

class EditController extends Controller
{
    public function index($id)
    {
        $part = new Parts;
        $part = $part->find($id);
        return view('parts.edit',compact('part'));
    }

    public function edit($id,Request $request)
    {
        $part = new Parts();
        // ↓このコードがないと編集ではなく、新しく登録されてしまう
        $part = $part->find($id);
        // 入庫のコード
        $part->quantity = $part->quantity + $request->plus;
        // 出庫のコード
        $part->quantity = $part->quantity - $request->minus;
        $part->fill($request->all())->save();
        
        return redirect('/');
    }
}
