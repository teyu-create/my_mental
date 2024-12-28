{{-- layouts/guest.blade.phpを読み込む --}}
@extends('layouts.guest')


{{-- guest.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メンタル記録')

{{-- guest.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
   <div class="container">
      <h2>今日の気分は？</h2>
        <form action="{{ route('mental.create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                  <div class="d-flex justify-content-between">
                    <label for="sunny"><img src="{{ asset('image/晴れちゃん.png') }}"></label>
                    <label for="cloudy"><img src="{{ asset('image/くもりちゃん.png') }}"></label>
                    <label for="rainy"><img src="{{ asset('image/雨ちゃん.png') }}"></label>
                  </div>
                 <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="mental_weather"  value="晴れ" id="sunny" checked >
                      <label for="sunny">晴れ</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="mental_weather"  value="くもり" id="cloudy">
                      <label for="cloudy">くもり</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="mental_weather" value="雨" id="rainy">
                      <label for="rainy">雨</label>
                    </div>
                 </div>
            <div class="row">
              <div class="col-md-6">
                <h2>睡眠時間</h2>
                    <div class="row gx-5">
                    きのうの夜
                      <input type="text" class="form-control-sleep" name="sleep_time" value = "{{ old('sleep_time') }}">
                    に寝て、
                    </div>
                    <p>
                      <div class="row gx-5">
                      きょうの朝
                        <input type="text" class="form-control-sleep" name="up_time" value = "{{ old('up_time') }}">
                      に起きた
                      </div>
                    </p>
              </div>
              <div class="col-md-6">
                <h2>ごはん</h2>
                <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="eat[]" type="checkbox" id="morning" value='朝'>
                      <label for="morning">朝</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="eat[]" type="checkbox" id="noon" value='昼'>
                      <label for="noon">昼</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="eat[]" type="checkbox" id="night" value='夜'>
                      <label for="night">夜</label>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <h2>お仕事/学校</h2>
              <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="go_or_home" id="gogo" value="行った" checked> 
                  <label for="gogo">行った</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="go_or_home" id="in_home" value="休んだ">
                  <label for="in_home">休んだ</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="go_or_home" id="holiday" value="休日">
                  <label for="holiday">休日</label>
                </div>
              </div>

              <h2>どんな１日だった？</h2>
              <div class="mb-3">
                <textarea class="form-control2" name="diary">{{ old('diary') }}</textarea>
              </div>
            </div> 
            @csrf    
            <input type="submit" class="btn btn-primary" value="登録">
        </form>
   </div>
@endsection