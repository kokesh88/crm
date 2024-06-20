<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'description' => 'required|string|max:1000',
        ]);

        Application::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
        ]);

        return redirect()->route('applications.create')->with('success', 'Заявка успешно отправлена.');
    }

    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,completed',
        ]);

        $application->update(['status' => $request->status]);

        return redirect()->route('master.applications.index')->with('success', 'Статус заявки обновлен.');
    }
}

