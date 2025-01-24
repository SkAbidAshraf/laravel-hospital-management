<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\AppointmentAcceptedNotification;
use Illuminate\Support\Facades\Notification;


class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function appointment()
    {
        $appointments = Appointment::where('status', 'pending')->latest()->get();
        return view('admin.appointment.index', compact('appointments'));
    }

    public function approvedAppointment()
    {
        $appointments = Appointment::where('status', 'approved')->latest()->get();
        return view('admin.appointment.approved_appointments', compact('appointments'));
    }
    public function contact_manage()
    {
        $allContact = Contact::latest()->get();
        return view('admin.contact.index', compact('allContact'));
    }

    public function reject_appointment($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return redirect()->route('dashboard.appointment.manage')->with('error', 'Request does not exixt.');
        }

        $userId = $appointment->user_id;

        $user = User::find($userId);

        try {
            $appointment->delete();
            DB::commit();

            $doctor_name = $appointment->doctor_name;

            $message = "Your appointment with <b>{$doctor_name}</b> has been declined.<br>Doctor is not available at this moment.";

            Notification::send($user, new AppointmentAcceptedNotification($message));

            return redirect()->route('dashboard.appointment.manage')->with('success', 'Request Deleted Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }

    public function delete_appointment($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return redirect()->route('dashboard.appointment.approved')->with('error', 'Request does not exixt.');
        }

        try {
            $appointment->delete();
            DB::commit();

            return redirect()->route('dashboard.appointment.approved')->with('success', 'Request Deleted Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }

    public function approve_appointment($id)
    {
        $appointment = Appointment::find($id);

        $userId = $appointment->user_id;

        $user = User::find($userId);

        if (!$appointment) {
            return redirect()->route('dashboard.appointment.manage')->with('error', 'Request does not exixt.');
        }

        try {
            $appointment->status = 'approved';
            $appointment->save();

            $doctor_name = $appointment->doctor_name;

            $message = "Your appointment with <b>{$doctor_name}</b> has been accepted.<br>";

            Notification::send($user, new AppointmentAcceptedNotification($message));

            return redirect()->route('dashboard.appointment.manage')->with('success', 'Request Approved Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }


    public function delete_contact_manage($id)
    {
        $contact = Contact::find($id);

        if ((!$contact)) {
            return redirect()->back()->with('error', 'Message not found');
        } else {
            DB::beginTransaction();

            try {
                $contact->delete();
                DB::commit();

                return redirect()->route('dashboard.contact.manage')->with('success', 'Message deleted successfully');
            } catch (\Exception $err) {
                DB::rollBack();

                return redirect()->back()->with('error', 'Internal Server Error');
            }
        }
    }

    public function details_contact_manage($id)
    {
        $contact = Contact::find($id);

        if ((!$contact)) {
            return redirect()->back()->with('error', 'Message not found');
        } else {
            return view('admin.contact.details', [
                'contact' => $contact
            ]);
        }
    }
}
