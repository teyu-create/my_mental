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
        //$mentals = Mental::where('user_id', Auth::id())->get(); //ログインユーザーの記録が$mentalsに代入(例1)
        //$mentals = $request->user()->mentals; //ログインユーザーの記録が$mentalsに代入(例2)

        $cond_weather = $request->cond_weather;

        if ($cond_weather != null) {
            // 押した天気マークのメンタル記録を取得する
            $mentals = Mental::where('user_id', Auth::id())->where('mental_weather', $cond_weather)->orderByDesc('created_at')->paginate(7);//orderByDescで絞込み後のデータを降順（新しい順）に。
        } else {
            //$mentals = Mental::paginate(7); 　//←すべて(全ユーザー)のメンタル記録を取得するという意味になってしまっている
            $mentals = Mental::where('user_id', Auth::id())->orderByDesc('created_at')->paginate(7);
        }
        
        //dd($cond_weather);
        //dd($mentals);
        
        //記録ボタンが1日1回だけ押せるよう、whereで'user_id'カラムとログインユーザーのidが合致＋whereDateで当日記録したデータがあるか判断し、有る場合は$create_dayに代入
        $today = Carbon::today();

        // $user = Auth::user();
        // $user_id = $user->id;　//70,71行を有効にした場合、where('user_id',$user_id)とする
        $create_day = Mental::where('user_id', Auth::id())->whereDate('created_at', $today)->get();//ログインユーザーの当日データが有ると、Collectionという型で取得され$create_dayに代入

        

        return view('guest.mental.list', ['cond_weather' => $cond_weather,'create_day' => $create_day,'mentals' => $mentals]);
    }

    public function edit(Request $request)
    {
        // Mental Modelからログインユーザーのデータを取得する
        $mental = Mental::where('user_id', Auth::id())->where('id', $request->id)->first();
        // $mental = Mental::find($request->id);  //←だと別ユーザーが編集できてしまう
        
        if (empty($mental)) { //$mentalが空だったらエラー画面

            //abort(404); //←404エラー画面になる
            return view('guest.mental.error');

        }
        
        return view('guest.mental.edit', ['mental_form' => $mental]);//bladeでeditアクションの$mentalを表す表示が'mental_form'という意味（blade内では「$」を頭に付ける）
    }

    public function update(Request $request)
    {
       // Validationをかける
       $this->validate($request, Mental::$rules);

       // Mental Modelからログインユーザーのデータを取得する
       $mental = Mental::where('user_id', Auth::id())->where('id', $request->id)->first();
       // $mental = Mental::find($request->id); //←だと別ユーザーが更新できてしまう

       // 送信されてきたフォームデータを格納する
       $mental_form = $request->all();
      
       unset($mental_form['_token']);

       // 該当するデータを上書きして保存する
       $mental->fill($mental_form)->save();
       return redirect()->route('mental.list.index'); 
    }
}
