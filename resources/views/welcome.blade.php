

@extends('layout')

@section('title')
Основной раздел
@endsection

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}  
    </div><br />
    @endif
    @if (Route::has('login'))
                    @auth
                        <a class='btn btn-outline-primary' href="{{ url('/appointments') }}">Заявки на прием</a>
                    @else
                        <a class='btn btn-outline-primary' href="{{ route('login') }}">Войти</a>
                    @endauth
    @endif

@endsection