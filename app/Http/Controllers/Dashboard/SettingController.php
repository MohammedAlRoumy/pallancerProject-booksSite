<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function social_links()
    {

        return view('dashboard.settings.social_links');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        setting($request->all())->save();
        session()->flash('success', 'Data Added successfully');
        return redirect()->back();
    }
}
