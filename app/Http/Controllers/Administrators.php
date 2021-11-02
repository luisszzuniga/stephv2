<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class Administrators extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        $users = User::all();

        return view('admin.admin.index', compact('admins', 'users'));
    }

}
