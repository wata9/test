<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parts;

class RegisterController extends Controller
{
    /**
     * 部品登録画面
     */
    public function index(Request $request)
    {
        return view('parts.register');
    }

    /**
     * 部品登録
     * 
     * @param Request $Request
     * @return Reaponse
     */
    public function store(Request $request)
    {
        $parts = new Parts;
        $parts->fill($request->all())->save();

        return redirect('/');
    }
}
