<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function saveRegisterForm(Request $request){
        $validator = Validator::make($request->all(), [
                'name' => 'required|min:5',
                'email' => 'required|min:5|unique:users|email',
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('authenticate.register')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('authenticate.login')->with('success', 'You heve been registered successfully.');
    }
    public function showLoginForm(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('authenticate.login')->withInput()->withErrors($validator);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('show.profile');
        }else{
            return redirect()->route('authenticate.login')->with('error', 'Username & Password does not match.');
        }
    }

    public function showProfile(){
        $user = User::find(Auth::user()->id);
        return view('auth.profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request){
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email|min:5|unique:users,email,'.Auth::user()->id.',id',
        ];

        if(!empty($request->image)){
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }
        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('showProfile')->withInput()->withErrors($validator);
        }        

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        if(!empty($request->image)){
            File::delete(public_path('uploads/profile/'.$user->image));
            File::delete(public_path('uploads/profile/thumb/'.$user->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/profile'), $imageName);

            $user->image = $imageName;
            $user->save();

            $manager = new ImageManager(Driver::class);
            $img = $manager->read(public_path('uploads/profile/'.$imageName)); // 800 x 600

            $img->cover(150, 150);
            $img->save(public_path('uploads/profile/thumb/'.$imageName));

        }

        

        return redirect()->route('show.profile')->with('success', 'You Profile has been Updated successfully.');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('show.login');
    }
}
