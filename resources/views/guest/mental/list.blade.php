{{-- layouts/guest.blade.phpを読み込む --}}
@extends('layouts.guest')


{{-- guest.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メンタル記録一覧')

{{-- guest.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
      <div class="col-md-8 mx-auto">
        <h2>まいにちの記録</h2>
      </div>
  </div>
@endsection