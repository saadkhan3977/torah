<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function admin_login_page()
    {
        return view('admin.pages.login');
    }

    public function adminUsers_edit(Request $request)
   	{
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

   	    // dd($validator);
        if($validator->passes())
        {
            $id = $request->userId;
            $user = User::where('id',$id)->first();
            $user->type=$request->type;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->update();
            // return redirect()->back()->with('success', "User Registered Successfully");
            return redirect()->route('admin.users.get')->with('message', "User Edited Successfully");
        }

        else
        {
            // dd($validator->errors(),'erro hai bhai');
            // return redirect()->back()->withErrors($validator);
            return redirect()->route('admin.users.get')->with('error', "All Fields Must Be Filled Or Correct");
        }
	}

    public function admin_dashboard()
    {
        return view('admin.pages.index');
    }

    public function adminforgotPage()
    {
        return view('admin.pages.forgot-password');
    }

    public function adminresetPage($token)
    {
        return view('admin.pages.reset-password', compact('token'));
    }

    public function adminforgotPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = mt_rand(100000, 999999);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.admin-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Link');
        });
        // Alert::success('Success', 'Successfully send the reset password link on your email please check to verify !!!');
        return back()->with('message', 'Successfully send the reset password link on your email please check to verify !!!');
    }

    public function adminresetPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required | email | exists:users',
            'password' => 'required | min:8 | same:password',
            'cpassword' => 'required'
        ]);

        if ($validator->fails()) {
            // Validation failed, redirect back with errors and input data
            // Alert::error('Ooops', 'Please fill all required field !');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (!$updatePassword) {
            // Alert::error('Ooops', 'Something went wrong , password not updated !!!');
            return back()->with('message', 'Something went wrong , password not updated !!!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        // Alert::success('Success', 'Successfully update password !!!');
        return redirect()->route('admin_login_page')->with('message', 'Successfully update password !!!');
    }

    public function adminUsers_delete($id)
	{
	    User::where('id',$id)->delete();
	    return redirect()->route('admin.users.get')->with('message', "User Deleted Successfully");
	}


    public function registerPage(){
        return view('users.pages.register');

      }

      public function registerPost(Request $request)
      {
          $validator = Validator::make($request->all(), [
              'name' => 'required',
              'email' => 'required|email',
              'password' => 'required|min:8',
          ]);

          if ($validator->fails()) {
              // Validation failed, redirect back with errors and input data
              return redirect()->back()->with('info', 'Please enter all fields data !');
          }
          // Validation passed, proceed with user registration
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
        //   if ($request->hasFile('profile')) {
        //       $file = $request->file('profile');
        //       $fileName = time() . '.' . $file->getClientOriginalExtension();
        //       $path = $file->move('uploads/users/', $fileName);
        //       $user->profile = $fileName;
        //   }
        //   dd($request->all());
          $user->save();
          return redirect()->route('login.get')->with('success', 'Registered user successfully !');
      }

      public function loginPost(Request $request)
      {
          $credentials = $request->validate([
              'email' => 'required | email | exists:users',
              'password' => 'required'
          ]);
        //   dd($request->all());
          if (Auth::attempt($credentials)) {
              if (Auth::user()->type == 'admin') {
                  return redirect()->route('admin_dashboard')->with('success', 'Admin login successfully !!!');
              } else {
                  return redirect()->route('index.get')->with('success', 'User login successfully !!!');
              }
          }
          return back()->with('error', 'Record not matched with data !!!');
      }


      public function loginpage(){
        return view('users.pages.login');
      }


      public function logout(){
        Auth::logout();
        return redirect()->route('login.get')->with('success',"Logout successfully !!!");
       }

       public function forgotPage(){
        return view('users.pages.forgot');
       }


       public function forgotPost(Request $request)

       {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = mt_rand(100000, 999999);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('emails.user-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Link');
        });
        // Alert::success('Success', 'Successfully send the reset password link on your email please check to verify !!!');
        return back()->with('success', 'Successfully send the reset password link on your email please check to verify !!!');
       }

       public function resetPage($token){
        return view('users.pages.reset',compact('token'));

       }

       public function resetPost(Request $request)
    {
        $request->validate([
            'email' => 'required | email | exists:users',
            'password' => 'required | min:8 | same:password',
            'password' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();
        if (!$updatePassword) {
            return back()->with('info', 'Something went wrong , token not found !!!');
        }
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        // Alert::success('Success', 'Successfully update password !!!');
        return redirect()->route('login.get')->with('success', 'Successfully update password !!!');
    }
}
