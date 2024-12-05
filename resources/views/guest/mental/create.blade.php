{{-- layouts/guest.blade.phpを読み込む --}}
@extends('layouts.guest')


{{-- guest.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メンタル記録')

{{-- guest.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
      <div class="col-md-8 mx-auto">
        <h2>今日の気分は？</h2>
      </div>
      <div class="dotline">
        <div class ="mental_choice">
          <div class="d-flex justify-content-between">
            <img src="{{ asset('image/晴れマーク.png') }}" style="
                height: 136px;
                padding-top: 10px;">
            <img src="{{ asset('image/くもりマーク.png') }}" style="
                height: 141px;
                padding-top: 50px;">
            <img src="{{ asset('image/雨マーク.png') }}">
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
        </div>
      </div>
      <a class="btn btn-primary" href="{{ url('mental_list') }}" role="button">登録</a>
  </div>
@endsection