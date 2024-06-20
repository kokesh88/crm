<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class MasterApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return view('master.applications.index', compact('applications'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $application->status = $request->status;
        $application->save();

        return redirect()->route('master.applications.index')->with('success', 'Статус заявки обновлен.');
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('master.applications.index')->with('success', 'Заявка удалена.');
    }
}
