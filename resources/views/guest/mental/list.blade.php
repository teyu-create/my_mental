{{-- layouts/guest.blade.phpを読み込む --}}
@extends('layouts.guest')

{{-- guest.blade.phpの@yield('title')に'メンタル記録一覧'を埋め込む --}}
@section('title', 'メンタル記録一覧')

{{-- guest.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
      {{--<h2>まいにちの記録</h2>--}}
                <form action="{{ route('mental.list.index') }}" method="get">
                    <div class="form-group row">
                        <!--<div class="col-md-8">
                            <input type="text" class="form-control" name="cond_weather" value="{{ $cond_weather }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="気分を検索">
                        </div>-->
                        <div class="col-md-6">
                             @csrf
                             <label for="index-sunny"><img src="{{ asset('image/晴れちゃん.png') }}" alt="晴れ" style="width: 30px;"></label>
                             <label for="index-cloudy"><img src="{{ asset('image/くもりちゃん.png') }}" alt="くもり" style="width: 30px;"></label>
                             <label for="index-rainy"><img src="{{ asset('image/雨ちゃん.png') }}" alt="雨" style="width: 30px;"></label>
                             <p>
                                 <input type="submit" class="mental-weather-index" id="index-sunny" name="cond_weather" value="晴れ">
                                 <input type="submit" class="mental-weather-index" id="index-cloudy" name="cond_weather" value="くもり">
                                 <input type="submit" class="mental-weather-index" id="index-rainy" name="cond_weather" value="雨">
                            </p>
                        </div>
                    </div>
                </form>
        <div class="row">
                    <table class="table table-dark">
                        <thead align="center">
                            <tr>
                                <th class="border border-3 border-top-0 border-end-0 border-start-0"></th>
                                <th class="border border-3 border-top-0 border-end-0 border-start-0">気分</th>
                                <!--<th width="10%">睡眠時間</th>
                                <th width="10%">起床時間</th>-->
                                <th class="border border-3 border-top-0 border-end-0 border-start-0">ごはん</th>
                                <th class="border border-3 border-top-0 border-end-0 border-start-0">お仕事／学校</th>
                                <!--<th width="27%"></th>-->
                                <!--<th width="10%">どんな1日？</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $mental)
                                <tr>
                                    <td class="mental-table-body border-bottom-0">{{ Str::limit($mental->created_at,10,"") }}</td>
                                    @if (false !== strpos("晴れ",$mental->mental_weather))
                                      <td class="mental-table-body border-bottom-0"><img src="{{ asset('image/晴れちゃん.png') }}" style="width: 42px;"></td>
                                     @elseif(false !== strpos("くもり",$mental->mental_weather))
                                      <td class="mental-table-body border-bottom-0"><img src="{{ asset('image/くもりちゃん.png') }}" style="width: 42px;"></td>
                                     @else
                                      <td class="mental-table-body border-bottom-0"><img src="{{ asset('image/雨ちゃん.png') }}" style="width: 42px;"></td>
                                    @endif
                                    <!--<td>{{ $mental->sleep_time }}</td>
                                    <td>{{ $mental->up_time }}</td>-->
                                    @if (!is_array($mental->eat)){{--もしeatが配列じゃなかったら、中身をそのまま表示--}}
                                    <td class="mental-table-body border-bottom-0">{{ $mental->eat }}</td>
                                    @else
                                    <td class="mental-table-body border-bottom-0">{{ implode(",", $mental->eat) }}</td>{{--配列の場合、中身を","で区切って文字列として表示--}}
                                    @endif
                                    <td class="mental-table-body border-bottom-0 pt-0 pb-0">{{ $mental->go_or_home }}</td>
                                </tr>
                                <tr>
                                     <td colspan="5" align="right" class="pt-0">
                                         <a href="{{ route('mental.edit', ['id' => $mental->id]) }}" role="button" class="btn btn-primary btn-sm">編集/詳細</a>
                                     </td>
                                </tr>
                                    <!--<td>{{ Str::limit($mental->diary, 250,"…") }}</td>-->
                            @endforeach
                        </tbody>
                    </table>
            <div class="col-md-4 text-center">
              @if($create_day->isEmpty())<!--isEmptyでCollection型の変数が空か判断。当日の記録データの有無を判定し、記録を1日1回に制限-->
                 <a href="{{ route('mental.add') }}" role="button" class="btn btn-primary">今日の記録をする</a>
                 @else
                 <button type="button" class="btn btn-primary" disabled>本日は記録済み</button>
              @endif
            </div>
        </div>
  </div>
@endsection