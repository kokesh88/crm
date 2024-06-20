<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Здесь вы можете добавить логику для получения данных для аналитики
        return view('analytics.index');
    }
}
