<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::where('status', 'pending')->latest()->get();
        return view('admin.admins.requests', compact('admins'));
    }

    public function approveAdminRequest($id)
    {
        $admin = Admin::where([
            'id' => $id,
            'status' => 'pending'
        ])->first();

        if (!$admin) {
            return redirect()->route('dashboard.admins.requests')->with('error', 'Request does not exixt.');
        }

        try {
            $admin->status = 'approved';
            $admin->save();

            DB::commit();

            return redirect()->route('dashboard.admins.requests')->with('success', 'Request Approved Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }

    public function deleteAdminRequest($id)
    {
        $admin = Admin::where([
            'id' => $id,
            'status' => 'pending'
        ])->first();

        if (!$admin) {
            return redirect()->route('dashboard.admins.requests')->with('error', 'Request does not exixt.');
        }

        try {
            $admin->delete();
            DB::commit();

            return redirect()->route('dashboard.admins.requests')->with('success', 'Request Deleted Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }
}
