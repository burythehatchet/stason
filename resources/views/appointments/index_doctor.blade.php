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
            <th colspan="7">Все заявки для {{ $doctor }}
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
            <th>Время</th>
            <th>Услуга</th>
            <th>Описание</th>
            <th></th>
        </tr>
    </thead>      
    <tbody>
        @foreach($appointments as $appointment)
        <tr>
            <td style='width: 5%' class='align-middle'>{{$appointment->id}}</td>
            <td style='width: 10%' class='align-middle'>{{$appointment->name}}</td>
            <td style='width: 10%' class='align-middle'>{{$appointment->date}}</td>
            <td style='width: 10%' class='align-middle'>{{$appointment->time}}</td>
            <td style='width: 10%' class='align-middle'>{{$appointment->service}}</td>
            <td style='width: 58%' class='text-left align-middle'>{{$appointment->description}}</td>
            <td style='width: 5%' class='align-middle'>
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