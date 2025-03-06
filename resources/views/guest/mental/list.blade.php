{{-- layouts/guest.blade.phpを読み込む --}}
@extends('layouts.guest')

{{-- guest.blade.phpの@yield('title')に'メンタル記録一覧'を埋め込む --}}
@section('title', 'メンタル記録一覧')

{{-- guest.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container pt-3 pb-4">
        <div class="row">
            <div class="col-6 p-0">
              @if($create_day->isEmpty()){{--isEmptyでCollection型の変数が空か判断。当日の記録データの有無を判定し、記録を1日1回に制限--}}
                  <a href="{{ route('mental.add') }}" role="button" class="btn btn-primary rounded-pill">今日の記録をする</a>
              @else
                  <button type="button" class="btn btn-primary rounded-pill" disabled>今日は記録済み</button>
              @endif 
            </div>
            <div class="col-6 p-0">
              <form action="{{ route('mental.list.index') }}" method="get" style="height: 0px">
                @if($cond_weather == '晴れ')
                  <input type="radio" class="form-check-input" name="cond_weather" value="晴れ" id="index-sunny" checked>
                  <label for="index-sunny">☀</label>
                @else
                  <input type="radio" class="form-check-input" name="cond_weather" value="晴れ" id="index-sunny">
                  <label for="index-sunny">☀</label>
                @endif
                @if($cond_weather == 'くもり')
                  <input type="radio" class="form-check-input" name="cond_weather" value="くもり" id="index-cloudy" checked>
                  <label for="index-cloudy">☁</label>
                @else
                  <input type="radio" class="form-check-input" name="cond_weather" value="くもり" id="index-cloudy">
                  <label for="index-cloudy">☁</label>
                @endif
                @if($cond_weather == '雨')
                  <input type="radio" class="form-check-input" name="cond_weather" value="雨" id="index-rainy" checked>
                  <label for="index-rainy">☂</label>
                @else
                  <input type="radio" class="form-check-input" name="cond_weather" value="雨" id="index-rainy">
                  <label for="index-rainy">☂</label>
                @endif
                @if($cond_weather == '全て' or is_null($cond_weather))
                  <input type="radio" class="form-check-input" name="cond_weather" value="全て" id="index-all" checked>
                  <label for="index-all">全て</label>
                @else
                  <input type="radio" class="form-check-input" name="cond_weather" value="全て" id="index-all" >
                  <label for="index-all">全て</label>
                @endif
                <p>
                  <input type="submit" name="new_day" value="新しい順" >
                  <input type="submit" name="old_day" value="古い順" >
                </p>
              </form>
            </div>
        </div>
  </div>
  <div class="container" style="padding-top: 0px;">
        <div class="row">
                    <table class="table table-dark">
                        <thead align="center">
                            <tr>
                                <th class="border border-3 border-top-0 border-end-0 border-start-0"></th>
                                <th class="border border-3 border-top-0 border-end-0 border-start-0">気分</th>
                                <th class="border border-3 border-top-0 border-end-0 border-start-0">ごはん</th>
                                <th class="border border-3 border-top-0 border-end-0 border-start-0">お仕事／学校</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mentals as $mental_date)
                                <tr>
                                    <td class="mental-table-body border-bottom-0">{{ Str::limit($mental_date->created_at,10,"") }}</td>
                                    @if (false !== strpos("晴れ",$mental_date->mental_weather))
                                      <td class="mental-table-body border-bottom-0"><img src="{{ asset('image/sunny-chan.png') }}" style="width: 42px;"></td>
                                     @elseif(false !== strpos("くもり",$mental_date->mental_weather))
                                      <td class="mental-table-body border-bottom-0"><img src="{{ asset('image/cloudy-chan.png') }}" style="width: 42px;"></td>
                                     @else
                                      <td class="mental-table-body border-bottom-0"><img src="{{ asset('image/rainy-chan.png') }}" style="width: 42px;"></td>
                                    @endif
                                    @if (!is_array($mental_date->eat)){{--もしeatが配列じゃなかったら、中身をそのまま表示--}}
                                    <td class="mental-table-body border-bottom-0">{{ $mental_date->eat }}</td>
                                    @else
                                    <td class="mental-table-body border-bottom-0">{{ implode(",", $mental_date->eat) }}</td>{{--配列の場合、中身を","で区切って文字列として表示--}}
                                    @endif
                                    <td class="mental-table-body border-bottom-0 pt-0 pb-0">{{ $mental_date->go_or_home }}</td>
                                </tr>
                                {{--<tr>
                                     <td colspan="5" align="right" class="pt-0">
                                         <a href="{{ route('mental.edit', ['id' => $mental_date->id]) }}" role="button" class="btn btn-primary btn-sm rounded-pill">編集/詳細</a>
                                     </td>
                                </tr>--}}
                                <form action="{{ route('mental.edit') }}" method="get" >
                                  <input type="hidden" name="id" value="{{$mental_date->id}}">
                                  <input type="hidden" name="cond_weather" value="{{$cond_weather}}">
                                  <input type="hidden" name="new_day" value="{{$new_day}}">
                                  <input type="hidden" name="old_day" value="{{$old_day}}">
                                  <tr>
                                    <td colspan="5" align="right" class="pt-0">
                                        <input type="submit" class="btn btn-primary btn-sm rounded-pill" role="button" value="編集/詳細">
                                    </td>
                                  </tr>
                                </form>

                            @endforeach
                        </tbody>
                    </table>
        </div>
        <!--ページネーションリンク-->
        <div class="d-flex justify-content-center" style="padding-top: 50px;">
          {{ $mentals->appends(request()->query())->links() }}{{--appends(request()->query())とすることで天気マークで絞込み後もページネーションが有効になる--}}
        </div>
  </div>
@endsection