<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function index()
    {
        $allServices = Services::latest()->get();
        return view('admin.services.manage_services', compact('allServices'));
    }

    public function add()
    {
        return view('admin.services.add_services');
    }

    public function update_services(Request $request)
    {
        $servicesDetails = Services::find($request->id);

        if (!$servicesDetails) {
            return redirect()->route('dashboard.services.manage')->with('error', 'Service does not exist.');
        }        

        return view('admin.services.update_services', compact('servicesDetails'));
    }

    public function add_submit_services(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:services,title',
            'details' => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $services = Services::create([
                'title' => $request->title,
                'details' => $request->details,
            ]);

            DB::commit();

            return redirect()->route('dashboard.services.manage')->with('success', 'Service Added Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Error in Adding Service');
        }
    }

    public function services_update_submit(Request $request)
    {
        $services = Services::find($request->id);

        if (!$services) {
            return redirect()->route('dashboard.services.manage')->with('error', 'Service does not exist.');
        }        


        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:services,title,' . $services->id,
            'details' => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $services->title = $request->title;
            $services->details = $request->details;
            $services->save();

            DB::commit();

            return redirect()->back()->with('success', 'Service Updated Successfully');
        } catch (\Exception $err) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error in Updating Service');
        }
    }

    public function delete_services($id)
    {
        $services = Services::find($id);

        if (!$services) {
            return redirect()->route('dashboard.services.manage')->with('error', 'Service does not exixt.');
        }

        try {
            $services->delete();
            DB::commit();

            return redirect()->route('dashboard.services.manage')->with('success', 'Service Deleted Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Error in Deleting Service');
        }
    }
}
