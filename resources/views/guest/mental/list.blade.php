{{-- layouts/guest.blade.phpを読み込む --}}
@extends('layouts.guest')

{{-- guest.blade.phpの@yield('title')に'メンタル記録一覧'を埋め込む --}}
@section('title', 'メンタル記録一覧')

{{-- guest.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
      <h2>まいにちの記録</h2>
        <div class="row">
            <!--
            <div class="col-md-4">
              <a href="{{ route('mental.add') }}" role="button" class="btn btn-primary">今日の記録をする</a>
            </div>
            -->
            <div class="col-md-8">
                <form action="{{ route('mental.list.index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_weather" value="{{ $cond_weather }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="気分を検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="28%"></th>
                                <th>気分</th>
                                <!--<th width="10%">睡眠時間</th>
                                <th width="10%">起床時間</th>-->
                                <th>ごはん</th>
                                <th>お仕事／学校</th>
                                <!--<th width="10%">どんな1日？</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $mental)
                                <tr>
                                    <td>{{ Str::limit($mental->created_at,10,"") }}</td>
                                    @if (false !== strpos("晴れ",$mental->mental_weather))
                                      <td><img src="{{ asset('image/晴れちゃん.png') }}" style="width: 42px;"></td>
                                     @elseif(false !== strpos("くもり",$mental->mental_weather))
                                      <td><img src="{{ asset('image/くもりちゃん.png') }}" style="width: 42px;"></td>
                                     @else
                                      <td><img src="{{ asset('image/雨ちゃん.png') }}" style="width: 42px;"></td>
                                    @endif
                                    <!--<td>{{ $mental->sleep_time }}</td>
                                    <td>{{ $mental->up_time }}</td>-->
                                    @if (!is_array($mental->eat)){{--もしeatが配列じゃなかったら、中身をそのまま表示--}}
                                    <td>{{ $mental->eat }}</td>
                                    @else
                                    <td>{{ implode(",", $mental->eat) }}</td>{{--配列の場合、中身を","で区切って文字列として表示--}}
                                    @endif
                                    <td>{{ $mental->go_or_home }}</td>
                                    <td>
                                     <a href="{{ route('mental.edit', ['id' => $mental->id]) }}" role="button" class="btn btn-primary btn-sm">編集/詳細</a>
                                    </td>
                                    <!--<td>{{ Str::limit($mental->diary, 250,"…") }}</td>-->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            <div class="col-md-4">
              @if($create_day->empty())<!--変数や配列が空か判断するemptyで当日の記録データがあるか判定し、記録を1日1回に制限-->
                 <button type="button" class="btn btn-primary" disabled>本日は記録済み</button>
                 @else
                 <a href="{{ route('mental.add') }}" role="button" class="btn btn-primary">今日の記録をする</a>
              @endif
            </div>
        </div>
  </div>
@endsection