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
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%");
            })
            ->orderBy('name')
            ->paginate(25);

        // Keep the search query in pagination links
        $users->appends(['search' => $search]);

        if ($request->ajax()) {
            return view('users.partials.user_list', compact('users'))->render();
        }

        return view('users.index', compact('users'));
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
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            ...$validated,
            'lot' => $request->filled('lot') ? $request->lot : null,
            'ecommunication' => $request->filled('ecommunication'),
            'approved' => false,
        ]);

        return redirect()->route('home')->with('success', 'Your account has been created and is pending approval.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('viewAny', $user);

        return view('users.edit', ['user' => $user, 'title'=>"Account Settings of $user->name"])->with('success', 'Viewing user: '.$user->name);
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
            'ecommunication' => $request->filled('ecommunication'),
        ]);

        return redirect()->back()->with('success', 'Successfully update user info' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $name = $user->name;

        $user->delete();

        return redirect()->route('home')->with('success', "Deleted user: $name");
    }

    public function settings(){
        $user = auth()->user();

        $this->authorize('view', $user);

        return view('users.edit', ['user' => $user, 'title'=>'Account Settings'])->with('success', 'Viewing own user: '.$user->name);
    }

    public function approve(User $user){
        $this->authorize('approve', User::class);

        $user->update(['approved' => true]);

        return redirect()->back()->with('success', "Approved user: $user->name");
    }
}
