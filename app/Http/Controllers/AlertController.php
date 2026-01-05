<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alerts = Alert::all();

        return view('home', ['alerts' => $alerts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:100',
            ],
            'message' => [
                'required',
                'string',
                'max:1027',
            ], 
            [
                'message.required' => 'Please write an alert',
                'message.max' => 'Alerts must be 1027 characters or less.',
                'title.max' => 'Titles must be 100 characters or less.',
            ],
        ]);

        auth('admin')->user()->alerts()->create($validated);

        return redirect('/')->with('success', 'Your alert has been posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alert $alert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alert $alert)
    {
        $this->authorize('update', $alert);

        return view('alerts.edit', compact('alert'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alert $alert)
    {
        $this->authorize('update', $alert);
        
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:100',
            ],
            'message' => [
                'required',
                'string',
                'max:1027',
            ], 
            [
                'message.required' => 'Please write an alert',
                'message.max' => 'Alerts must be 1027 characters or less.',
                'title.max' => 'Titles must be 100 characters or less.',
            ],
        ]);

        $alert->update($validated);

        return redirect('/')->with('success', 'Alert updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alert $alert)
    {
        $this->authorize('delete', $alert);

        $alert->delete();

        return redirect('/')->with('success', 'Alert deleted!');
    }
}
