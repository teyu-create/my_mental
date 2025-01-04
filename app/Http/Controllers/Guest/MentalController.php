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

        // $form['eat'] 配列を文字列に変換して $mental->eat に代入する
        //$mental->eat = implode(",", $form['eat']);

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        /*フォームから送信されてきたimageを削除する
        unset($form['image']);*/

        // $form['eat'] で上書きされないように、unsetで消す(でないと文字列にしたものが配列に上書きされてしまう)
        //unset($form['eat']);

        // データベースに保存する
        $mental->fill($form);
        $mental->save();
        // 追記ここまで
        return redirect()->route('mental.create');
    }

    public function index(Request $request)
    {        
        $cond_weather = $request->cond_weather;
        if ($cond_weather != null) {
            // 検索されたら検索結果を取得する
            $posts = Mental::where('mental_weather', $cond_weather)->get();
        } else {
            // それ以外はすべてのメンタル記録を取得する
            $posts = Mental::all();
        }
        return view('guest.mental.list', ['posts' => $posts, 'cond_weather' => $cond_weather]);
    }

    public function edit(Request $request)
    {
        // Mental Modelからデータを取得する
        $mental = Mental::find($request->id);
        if (empty($mental)) {
            abort(404);
        }
        /*if (is_array($mental['eat'])){
           //$mental['eat'] 配列を文字列に変換して $mental->eat に代入する
            $mental->eat = implode(",", $mental['eat']);
        }*/
        
        return view('guest.mental.edit', ['mental_form' => $mental]);
    }

    public function update(Request $request)
    {
       // Validationをかける
       $this->validate($request, Mental::$rules);
       // Mental Modelからデータを取得する
       $mental = Mental::find($request->id);
       // 送信されてきたフォームデータを格納する
       $mental_form = $request->all();
       unset($mental_form['_token']);

       //dd($mental_form);

       // 該当するデータを上書きして保存する
       $mental->fill($mental_form)->save();
       return redirect()->route('mental.list.index'); 
    }
}
