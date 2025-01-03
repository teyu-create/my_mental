@extends('layouts.guest')
@section('title', '編集')

@section('content')
   <div class="container">
      <h2>まいにちの記録の編集</h2>
        <form action="{{ route('mental.update') }}" method="post" enctype="multipart/form-data">
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
                      <input type="radio" name="mental_weather" class="form-check-input" id="sunny" value="晴れ" {{ old ('mental_weather', $mental_form->mental_weather) == '晴れ' ? 'checked' : '' }}>
                      <label for="sunny">晴れ</label>
                     </div>
                     <div class="form-check form-check-inline">
                      <input type="radio" name="mental_weather" class="form-check-input" id="cloudy" value="くもり" {{ old ('mental_weather', $mental_form->mental_weather) == 'くもり' ? 'checked' : '' }}>
                      <label for="cloudy">くもり</label>
                     </div>
                     <div class="form-check form-check-inline">
                      <input type="radio" name="mental_weather" class="form-check-input"  id="rainy" value="雨" {{ old ('mental_weather', $mental_form->mental_weather) == '雨' ? 'checked' : '' }}>
                      <label for="rainy">雨</label>
                     </div>
                 </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2>睡眠時間</h2>
                            <div class="row gx-5">
                                きのうの夜
                                <input type="text" class="form-control-sleep" name="sleep_time" value = "{{ $mental_form->sleep_time }}">
                                に寝て、
                            </div>
                            <p>
                            <div class="row gx-5">
                                きょうの朝
                                <input type="text" class="form-control-sleep" name="up_time" value = "{{ $mental_form->up_time }}">
                                に起きた
                            </div>
                            </p>
                    </div>
                    <div class="col-md-6">
                        <h2>ごはん</h2>
                        <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" name="eat[]" type="checkbox" id="morning" value = "{{ $mental_form->eat }}">
                            <label for="morning">朝</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" name="eat[]" type="checkbox" id="noon" value="{{ $mental_form->eat }}">
                            <label for="noon">昼</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" name="eat[]" type="checkbox" id="night" value="{{ $mental_form->eat }}">
                            <label for="night">夜</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h2>お仕事/学校</h2>
                    <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="go_or_home" id="gogo" value="{{ $mental_form->go_or_home }}" > 
                            <label for="gogo">行った</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="go_or_home" id="in_home" value="{{ $mental_form->go_or_home }}">
                            <label for="in_home">休んだ</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="go_or_home" id="holiday" value="{{ $mental_form->go_or_home }}">
                            <label for="holiday">休日</label>
                            </div>
                    </div>

                    <h2>どんな１日だった？</h2>
                    <div class="mb-3">
                        <textarea class="form-control2" name="diary">{{ $mental_form->diary }}</textarea>
                    </div>
                </div> 
            @csrf    
            <input type="submit" class="btn btn-primary" value="更新">
        </form>
   </div>
@endsection