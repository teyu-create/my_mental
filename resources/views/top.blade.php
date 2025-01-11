@extends('layouts.guest')

@section('title', 'トップ')

@section('content')
<div class="container">
  <div class="row">
     <div class="col-md-6 text-center" style="padding-bottom:25px">
         <a class="btn btn-success btn-lg rounded-pill col-6" href="{{ url('register') }}" role="button">アカウント作成</a>
     </div>
     <div class="col-md-6 text-center"><a class="btn btn-success btn-lg rounded-pill col-6" href="{{ url('login') }}" role="button">ログイン</a></div>
  </div>
</div>
@endsection