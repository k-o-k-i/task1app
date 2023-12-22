<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class UserController extends Controller
{
//    Logout
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'Logged out.');
    }
//  Login
    public function login(Request $request){
        $inputFields = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if (auth()->attempt([
            'username'=> $inputFields['username'],
            'password'=> $inputFields['password']
        ])){
            $request->session()->regenerate();
            return redirect('/profile/'. auth()->user()->username)->with('success', 'Successfully logged in.');

        } else {
            return redirect('/login')->with('failure', 'Invalid login.');
        }
    }

    public function loginView(){
        return view('login');
    }

//  Register
    public function register(Request $request){

        $inputFields = $request->validate([
            'username'=>['required', 'min:3', 'max:30', Rule::unique('users', 'username')],
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            'password'=>['required', 'min:8', 'confirmed']
        ]);

        $inputFields['password'] = bcrypt($inputFields['password']);

        $user=User::create($inputFields);
        auth()->login($user);

        return redirect('/')->with('success', 'Thank You for creating an account.');
    }

    public function registerView(){
        return view('register');
    }

    public function profileView(User $user){
        return view('profile', ['username'=>$user->username, 'links'=> $user->links()->get()]);
    }

    public function homepageView(){
        try {
            $items = session()->get('items');
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
        }
        return view('homepage',['items'=>$items]);
    }
}
