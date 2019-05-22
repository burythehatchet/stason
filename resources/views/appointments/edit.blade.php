@extends('layout')

@section('title')
Обработка заявки
@endsection

@section('content')
<style>
    .uper {
        margin-top: 40px;
        margin-bottom: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Обработка заявки
    </div>
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
    <form method="post" action="{{ route('appointments.update', $appointment->id) }}">
        @method('PATCH')
        @csrf
		<div class='row'>
            <div class='col'>
                <div class="form-group">
                    @csrf
                    <label for="name">Ваше имя:</label>
                    <input type="text" class="form-control" name="appointment_name" value="{{ $appointment->name }}" />
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col'>
                <div class="form-group">
                    <label for="phone">Контактный телефон:</label>
                    <input type="tel" class="form-control" name="appointment_phone" value="{{ $appointment->phone }}" />
                </div>
            </div>
            <div class='col'>
                <div class="form-group">
                    <label for="email">Контактный e-mail:</label>
                    <input type="email" class="form-control" name="appointment_email" value="{{ $appointment->email }}" />
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col'>
                <div class="form-group">
                    <label for="date">Дата:</label>
                    <input type="date" class="form-control" name="appointment_date" onchange="document.getElementsByName('appointment_doctor')[0].value = '';getAvailableTimes();" value="{{ $appointment->date }}" />
                </div>
            </div>
            <div class='col'>
                <div class="form-group">
                    <label for="time">Время:</label>
                    <input type="time" class="form-control" name="appointment_time" value="{{ $appointment->time }}" readonly/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col'>
                <div class="form-group">
                    <label for="description">Описание:</label>
                    <input type="text" class="form-control" name="appointment_description" value="{{ $appointment->description }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col'>
                <div class="form-group">
                    <label for="available_times">Выбор врача и свободного времени приема:</label>
                    <select class="form-control" id='availableTimesSelect' onchange="setDoctor(this);">
                        
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col'>
                <div class="form-group">
                    <label for="doctor">Специалист:</label>
                    <input type="text" class="form-control" name="appointment_doctor" value="{{ $appointment->doctor }}" readonly/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col'>
                <div class="form-group">
                    <label for="service">Услуга:</label>
                    <select class="form-control" name="appointment_service">
                        @foreach ($services as $service)
                            <option>{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col'>
                <div class="form-group">
                    <label class="form-check-label pr-5" for="confirmed">Подтвердить заявку на прием:</label>
                    <input type="checkbox" class="form-check-input" id='confirmed' name="appointment_confirmed" {{ $appointment->confirmed === 1 ? "checked" : "" }}/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col'>
                <button type="submit" class="btn btn-success w-100">Сохранить</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    function getAvailableTimes() {
        $.ajax({
            url: "/appointments/get_available_times",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            data: {
                'day': document.getElementsByName('appointment_date')[0].value
            },
            success: function(msg) {
                var availableTimesSelect = document.getElementById('availableTimesSelect');
                availableTimesSelect.innerHTML = '<option>-</option>';
                msg.forEach(function(element) {
                    var option = document.createElement("option");
                    option.text = element;
                    option.value = element;
                    availableTimesSelect.appendChild(option);
                });
            },
        });
    }

    function setDoctor(element) {
        var text = element.value;
        var doctor = text.split(" в ")[0];
        var time = text.split(" в ")[1];
        document.getElementsByName('appointment_doctor')[0].value = doctor;
        document.getElementsByName('appointment_time')[0].value = time;
    }

    window.onload = getAvailableTimes();
</script>
@endsection