<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Notifications\AppointmentAcceptedNotification;
use Illuminate\Support\Facades\Notification;

class AppointmentController extends Controller
{

    function myAppointments()
    {
        $upcomingAppointments = Appointment::where('user_id', Auth::user()->id)->where('status', 'approved')->get();
        $pendingAppointments = Appointment::where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        return view('user.profile.appointments', compact('pendingAppointments', 'upcomingAppointments'));
    }

    public function bookAppointment($id)
    {
        // $id->validate([
        //     'id' => 'required|exists:doctors,id',
        // ]);

        $hasDoctorId = true;
        $doctor = Doctor::where('id', $id)->first();
        if ($doctor == Null) {
            return redirect('/');
        }

        $user = Auth::user();

        return view('user.profile.book-appointment', compact('doctor', 'user', 'hasDoctorId'));
    }

    public function bookAppointmentPage()
    {
        $hasDoctorId = false;
        $doctors = Doctor::with('service')->get();
        $user = Auth::user();
        return view('user.profile.book-appointment', compact('doctors', 'user', 'hasDoctorId'));
    }

    public function markAsRead($id)
    {
        auth()->user()->notifications->where('id', $id)->markAsRead();
        return redirect()->back();
    }

    public function submitAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_phonenumber' => 'required|regex:/^01[0-9]{9}$/',
            'doctor_name' => 'required|exists:doctors,doctor_name',
            'appointment_date' => 'required|date|after:today',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            Appointment::create([
                'user_id' => Auth::id(),
                'patient_name' => Auth::user()->name,
                'patient_phonenumber' => $request->patient_phonenumber,
                'doctor_name' => $request->doctor_name,
                'appointment_date' => $request->appointment_date,
            ]);

            return back()->with('success', 'Appointment request submitted successfully! Please wait for confirmation.');
        } catch (\Exception $err) {
            DB::rollBack();

            return back()->with('error', 'Failed to submit appointment. Please try again later.');
        }
    }

    public function cancel(Request $request)
    {
        $appointment = Appointment::find($request->id);

        if (!$appointment) {
            return redirect()->route('user.appointments')->with('error', 'Request does not exixt.');
        } else {

            DB::beginTransaction();

            try {
                $appointment->delete();
                DB::commit();

                return redirect()->route('user.appointments')->with('success', 'Request Canceled Successfully');
            } catch (\Exception $err) {

                DB::rollBack();

                return redirect()->back()->with('error', 'Internal server error');
            }
        }
    }
}
