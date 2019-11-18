<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends BaseController
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->view('dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Success'], 200);
    }

    public function contact(Request $request)
    {
        Mail::to(env('MAIL_TO', 'stpronk@gmail.com'))->send(new ContactForm($request->all()));

        return back();
    }
}
