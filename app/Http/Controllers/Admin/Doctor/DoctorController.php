<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index()
    {
        $services = Services::latest()->get();
        return view('admin.doctor.add_doctor', compact('services'));
    }

    public function manage_doctor()
    {
        $doctors = Doctor::with('service')->get();
        return view('admin.doctor.manage_doctor', compact('doctors'));
    }

    public function update_doctor(Request $request)
    {
        $services = Services::all();
        $doctor = Doctor::find($request->id);

        if (!$doctor) {
            return redirect()->route('dashboard.doctor.manage')->with('error', 'Doctor not found');
        }

        return view('admin.doctor.update_doctor', compact('doctor', 'services'));
    }

    public function doctor_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_name' => 'required|string|max:255',
            'doctor_phonenumber' => 'required|regex:/(01)[0-9]{9}/',
            'doctor_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'services_id' => 'required|exists:services,id',
            'doctor_details' => 'required|string',
        ], [
            'doctor_name.required' => 'The doctor name is required.',
            'doctor_phonenumber.required' => 'The phone number is required.',
            'doctor_phonenumber.regex' => 'The phone number must start with 01 and contain 11 digits.',
            'doctor_image.required' => 'The doctor image is required.',
            'doctor_image.image' => 'The file must be an image.',
            'doctor_image.mimes' => 'The image must be a jpeg, png, jpg, or gif.',
            'doctor_image.max' => 'The image size must be less than 2MB.',
            'services_id.required' => 'Please select a speciality.',
            'doctor_details.required' => 'The doctor details are required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $slug = Str::slug($request->doctor_name, '-');
            $file = $request->file('doctor_image');
            $filename = $slug . '-' . hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file);
            $img->save(public_path('uploads/' . $filename));
            $host = $_SERVER['HTTP_HOST'];
            $doctor_image = "http://" . $host . "/uploads/" . $filename;

            $doctor = Doctor::create([
                'doctor_name' => $request->doctor_name,
                'doctor_phonenumber' => $request->doctor_phonenumber,
                'services_id' => $request->services_id,
                'doctor_image' => $doctor_image,
                'doctor_details' => $request->doctor_details,
            ]);

            DB::commit();

            return redirect()->route('dashboard.doctor.manage')->with('success', 'Doctor Added Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }

    public function doctor_update(Request $request)
    {
        $doctor = Doctor::find($request->id);

        if (!$doctor) {
            return redirect()->route('dashboard.doctor.manage')->with('error', 'Doctor not found');
        }

        $validator = Validator::make($request->all(), [
            'doctor_name' => 'required|string|max:255',
            'doctor_phonenumber' => 'required|regex:/(01)[0-9]{9}/',
            'doctor_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'services_id' => 'required|exists:services,id',
            'doctor_details' => 'required|string',
        ], [
            'doctor_name.required' => 'The doctor name is required.',
            'doctor_phonenumber.required' => 'The phone number is required.',
            'doctor_phonenumber.regex' => 'The phone number must start with 01 and contain 11 digits.',
            'doctor_image.required' => 'The doctor image is required.',
            'doctor_image.image' => 'The file must be an image.',
            'doctor_image.mimes' => 'The image must be a jpeg, png, jpg, or gif.',
            'doctor_image.max' => 'The image size must be less than 2MB.',
            'services_id.required' => 'Please select a speciality.',
            'doctor_details.required' => 'The doctor details are required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $doctor->doctor_name = $request->doctor_name;
            $doctor->doctor_phonenumber = $request->doctor_phonenumber;
            $doctor->services_id = $request->services_id;
            $doctor->doctor_details = $request->doctor_details;

            if ($request->hasFile('doctor_image')) {
                if (!empty($doctor->doctor_image)) {
                    $image_path = public_path("/uploads/") . basename($doctor->doctor_image);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $file = $request->file('doctor_image');
                $slug = Str::slug($request->doctor_name, '-');
                $filename = $slug . '-' . hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $img = Image::make($file);
                $img->save(public_path('uploads/' . $filename));
                $host = $_SERVER['HTTP_HOST'];
                $doctor->doctor_image = "http://" . $host . "/uploads/" . $filename;
            }

            $doctor->save();

            DB::commit();

            return redirect()->back()->with('success', 'Doctor Updated Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }

    public function delete_doctor($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect()->route('dashboard.doctor.manage')->with('error', 'Doctor does not exixt.');
        }

        try {
            $doctor->delete();
            DB::commit();

            return redirect()->route('dashboard.doctor.manage')->with('success', 'Doctor Deleted Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }
}
