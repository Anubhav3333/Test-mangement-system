<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\users;

use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;

class testcontroler extends Controller


{

    public function welcome()
    {

        return view('welcome');
    }


    public function registration()
    {

        return view('registration');
    }


    public function registrationStore(Request $request)
    {


        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',

            'role'     => 'nullable|string',

            'status'   => 'nullable|string',
        ]);
        // dd($validated);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],

            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'] ?? 'student',
            'status'   => $validated['status'] ?? 'active',
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registration successful!');
    }

    public function test()
    {

        $test = test::all();
        return view('test', compact('test'));
    }
    public function testpage()
    {

        return view('test');
    }


    public function testStore(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Test::create($validated);


        
        return redirect()
            ->route('login')
            ->with('success', 'Registration successful!');
    }




    public function login()
    {

        return view('login');
    }

    public function summitLogin(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.'
                ])
                ->withInput();
        }

        if ($user->role == 'ADMIN') {
            return redirect('/admin');
        } else if ($user->role == 'TEACHER') {
            return redirect('/teacher');
        } else  return redirect('/student');
    }

    // usertable






};
