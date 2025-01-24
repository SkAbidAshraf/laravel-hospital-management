<?php

namespace App\Http\Controllers\User\UserGuest;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\LetestNews;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserGuestController extends Controller
{
    public function adminLogin()
    {
        return view('admin.auth.login');
    }

    function home()
    {
        $allServices = Services::all()->slice(0, 6);
        $doctors = Doctor::take(12)->get();
        $allLetestNews = LetestNews::all()->slice(0, 6);
        return view('user.guest.home', compact('allServices', 'doctors', 'allLetestNews'));
    }

    function aboutUs()
    {
        return view('user.guest.clinic');
    }

    function appointment()
    {
        return view('user.guest.appointment');
    }

    function contact()
    {
        return view('user.guest.contact');
    }

    function admin()
    {
        $all_appointment = Appointment::get();
        return view('admin.admin', ['all_appointment' => $all_appointment]);
    }
    function doctors()
    {
        $doctors = Doctor::paginate(6);
        return view('user.guest.all_doctor', [
            'doctors' => $doctors
        ]);
    }


    function services()
    {
        $allServices = Services::
            // whereHas('doctors')->
            paginate(12);
        return view('user.guest.services', compact('allServices'));
    }


    function contact_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phonenumber' => 'required|regex:/(01)[0-9]{9}/',
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'There was an error while sending your message. Please try again letter.');
        }

        Contact::create([
            'name' => $request->name,
            'phonenumber' => $request->phonenumber,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


    function showServiceDoctors($id)
    {
        $doctors = Doctor::where('services_id', $id)->paginate(12);
        $serviceName = Services::where('id', $id)->value('title');
        return view('user.guest.services-doctors', compact('doctors', 'serviceName'));
    }

    function showDoctorDetails($id)
    {
        $doctor = Doctor::where('id', $id)->with('service')->first();
        return view('user.guest.doctor-details', compact('doctor'));
    }
}
