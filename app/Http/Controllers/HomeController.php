<?php

namespace App\Http\Controllers;

use App\Models\Admins\{Experience, Education};
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::all()->first();
        $educations = Education::latest()->get();
        $experiences = Experience::latest()->get();
        return view('fronts.index', compact('users', 'educations', 'experiences'));
    }
}
