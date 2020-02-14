<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\EntryRequest;
use App\User;
use App\Entry;

class BlogController extends Controller
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
    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('entries.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EntryRequest $request, Entry $entry)
    {
        $entry->user_id=auth()->id();
        $entry->title=$request->title;
        $entry->content=$request->content;
        $entry->creation=now();
        $entry->save();
        return response()->json([
            'status'=> 'success',
            'msg'=>'Entry successfully created.'
        ]);   
    }

    /**
     * Show the form for editing the specified entry
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\View\View
     */
    public function edit(Entry $entry)
    {
        return view('entries.edit', compact('entry'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EntryRequest $request)
    {
        $entry=Entry::find($request->id);
        $entry->title=$request->title;
        $entry->content=$request->content;
        $entry->update();
        return response()->json([
            'status'=> 'success',
            'msg'=>'Entry successfully updated.'
        ]);        
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('entry.index')->withStatus(__('Entry successfully deleted.'));
    }
}
