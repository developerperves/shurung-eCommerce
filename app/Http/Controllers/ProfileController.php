<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use SebastianBergmann\Environment\Console;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function updateprofile()
    {
        return view('frontend.update_profile');
    }

    public function updateprofilephoto(Request $request)
    {
        if ($request->hasFile('photo')) {
            if (Auth::user()->photo != 'default.png') {
                $old_photo_location = 'public/uploads/profile/' . Auth::user()->photo;
                unlink(base_path($old_photo_location));
            }
            $uploaded_photo = $request->file('photo');
            $new_file_name = Auth::id() . "." . $uploaded_photo->getClientOriginalExtension();
            $new_file_location = 'public/uploads/profile/' . $new_file_name;
            Image::make($uploaded_photo)->resize(300, 300)->save(base_path($new_file_location));
            User::find(Auth::id())->update([
                'photo' => $new_file_name,
            ]);
            return back()->withSuccess('Your Profile Photo Updated Successfully:)');
        } else {
            return back()->withError('Please select a photo first.');
        }
    }

    public function updateprofilename(Request $request)
    {
        User::find(Auth::id())->update([
            'name' => $request->name,
        ]);
        return back()->withSuccess('Name Updated Successfully :)');
    }



    public function updateprofilepassword(Request $request)
    {
        if (Hash::check($request->old_password, Auth::user()->password)) {
            if ($request->old_password == $request->password) {
                return back()->withError('your new password is same like your current password!');
            } else {
                User::find(Auth::id())->update([
                    'password' => Hash::make($request->password)
                ]);
                return back()->withSuccess('your Password Updated Successfully!');
            }
        } else {
            return back()->withError('Your Password is not match!');
        }
    }
}
