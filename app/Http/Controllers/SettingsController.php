<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function general()
    {
        return view('settings.general');
    }

    public function customizations()
    {
        return view('settings.customizations');
    }

    public function integrations()
    {
        return view('settings.integrations');
    }

    public function workflows()
    {
        return view('settings.workflows');
    }

    public function notifications()
    {
        return view('settings.notifications');
    }

    public function maintenance()
    {
        return view('settings.maintenance');
    }

    public function systemLogs()
    {
        return view('settings.system-logs');
    }
}
