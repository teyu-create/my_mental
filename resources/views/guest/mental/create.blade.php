{{-- layouts/guest.blade.phpを読み込む --}}
@extends('layouts.guest')


{{-- guest.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メンタル記録')

{{-- guest.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
        <h2>今日の気分は？</h2>
            <div class="d-flex justify-content-between">
              <img src="{{ asset('image/晴れちゃん.png') }}">
              <img src="{{ asset('image/くもりちゃん.png') }}">
              <img src="{{ asset('image/雨ちゃん.png') }}">
            </div>
           <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 
                <label class="form-check-label" for="inlineRadio1">晴れ</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">くもり</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                <label class="form-check-label" for="inlineRadio3">雨</label>
              </div>
           </div>
      <div class="row">
        <div class="col-md-6">
          <h2>睡眠時間</h2>
              <div class="row gx-5">
              きのうの夜
                <input type="text" class="form-control-sleep">
              に寝て、
              </div>
              <p>
                <div class="row gx-5">
                きょうの朝
                  <input type="text" class="form-control-sleep">
                に起きた
                </div>
              </p>
        </div>
        <div class="col-md-6">
          <h2>ごはん</h2>
           <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">朝</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                <label class="form-check-label" for="inlineCheckbox2">昼</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                <label class="form-check-label" for="inlineCheckbox3">夜</label>
              </div>
           </div>
        </div>
      </div>
      <div class="row">
        <h2>お仕事/学校</h2>
        <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4"> 
            <label class="form-check-label" for="inlineRadio4">行った</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
            <label class="form-check-label" for="inlineRadio5">休んだ</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6">
            <label class="form-check-label" for="inlineRadio6">休日</label>
          </div>
        </div>

        <h2>どんな１日だった？</h2>
        <div class="mb-3">
          <textarea class="form-control2"></textarea>
        </div>
      </div>     
      <a class="btn btn-primary" href="{{ url('mental_list') }}" role="button">登録</a>
  </div>
@endsection