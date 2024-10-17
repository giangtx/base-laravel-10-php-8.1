<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SinglePageAppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function admin(Request $request)
    {
        Log::info("message");
        if($request->path() == 'admin/login'){
            Log::info('Admin login page');
            return view('admin');
        }
        if (!Auth::guard('admin')->check()) {
            // return redirect()->to('/admin/login');
            Log::info('Admin not logged in');
            return view('admin');
        }
        return view('admin');
    }
}
