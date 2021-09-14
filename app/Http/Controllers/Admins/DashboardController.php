<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\{Education, Experience};
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $educations = Education::orderByDesc('year')->get();
        $experiences = Experience::orderByDesc('since')->get();
        return view('admins.dashboards.index', compact('educations', 'experiences'));
    }
}
