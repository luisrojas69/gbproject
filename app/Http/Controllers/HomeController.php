<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

   //Pagina de Administracion de Modulos
    public function admin(){
        $vehicles = DB::table('vehicles')->count();
        $users = DB::table('users')->count();
        $roles = DB::table('roles')->count();
        $permissions = DB::table('permissions')->count();
        return view('pages.admin.index', compact('vehicles', 'users', 'roles', 'permissions'));
    }   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
