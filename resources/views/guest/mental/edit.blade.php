@extends('layouts.guest')
@section('title', '編集')

@section('content')
   <div class="container">
     <h2>{{ Str::limit($mental_form->created_at,10,"") }}の気分</h2>
        <form action="{{ route('mental.update') }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
                 <div class="d-flex justify-content-between">
                     <label for="sunny"><img src="{{ asset('image/sunny-chan.png') }}"></label>
                     <label for="cloudy"><img src="{{ asset('image/cloudy-chan.png') }}"></label>
                     <label for="rainy"><img src="{{ asset('image/rainy-chan.png') }}"></label>
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
                                <input type="time" min="00:00" max="23:59" class="form-control-sleep" name="sleep_time" value = "{{ $mental_form->sleep_time }}">
                                に寝て、
                            </div>
                            <p>
                            <div class="row gx-5">
                                きょうの朝
                                <input type="time" min="00:00" max="23:59" class="form-control-sleep" name="up_time" value = "{{ $mental_form->up_time }}">
                                に起きた
                            </div>
                            </p>
                    </div>
                    <div class="col-md-6">
                        <h2>ごはん</h2>
                        <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
                            <div class="form-check form-check-inline">
                              <label for="morning">朝</label>
                              @if(is_array(old('eat', $mental_form->eat)) and in_array("朝", old('eat', $mental_form->eat)))
                                 <input class="form-check-input" name="eat[]" type="checkbox" id="morning" value ="朝" checked>
                                  @elseif (!is_array(old('eat', $mental_form->eat))and str_contains(old('eat', $mental_form->eat),"朝")) 
                                     <input class="form-check-input" name="eat[]" type="checkbox" id="morning" value ="朝" checked>
                                  @else
                                 <input class="form-check-input" name="eat[]" type="checkbox" id="morning" value ="朝" >
                              @endif
                            </div>
                            <div class="form-check form-check-inline">
                              <label for="noon">昼</label>
                              @if(is_array(old('eat', $mental_form->eat)) and in_array("昼", old('eat', $mental_form->eat)))
                                 <input class="form-check-input" name="eat[]" type="checkbox" id="noon" value ="昼" checked>
                                 @elseif (!is_array(old('eat', $mental_form->eat))and str_contains(old('eat', $mental_form->eat),"昼")) 
                                     <input class="form-check-input" name="eat[]" type="checkbox" id="noon" value ="昼" checked>
                                 @else
                                 <input class="form-check-input" name="eat[]" type="checkbox" id="noon" value ="昼" >
                              @endif
                            </div>
                            <div class="form-check form-check-inline">
                              <label for="night">夜</label>
                              @if(is_array(old('eat', $mental_form->eat)) and in_array("夜", old('eat', $mental_form->eat)))
                                 <input class="form-check-input" name="eat[]" type="checkbox" id="night" value ="夜" checked>
                                 @elseif (!is_array(old('eat', $mental_form->eat))and str_contains(old('eat', $mental_form->eat),"夜")) 
                                     <input class="form-check-input" name="eat[]" type="checkbox" id="night" value ="夜" checked>
                                 @else
                                 <input class="form-check-input" name="eat[]" type="checkbox" id="night" value ="夜" >
                              @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h2>お仕事/学校</h2>
                    <div class="d-flex justify-content-between"style="padding-bottom: 30px;">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="go_or_home" id="gogo" value="行った" {{ old ('go_or_home', $mental_form->go_or_home) == '行った' ? 'checked' : '' }}> 
                            <label for="gogo">行った</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="go_or_home" id="in_home" value="休んだ" {{ old ('go_or_home', $mental_form->go_or_home) == '休んだ' ? 'checked' : '' }}>
                            <label for="in_home">休んだ</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="go_or_home" id="holiday" value="休日" {{ old ('go_or_home', $mental_form->go_or_home) == '休日' ? 'checked' : '' }}>
                            <label for="holiday">休日</label>
                            </div>
                    </div>

                    <h2>どんな１日だった？</h2>
                    <div class="mb-3">
                        <textarea class="form-control2" name="diary">{{ $mental_form->diary }}</textarea>
                    </div>
                </div> 
            <input type="hidden" name="id" value="{{ $mental_form->id }}">
            @csrf    
            <div class="d-flex justify-content-end"><input type="submit" class="btn btn-primary rounded-pill" value="更新"></div>
        </form>
   </div>
@endsection