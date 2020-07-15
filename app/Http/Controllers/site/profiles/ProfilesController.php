<?php

namespace App\Http\Controllers\site\profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; 
use App\User;
use App\Profiles;
use Illuminate\Support\Str;
use Image;
use File;
use Session;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Requests\site\profiles\UpdateRequest;

class ProfilesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decrypted = decrypt($id);
        $users = User::with('profiles')->find($decrypted);
        return view('site/profiles/edit',
            [
                'users' => $users,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $id = decrypt($id);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $profile = Profiles::find($id);
        $profile->tel = $request->tel;
        $profile->status_id = $request->status;
        if ($request->hasFile('picture')) {
            if ($profile->image != 'nopic.png') {
                File::delete(public_path() . '\\images\\' . $profile->image);
                File::delete(public_path() . '\\images\\resize\\' . $profile->image);
            }
            $filename = Str::random(10) . '.' . $request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move(public_path() . '/images/', $filename);
            Image::make(public_path() . '/images/' . $filename)->resize(50, 50)->save(public_path() . '/images/resize/' . $filename);
            $profile->image = $filename;
            session::put('user_img',$filename);
        }
        $profile->save();

        return back()->with('Success', 'แก้ไขข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeIndex(Request $request){
        return view('site/profiles/changePassword');
    }

    public function changePass(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword], 
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ],
        [
            'current_password.required' => 'กรุณากรอกรหัสผ่านเดิม',
            'new_password.required' => 'กรุณากรอกรหัสผ่านใหม่',
            'new_confirm_password.same' => 'กรอกยืนยันรหัสผ่านใหม่อีกครั้ง',
        ]);
        $userlogin = Auth::user()->id;
        User::find($userlogin)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('Success', 'แก้ไขรหัสผ่านเรียบร้อย');
    }


}
