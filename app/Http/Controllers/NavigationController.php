<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NavigationController extends Controller
{
    public function welcome()
    {
        return Inertia::render('Dashboard');
    }
}
