<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;
use App\Profiles;
use App\Address;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $id = Auth::user()->id;
        $user = User::with('profiles')->find($id);
        if(empty($user->profiles->status_id)){
            $profile = new Profiles();
            $profile->id = $id;
            $profile->image = 'nopic.png';
            $profile->status_id = '2';
            $profile->save();

            $image = 'nopic.png';
            session::put('status','2');
        }else{
            $image = $user->profiles->image;
            session::put('status',$user->profiles->status_id);
        } 
        
        session::put('user_img',$image);

        $data = Address::where('status', '1')
                ->orderBy('serial', 'asc')->get();
        $count = $data->count();

        return view('home', [
            'data' => $data,
            'count' => $count,
        ]);
    }

}
