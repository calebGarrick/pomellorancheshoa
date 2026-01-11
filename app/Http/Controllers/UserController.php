<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny');

        return redirect('/')->with('success','Viewing all users');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10', 'max:255', 'unique:users'],
            'mail_address' => ['required', 'string', 'max:255'],
            'bill_address' => ['required', 'string', 'max:255'],
            'emergency_name' => ['required', 'string', 'max:255'],
            'emergency_phone' => ['required', 'string', 'min:10', 'max:255'],
            'ecommunication' => ['required'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'mail_address' => $validated['mail_address'],
            'bill_address' => $validated['bill_address'],
            'emergency_name' => $validated['emergency_name'],
            'emergency_phone' => $validated['emergency_phone'],
            'ecommunication' => $request->input('ecommunication') === 'on',
            'lot' => strlen($request->input('lot')) ? $request->input('lot') : null,
        ]);
        
        Auth::login($user);

        return redirect('/')->with('success', 'Welcome to Pomello Ranches');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('view', $user);

        return redirect('/')->with('success', 'Viewing user '.$user->name);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'string', 'min:10', 'max:255', Rule::unique('users')->ignore($user->id)],
            'mail_address' => ['required', 'string', 'max:255'],
            'bill_address' => ['required', 'string', 'max:255'],
            'emergency_name' => ['required', 'string', 'max:255'],
            'emergency_phone' => ['required', 'string', 'min:10', 'max:255'],
        ],
        );

        $user->update([
        ...$validated,
        'lot' => $request->filled('lot') ? $request->lot : null,
        'ecommunication' => null != $request->input('ecommunication'),
    ]);

        return redirect('/settings')->with('success', 'Successfully update user info' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        return redirect('/')->with('success', 'Deleting user: '.$user->name);
    }

    public function settings(){
        $user = auth()->user();

        $this->authorize('view', $user);

        return view('users.edit', ['user' => $user])->with('success', 'Viewing own user: '.$user->name);
    }
}
