@extends('layout')

@section('title')
Запись на прием
@endsection

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}  
    </div><br />
    @endif
    <form method="post" action="{{ route('appointments.store') }}">
		<div class='row'>
            <div class='col'>
                <div class="form-group">
                    @csrf
                    <label for="name">Ваше имя:</label>
                    <input type="text" class="form-control" name="appointment_name"/>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col'>
                <div class="form-group">
                    <label for="phone">Контактный телефон:</label>
                    <input type="tel" class="form-control" name="appointment_phone"/>
                </div>
            </div>
            <div class='col'>
                <div class="form-group">
                    <label for="email">Контактный e-mail:</label>
                    <input type="email" class="form-control" name="appointment_email"/>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col'>
                <div class="form-group">
                    <label for="date">Желаемая дата:</label>
                <input type="date" class="form-control" min="{{ date("Y-m-d") }}" max="{{ date('Y-m-d', strtotime('+1 month')) }}" name="appointment_date"/>
                </div>
            </div>
            <div class='col'>
                <div class="form-group">
                    <label for="time">Желаемое время:</label>
                    <select class="form-control" name="appointment_time">
                        <option value="10:00:00">10:00</option>
                        <option value="11:00:00">11:00</option>
                        <option value="12:00:00">12:00</option>
                        <option value="13:00:00">13:00</option>
                        <option value="14:00:00">14:00</option>
                        <option value="15:00:00">15:00</option>
                        <option value="16:00:00">16:00</option>
                        <option value="17:00:00">17:00</option>
                        <option value="18:00:00">18:00</option>
                        <option value="19:00:00">19:00</option>
                        <option value="20:00:00">20:00</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col'>
                <div class="form-group">
                    <label for="description">Какая услуга Вас интересует:</label>
                    <input type="text" class="form-control" name="appointment_description"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col'>
                <button type="submit" class="btn btn-primary w-100">Записаться на прием</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection