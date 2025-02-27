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
               <form action="{{ route('mental.list.index') }}" method="get">
                  <select name="sort">
                      <option value="newest" {{request('sort') == 'newest' ? 'selected' : ''}}>新しい順</option>
                      <option value="oldest" {{request('sort') == 'oldest' ? 'selected' : ''}}>古い順</option>
                  </select> 
               </form>
            </div>
            <div class="col-6 p-0">
                <form action="{{ route('mental.list.index') }}" method="get" style="height: 0px">
                    <input type="submit" class="mental-weather-index" id="index-sunny" name="cond_weather" value="晴れ">
                    <input type="submit" class="mental-weather-index" id="index-cloudy" name="cond_weather" value="くもり">
                    <input type="submit" class="mental-weather-index" id="index-rainy" name="cond_weather" value="雨">
                </form>
              @if($cond_weather == "晴れ")
                <label class="mental-weather-index-button" for="index-sunny"><img src="{{ asset('image/sel-sunny-chan.png') }}" alt="晴れ選択" style="width: 45px"></label>
                <label class="mental-weather-index-button" for="index-cloudy"><img src="{{ asset('image/cloudy_button.png') }}" alt="くもり" style="width: 45px"></label>
                <label class="mental-weather-index-button" for="index-rainy"><img src="{{ asset('image/rainy_button.png') }}" alt="雨" style="width: 45px"></label>
                <div style="padding-left: 35px; padding-right: 35px;">
                  <a style="font-size: 11px" href="{{ url('/') }}">全表示に戻る☀☁☂</a>
                </div>
              @elseif($cond_weather == "くもり") 
                <label class="mental-weather-index-button" for="index-sunny"><img src="{{ asset('image/sunny_button.png') }}" alt="晴れ" style="width: 45px"></label>
                <label class="mental-weather-index-button" for="index-cloudy"><img src="{{ asset('image/sel-cloudy-chan.png') }}" alt="くもり選択" style="width: 45px"></label>
                <label class="mental-weather-index-button" for="index-rainy"><img src="{{ asset('image/rainy_button.png') }}" alt="雨" style="width: 45px"></label>
                <div style="padding-left: 35px; padding-right: 35px;">
                  <a style="font-size: 11px" href="{{ url('/') }}">全表示に戻る☀☁☂</a>
                </div>
              @elseif($cond_weather == "雨")
                <label class="mental-weather-index-button" for="index-sunny"><img src="{{ asset('image/sunny_button.png') }}" alt="晴れ" style="width: 45px"></label>
                <label class="mental-weather-index-button" for="index-cloudy"><img src="{{ asset('image/cloudy_button.png') }}" alt="くもり" style="width: 45px"></label>
                <label class="mental-weather-index-button" for="index-rainy"><img src="{{ asset('image/sel-rainy-chan.png') }}" alt="雨選択" style="width: 45px"></label>
                <div style="padding-left: 35px; padding-right: 35px;">
                  <a style="font-size: 11px" href="{{ url('/') }}">全表示に戻る☀☁☂</a>
                </div>
              @else
                <label class="mental-weather-index-button" for="index-sunny"><img src="{{ asset('image/sunny_button.png') }}" alt="晴れ" style="width: 45px"></label>
                <label class="mental-weather-index-button" for="index-cloudy"><img src="{{ asset('image/cloudy_button.png') }}" alt="くもり" style="width: 45px"></label>
                <label class="mental-weather-index-button" for="index-rainy"><img src="{{ asset('image/rainy_button.png') }}" alt="雨" style="width: 45px"></label>
              @endif
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
                                <tr>
                                     <td colspan="5" align="right" class="pt-0">
                                         <a href="{{ route('mental.edit', ['id' => $mental_date->id]) }}" role="button" class="btn btn-primary btn-sm rounded-pill">編集/詳細</a>
                                     </td>
                                </tr>
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