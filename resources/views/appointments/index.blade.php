@extends('layout')

@section('title')
Список заявок на прием
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
<table class="table table-sm table-bordered table-striped text-center">
    <thead>
        <tr>
            <th colspan="6">Все заявки на прием
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-link" type="submit">Выйти</button>
                </form>
            </th>
        </tr>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Дата</th>
            <th>Подтверждена</th>
            <th></th>
            <th></th>
        </tr>
    </thead>      
    <tbody>
        @foreach($appointments as $appointment)
        <tr>
            <td class='align-middle'>{{$appointment->id}}</td>
            <td class='align-middle'>{{$appointment->name}}</td>
            <td class='align-middle'>{{$appointment->date}}</td>
            <td class='text-center align-middle'>
                @if ($appointment->confirmed === 1)
                    <span style='color: green'>Да</span>
                @else
                    <span style='color: red'>Нет</span>
                @endif
            </td>
            <td class='align-middle'><a href="{{ route('appointments.edit',$appointment->id)}}" class="btn btn-primary">Изменить</a></td>
            <td class='align-middle'>
                <form action="{{ route('appointments.destroy', $appointment->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection