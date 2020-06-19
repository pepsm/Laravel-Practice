<?php

namespace bbook\Http\Controllers;
use bbook\User;
use bbook\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

    }
    /**
     * Show the application admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function searchUser(Request $request)
    {

        $q = $request->input( 'q' );
        $users = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
        if(count($users) > 0)
            return view('admin.users')->with('users',$users);
        else{
            $users = User::orderBy('created_at', 'desc')->paginate(30);
            return view('admin.users')->with('users', $users);
        }
    }

    /**
     * Show the application admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function searchItem(Request $request)
    {
        $q = $request->input( 'q' );
        $items = Item::where('title','LIKE','%'.$q.'%')->get();
        if(count($items) > 0)
            return view('admin.items')->with('items',$items);
        else{
            $items = Item::orderBy('created_at', 'desc')->paginate(30);
            return view('admin.items')->with('items', $items);
        }
    }
}
