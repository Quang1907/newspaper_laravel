<?php

namespace App\Http\Controllers;

class AdminDashboardController extends Controller
{
    public function home() {
        return view( 'admin.dashboard' );
    }
}
