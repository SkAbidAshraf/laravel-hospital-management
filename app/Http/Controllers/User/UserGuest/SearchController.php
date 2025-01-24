<?php

namespace App\Http\Controllers\User\UserGuest;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $search_item = Doctor::orderBy('id', 'desc')->where('doctor_name', 'LIKE', '%' . $request->item . '%');
        $search_item_desc = Doctor::orderBy('id', 'desc')->where('doctor_specialist', 'LIKE', '%' . $request->item . '%');
        $search_item = $search_item->get();
        $search_item_desc =  $search_item_desc->get();
            if (isset($search_item[0])) {
                return view('user.guest.our_doctor', ['allDoctor' => $search_item]);
            } else if (isset($search_item_desc[0])) {
                return view('user.guest.our_doctor', ['allDoctor' => $search_item_desc]);
            } else{
                return view('user.guest.our_doctor', ['allDoctor' => false]);
            }

            
       
    }
}
