<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Gender;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['admins'] = Admin::orderBy('id','asc')->paginate(5);

        return $data;
    }

    public function edit(Admin $admin)
    {
        
        $genders = Gender::all();
        // return $admin;
        return view('admins.profile', compact('genders', 'admin'));
    }
}
