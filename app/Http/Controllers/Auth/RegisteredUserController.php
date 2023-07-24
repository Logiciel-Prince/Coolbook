<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    Public $filename;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
      
            $image=$request->file('image');
            $name=$_FILES['image']['name'];
            // $file=$_FILES['image']['tmp_name'];
            $extension=explode('.',$name);
            $ex=$extension[1];
            $filename=time().'.'.$ex;
            $image->move('images/Userimage',$filename);
            // $ob->pimage=$filename;
            // dd($this->filename);
        
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $filename,
            ]);
            $email=$request->get('email');
            $user=User::where(['email'=>$email])->first();
            $request->session()->put('userid',$user->id);
            $request->session()->put('username',$user->name);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
