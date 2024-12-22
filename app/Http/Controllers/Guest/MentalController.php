<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の1行を追記することで、Mental Modelが扱えるようになる
use App\Models\Mental;

class MentalController extends Controller
{
    //
    public function add()
    {
        return view('guest.mental.create');
    }

    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Mental::$rules);

        $mental = new Mental;
        $form = $request->all();

        /*フォームから画像が送信されてきたら、保存して、$mental->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $mental->image_path = basename($path);
        } else {
            $mental->image_path = null;
        }*/

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        /*フォームから送信されてきたimageを削除する
        unset($form['image']);*/

        // データベースに保存する
        $mental->fill($form);
        $mental->save();
        // 追記ここまで
        return redirect()->route('mental.create');
    }

    public function index()
    {
        return view('guest.mental.list');
    }
}
