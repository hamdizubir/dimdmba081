<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;



class LoginController extends Controller
{

    public function showLogin()
    {
    // Form View
    return view('login');
    }

    public function login(LoginRequest $request)
    {
    // // Creating Rules for Email and Password
    // $rules = array(
    //   'email' => 'required|email', // make sure the email is an actual email
    //   'password' => 'required|alphaNum|min:8');
    //   // password has to be greater than 3 characters and can only be alphanumeric and);
    //   // checking all field

        $validator = $request->validate([
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:8'
        ]);
      // if the validator fails, redirect back to the form
        if ($validator->fails())
        {
        return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
        ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else
        {
        // create our user data for the authentication
        $userdata = array(
          'email' => $request->input('email') ,
          'password' => $request->input('password')
        );
        // attempt to do the login

        $user = DB::table('users')->where('email',$request->input('email'))->first();

        if ($user)
          {
            if($user->password === $request->input('password')) return Redirect::to('dashboard');

            echo 'login failed';
          // validation successful
          // do whatever you want on success
          }
          else
          {
          // validation not successful, send back to form
          echo 'login failed';
          }
        }
    }
      
}
