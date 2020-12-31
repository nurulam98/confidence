<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->isAdmin == true)
        {
            return redirect(route('adminDashboard'));
        } elseif (Auth::user()->isIT == true){
            return redirect(route('itDashboard'));
        } else {
            return redirect(route('userDashboard'));
        }
    }
}
?>
