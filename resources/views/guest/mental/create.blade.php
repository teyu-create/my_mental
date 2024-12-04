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
      <div class="d-flex justify-content-between">
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
@endsection