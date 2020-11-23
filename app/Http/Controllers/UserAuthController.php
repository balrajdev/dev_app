<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

use Illuminate\Support\Str;




class UserAuthController extends Controller
{
     /**
     * User Login.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

     		 return redirect('/developers');

		}
		else
		{
		   return redirect('/')->with(['responce' => 'mismatch' , 'email' => $email]);
		}
    
    }


    //Register
     public function register(Request $request)
    {

    	$validator = $request->validate([
        'email' => 'required|unique:users|email',
        'username' => 'required',
        'password' => 'required',
        ]);

    	$email=$request->input('email'); 
		$username=$request->input('username');
		$password=$request->input('password');
	
		$user= new User;
		$user->name = $username;
		$user->email = $email;
		$user->password = $password;
		$user->save();
		
   		return redirect('/')->with(['responce' => 'registersuccess' , 'email' => $email]);

    }



    public function resetpassword(Request $request)
    {

         $email=$request->input('email');

         $useremail = User::where(['email' => $email ])->get();

         // CHECK JOB COUNT
         $usercount = $useremail->count();

         if($usercount > 0)
         {

            //string Generator
            $password= Str::random(8);

            //user Password Updation
            $user = User::find($useremail[0]->id);
            $user->password =$password;
            $user->save();
            
            //redirect url
            return redirect('/forgetpassword')->with(['success' =>'reset_password_success', 'password' => $password ]);


         }
         else
         {
            //redirect url
            return redirect('/forgetpassword')->with(['error' => 'emailid_notfound', 'email' => $email ]);
         }

    }


    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');

    }

}
