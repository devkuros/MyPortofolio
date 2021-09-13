<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        $users = Auth::user();
        return view('admins.profiles.index', compact('users'));
    }

    public function update(UserRequest $request, $id){

        $user = Auth::user($id);

        if($request->hasFile('avatar')){

            $image = $request->file('avatar');
            $user['avatar'] = time().'-'. $image->getClientOriginalName();

            $filepath = public_path('/storage/user');
            $image->move($filepath, $user['avatar']);
        } else {
            $image = $user->avatar;
        }

        $user = User::find(Auth::user()->id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $user['avatar']
        ]);

        Alert::toast('Update Profile Success', 'success')->position('top');
        return back();
    }

    public function updatepassword(ChangePasswordRequest $request){
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        Alert::toast('Update Password Success', 'success')->position('top');
        return back();
    }
}
