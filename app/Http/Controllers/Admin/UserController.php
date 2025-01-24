<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.manage', compact('users'));
    }


    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('dashboard.users.manage')->with('error', 'User does not exixt.');
        }

        try {
            $user->delete();
            DB::commit();

            return redirect()->route('dashboard.users.manage')->with('success', 'User Deleted Successfully');
        } catch (\Exception $err) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Internal server error');
        }
    }
}
