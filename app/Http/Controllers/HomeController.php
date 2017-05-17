<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function authorizeApp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_key' => 'required|exists:applications,key,is_active,1',
            'redirect_uri' => 'required:active_url',
        ]);

        if (! $validator->passes()) {
            return view('authorize-app')->withInvalid('true');
        }

        $app = Application::whereKey($request->app_key)->first();

        return view('authorize-app', compact('app'));
    }
}
