<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ClientApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();

        return view('client.applications.index', compact('applications'));
    }
}
