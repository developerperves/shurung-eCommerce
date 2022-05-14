<?php

namespace App\Http\Controllers;

use App\Contactmessage;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

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
        $this->middleware('checkrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard.home', [
            'users' => User::latest()->get(),
        ]);
    }
    public function message(){
        return view('admin.contact.message', [
            'messages' => Message::latest()->get(),
        ]);
    }
    public function messagedelete(Message $message) {
        Message::find($message->id)->delete();
        return back()->withSuccess('Delete successful.');
        
    }
    public function admindelete(Request $request, $id){
        User::find($id)->delete();
        return back()->with('admin_delete', 'Delete Successful.');
    }
    public function updateprofile() {
        return view('admin.update_profile.index');
    }
    public function updateadminname(Request $request) {
        User::find(Auth::id())->update([
            'name' => $request->name,
        ]);
        return back()->withSuccess('Name Updated Successfully :)');
    }
    public function updateadminphoto(Request $request) {
        
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
            return back()->withError('Please select a photo first!!');
        }
    }
    public function updateadminpassword(Request $request) {
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
