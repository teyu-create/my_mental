<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 以下の1行を追記することで、Mental Modelが扱えるようになる
use App\Models\Mental;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class MentalController extends Controller
{
    //
    public function add()
    {
        return view('guest.mental.create');
    }

    public function create(Request $request)
    {

        // 以下を追記]
        // Validationを行う
        $this->validate($request, Mental::$rules);

        $mental = new Mental;
        $form = $request->all();

        /* $form['eat'] 配列を文字列に変換して $mental->eat に代入する
        $mental->eat = implode(",", $form['eat']);*/

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        /*$form['eat'] で上書きされないように、unsetで消す(でないと文字列にしたものが配列に上書きされてしまう)
        unset($form['eat']);*/

        // データベースに保存する
        $mental->user_id = $request->user()->id;
        $mental->fill($form);
        $mental->save();
        // 追記ここまで
        return redirect()->route('mental.list.index');
    }

    public function index(Request $request)
    {        
        $mentals = Mental::where('user_id', Auth::id())->get(); //ログインユーザーの記録が$mentalsに代入

        $cond_weather = $request->cond_weather;

       /* if ($cond_weather != null) {
            // 押した天気マークのメンタル記録を取得する
            $posts = Mental::where('mental_weather', $cond_weather)->paginate(7);
        } else {
            // それ以外はすべて(全ユーザー)のメンタル記録を取得する
            //$posts = Mental::paginate(7);
            $posts = Mental::where('user_id', Auth::id())->paginate(7);
        }*/

        //dd($cond_weather);
        
        //記録ボタンが1日1回だけ押せるよう、whereDateで当日既に記録したデータがあれば取得
        $today = Carbon::today();
        $create_day = Mental::whereDate('created_at', $today)->get();//当日のデータが有ると、Collectionという型で取得され$create_dayに代入

        return view('guest.mental.list', [/*'posts' => $posts,*/'cond_weather' => $cond_weather, 'create_day' => $create_day, 'mentals' => $mentals]);
    }

    public function edit(Request $request)
    {
        // Mental Modelからデータを取得する
        $mental = Mental::find($request->id);
        if (empty($mental)) {
            abort(404);
        }
        
        return view('guest.mental.edit', ['mental_form' => $mental]);//bladeでeditアクションの$mentalを表す表示が'mental_form'という意味（blade内では「$」を頭に付ける）
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

       // 該当するデータを上書きして保存する
       $mental->fill($mental_form)->save();
       return redirect()->route('mental.list.index'); 
    }
}
