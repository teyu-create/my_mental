@extends('layouts.guest')

@section('title', 'トップ')

@section('content')
<div class="container">
<a class="btn btn-primary" href="{{ url('register') }}" role="button">アカウント作成</a>
<a class="btn btn-primary" href="{{ url('login') }}" role="button">ログイン</a>
</div>
@endsection