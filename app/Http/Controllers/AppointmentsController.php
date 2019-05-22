<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Service;
use App\User;
use Illuminate\Support\Facades\Auth;


class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->name !== 'admin') {
            return redirect('/appointments_doctor');
        }

        $results = Appointment::all();
        $appointments = array();
        $today = date("Y-m-d");

        foreach ($results as $r) {
            if ($r->date >= $today) array_push($appointments, $r);
        }

        return view('appointments.index', compact('appointments'));
    }

    public function index_doctor()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $results = Appointment::all();
        $appointments = array();
        $today = date("Y-m-d");
        $doctor = Auth::user()->name;

        foreach ($results as $r) {
            if (($r->date >= $today) && ($r->doctor == $doctor)) array_push($appointments, $r);
        }

        return view('appointments.index_doctor', compact('appointments', 'doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'appointment_name'=>'required',
        'appointment_phone'=> 'required',
        'appointment_email'=> 'required|email',
        'appointment_date'=> 'required|date',
        'appointment_time'=> 'required',
        'appointment_description'=> 'required'
        ]);
        $appointment = new Appointment([
            'name' => $request->get('appointment_name'),
            'phone' => $request->get('appointment_phone'),
            'email' => $request->get('appointment_email'),
            'date' => $request->get('appointment_date'),
            'time' => $request->get('appointment_time'),
            'description' => $request->get('appointment_description'),
        ]);
        $appointment->save();
        return redirect('/appointments/create')->with('success', 'Заявка успешно зарегистрирована! Наш администратор свяжется с Вами в ближайшее время.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->name !== 'admin') {
            return abort(404);
        }

        $appointment = Appointment::find($id);
        $services = Service::all();

        return view('appointments.edit', compact('appointment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'appointment_name'=>'required',
            'appointment_phone'=> 'required',
            'appointment_email'=> 'required|email',
            'appointment_date'=> 'required|date',
            'appointment_time'=> 'required'
        ]);

        if ($request->get('appointment_confirmed')) $confirmed = 1;
        else $confirmed = 0;
    
        $appointment = Appointment::find($id);
        $appointment->name = $request->get('appointment_name');
        $appointment->phone = $request->get('appointment_phone');
        $appointment->email = $request->get('appointment_email');
        $appointment->date = $request->get('appointment_date');
        $appointment->time = $request->get('appointment_time');
        $appointment->description = $request->get('appointment_description');
        $appointment->doctor = $request->get('appointment_doctor');
        $appointment->service = $request->get('appointment_service');
        $appointment->confirmed = $confirmed;
        $appointment->save();
    
        return redirect('/appointments')->with('success', 'Заявка успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
   
        return redirect('/appointments')->with('success', 'Заявка успешно удалена');
    }

    public function get_available_times(Request $request) {
        $users = User::all();
        $options = array();

        for ($i = 12; $i < 20; $i++) {
            foreach ($users as $user) {
                $counter = Appointment::where('doctor', '=', $user->name)->where('time', '=', $i . ":" . "00")->where('confirmed', '=', '1')->count();
                if ($counter < 1) array_push($options, $user->name . " в " . $i . ":" . "00");
            }
        }

        return $options;
    }
}
