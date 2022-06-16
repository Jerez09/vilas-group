<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store()
    {
        // Loging out user
        auth()->logout();

        // Redirecting back to home page
        return redirect()->route('properties', ['locale' => App::currentLocale()]);
    }
}
