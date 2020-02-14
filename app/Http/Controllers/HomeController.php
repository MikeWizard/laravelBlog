<?php

namespace App\Http\Controllers;

use App\User;
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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $users=User::with(['entries' => function ($query) {
        //     $query->orderBy('creation');
        // }])->get();
        $users=User::with(['entries' => function ($query) {
                 $query->orderBy('creation');
             }])
        ->get()
        ->map(function( $user ){
            $user->entries = $user->entries->take(3);
            return $user;
        });
        // dd($users);
        return view('dashboard',['users'=>$users]);
    }
}
