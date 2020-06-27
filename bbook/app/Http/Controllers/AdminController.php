<?php

namespace bbook\Http\Controllers;

use bbook\User;
use bbook\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
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
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the application admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.users')->with('users', $users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = User::find($id);


        if($user->profile_image != 'noimage.jpg'){
            // Default Image
            Storage::delete('public/cover_images/'.$user->profile_image);
        }

        // Deleting related post to a user
        $deletedRows = Item::where('user_id', $id)->delete();

        $user->delete();

        $users = User::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.users')->with('users', $users);
    }
    /**
     * Show the application admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function items()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.items')->with('items', $items);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyItem($id)
    {
        $item = Item::find($id);

        if($item->cover_image != 'noimage.jpg'){
            // Default Image
            Storage::delete('public/cover_images/'.$item->cover_image);
        }

        $item->delete();

        $items = Item::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.items')->with('items', $items);
    }
}
