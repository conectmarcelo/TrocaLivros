<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;


class SocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();

        //echo "<h1>Seja Bem Vindo! {$user->getName()}</h1>";
        //echo "<img src='{$user->getAvatar()}' style='max-width:200px; border-radius:50%;'>";
       
        


       // User::create([
        //'name' => $user->getName(),
        //'email' => $user->getEmail(),
         //'password' => Hash::make($user->getID())
        //]);
        
        // $user->token;

        

        $findUser = User::where('email', $userSocial->email)->first();

        if($findUser){

            Auth::login($findUser);

            $users = $findUser;

            //return view('home', compact('users'));

            return redirect()->route('single.livros');
        }else{


            $user = new User();
        
        $user->name = $userSocial->name;
        $user->email = $userSocial->email;
        $user->password = Hash::make($userSocial->id);
        
        $user->save();

        Auth::login($user);

        $users = $user;

        return redirect()->route('single.livros');

        }
        
        
    }
}
