<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Room;
use Auth;
use Hash;
use Mail;
use File;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function register(Request $request)
    {
        // dd(1);
        $checkEmail = User::where('email', $request->email)->first();
        
        if($checkEmail)
            return response()->json([
                'success' => false,
                'message' => 'Email Already Exist'
            ]);
            
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        if($request->password && $request->confirm_password)
        {
            if($request->password === $request->confirm_password)
            {
                $user->save();
                // User created, return success response
                return response()->json([
                    'success' => true,
                    'message' => 'User created successfully'
                ]);    
            }
            
            else
            {
                return response()->json([
                    'success' => false,
                    'message' => "Password And Confirm Password Aren't Match."
                ]);
            }
        }
        else
        {
            return response()->json([
                    'success' => false,
                    'message' => "Password And Confirm Password fields Not Empty."
                ]);
        }
    }
    
    
    public function SocialMediaRegister(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();
        
        if($checkEmail)
        {
           //generate the token for the user
           Auth::login($checkEmail, true);
            $user_login_token=auth()->user()->createToken('torah-memory-palace')->accessToken;
            $user = User::where('id',Auth()->user()->id)->first();
            return response()->json([
                'success'      => true,
                'data'         => $user,
                'token'        => $user_login_token,
            ]); 
        }
        
        else
        {
            $user = new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            if($request->password && $request->confirm_password)
            {
                if($request->password === $request->confirm_password)
                {
                    $user->save();
                    // User created, return success response
                    return response()->json([
                        'success' => true,
                        'message' => 'User created successfully'
                    ]);    
                }
                
                else
                {
                    return response()->json([
                        'success' => false,
                        'message' => "Password And Confirm Password Aren't Match."
                    ]);
                }
            }
            else
            {
                return response()->json([
                        'success' => false,
                        'message' => "Password And Confirm Password fields Not Empty."
                    ]);
            }
        }
    }
    
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (auth()->attempt($credentials))
        {
            //generate the token for the user
            $user_login_token=auth()->user()->createToken('torah-memory-palace')->accessToken;
            $path=asset('assets/uploads/user');
            $user = User::where('id',Auth()->user()->id)->first();
            
            return response()->json([
                'success'      => true,
                // 'path'         => $path,
                'data'         => $user,
                'token'        => $user_login_token,
            ]);
            
        }
        
        else
        {
            //wrong login credentials, return, user not authorised to our system, return error code 401
            return response()->json([
                'success' => false,
                'message' => 'Un-authorized Access'
            ]);
        }
    }
    
    
    public function ForgetPasswordEmail(Request $request)
    {
        $emailAddress   = $request->email;
        $checkEmailExist = User::where('email', $emailAddress)->first();
        
        if($checkEmailExist)
        {
            //generate four digits code
            $four_digit_random_number = mt_rand(1000, 9999);
            $setCode = User::where('email', $emailAddress)->update([
                'forget_password_code'  => $four_digit_random_number
            ]);
            
            if($setCode)
            {
                $data = array('code'=> $four_digit_random_number,'name' => $checkEmailExist->name,'email' => $checkEmailExist->email,);
                // Mail::send('email_verification', $data, function($message) use ($emailAddress)
                // {
                    //$message->from($data['email']);
                //     $message->to($emailAddress);
                //     $message->subject('Forget Password Email Verification Code');
                // });
                return response([
                    'success'   => true,
                    'message'   => 'Successfully code generated',
                    'data'      => 
                    [
                        'id'    => $checkEmailExist->id,
                        'name' => $checkEmailExist->name,
                        'email' => $checkEmailExist->email,
                        'code'  => $four_digit_random_number
                    ]
                ]);
            }
            else
            {
                return response([
                    'success' => false,
                    'message' => 'Failed to generate code'
                ]);
            }
        }
        else
        {
            return response([
                'success' => false,
                'message' => 'Email not exists'
            ]);
        }
    }
    
    
    public function ValidEmail(Request $request)
    {
        $emailAddress   = $request->email;
        $checkEmailExist = User::where('email', $emailAddress)->first();
        
        if($checkEmailExist)
        {
            //generate four digits code
            $four_digit_random_number = mt_rand(1000, 9999);
            $setCode = User::where('email', $emailAddress)->update([
                'email_verified_code'  => $four_digit_random_number
            ]);
            
            if($setCode)
            {
                $data = array('code'=> $four_digit_random_number,'name' => $checkEmailExist->name,'email' => $checkEmailExist->email,);
                // Mail::send('email_verification', $data, function($message) use ($emailAddress)
                // {
                    //$message->from($data['email']);
                //     $message->to($emailAddress);
                //     $message->subject('Email Verification Code');
                // });
                return response([
                    'success'   => true,
                    'message'   => 'Successfully code generated',
                    'data'      => 
                    [
                        'id'    => $checkEmailExist->id,
                        'name' => $checkEmailExist->name,
                        'email' => $checkEmailExist->email,
                        'code'  => $four_digit_random_number
                    ]
                ]);
            }
            
            else
            {
                return response([
                    'success' => false,
                    'message' => 'Failed to generate code'
                ]);
            }
        }
        else
        {
            return response([
                'success' => false,
                'message' => 'Email not exists'
            ]);
        }
    }
    
     public function CheckValidEmailCodeVerification(Request $request)
    {
        $code = $request->code;
        $id   = $request->id;
        $checkEmailCode = User::where('id', $id)->where('email_verified_code', $code)->first();
        
        if($checkEmailCode == null)
        {
            return response([
                'success' => false,
                'message' => 'Invalid Code'
            ]);
        }
        
        else
        {
            $setCode = User::where('id', $id)->update([
                'email_verified'  => 1
            ]);
            return response([
                'success'   => true,
                'message'   => 'Code matched successfully'
            ]);
        }    
        
    }
    
    public function checkForgetPasswordCodeVerification(Request $request)
    {
        $code = $request->code;
        $id   = $request->id;
        $checkEmailCode = User::where('id', $id)->where('forget_password_code', $code)->first();
        if($checkEmailCode == null)
        {
            return response([
                'success' => false,
                'message' => 'Invalid Code'
            ]);
        }
        else
        {
            return response([
                'success'   => true,
                'message'   => 'Code matched successfully'
            ]);
        }
    }
    
    public function updateForgetPassword(Request $request)
    {
        $id             = $request->id;
        $password       = $request->password;
        $passwordHash = Hash::make($password);
        
        if($request->password && $request->confirm_password)
        {
            if($request->password === $request->confirm_password)
            {
                $updatePassword = User::find($id)->update(['password' => $passwordHash]);
                if($updatePassword)
                {
                    return response([
                        'success'   => true,
                        'message'   => 'Password updated successfully'
                    ]);
                }
            }
            
            else
            {
                return response([
                    'success' => false,
                    'message' => "Password And Confirm Password Aren't Match."
                ]);
            }
        }
        
        else
        {
            return response([
                    'success' => false,
                    'message' => "Password And Confirm Password Fields Aren't Empty."
                ]);
        }
    }
    
    
    public function changePassword(Request $request)
    {
        #Match The Old Password
        if(!Hash::check($request->current_password, auth()->user()->password))
        {
            return response([
                'success' => false,
                'message' => "Old Password Doesn't match!"
            ]);
        }
        
        #Match New Password 
        else if($request->new_password!=$request->confirm_new_password)
        {
            return response([
                'success' => false,
                'message' => "New Password Doesn't match!"
            ]);    
        }
        
        else
        {
            #Update the new Password
            User::find(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return response([
                'success'   => true,
                'message'   => 'Password updated successfully'
            ]);
        }
    }
    
    
    public function updateInfo(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->type=isset($request->type) ? $request->type : $user->type;
        $user->name=isset($request->name) ? $request->name : $user->name;
        $user->email=isset($request->email) ? $request->email : $user->email;
        $user->phone=isset($request->phone) ? $request->phone : $user->phone;
        $user->password=isset($request->password) ? $request->password : $user->password;
        $user->update();
        
        // User created, return success response
        return response()->json([
            'success'   => true,
            'message'   => 'User Updated successfully',
            'data'      => $user
        ]);
    }
    
    
        public function GetUser($user_id)
    {
    	    $user = User::find($user_id);
    		$user_list['user_id']=$user->id;
    		$user_list['user_name']=$user->name;
    		$user_list['user_email']=$user->email;
    		$user_list['user_profile_image']=$user->profile_image;
    		$user_list['package_balance']=$user->package_balance;
            $reviews = Product_review::where("renterpriser_id" , $user_id)->get();
        if (sizeof($reviews)) 
        {
            $avg=0;
           foreach($reviews as $rev)
           {
             $avg+= $rev->star;
            }
            $totalreviews=ceil($avg/count($reviews));
        }
        
        else
        {
            $totalreviews=0;
        }
        $user_list['reviews_average']= $totalreviews;
        return response()->json([
            'success'      => true,
            'data'         => $user_list
        ]);
    }
    
    
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        
        return response()->json([
             'success'   => true,
            'message' => 'Successfully logged out'
        ]);
    }
}