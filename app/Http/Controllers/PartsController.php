<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parts;

class PartsController extends Controller
{
        /**
     * 部品一覧
     * 
     * @param Request $request
     * @return Request
     */
    public function index(Request $request)
    {
        $parts = Parts::orderBY('number','asc')->get();
        return view('parts.index',[
            'parts' => $parts,'keyword' => '','quantity' => ''
        ]);
    }
        /**
     * 部品削除
     */
    public function destroy($id)
    {
        $part = Parts::find($id);
        $part->delete();

        return redirect('/');
    }
    /**
     * 検索
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $quantity = $request->input('quantity');

        $query = Parts::query();

        if(!empty($keyword)){
            $query->where('name','LIKE',"%{$keyword}%");
        }
        if(!empty($quantity)){
            $query->where('quantity', '>=',$quantity);
        }

        $parts = $query->get();

        return view('parts.index',compact('parts','keyword','quantity'));
    }
}
