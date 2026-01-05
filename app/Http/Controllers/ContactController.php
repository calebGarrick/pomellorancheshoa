<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HoaContactForm;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        request()->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'topic' => 'required|string',
                'message' => 'required|string',
                'response_type' => 'required|in:email,phone,none',
                'acknowledge_tos' => 'required|accepted',
            ],
            [
                'name.required' => 'Please enter your name',
                'email.required' => 'Please enter your email',
                'phone.max' => 'Ensure you have entered a valid phone number',
                'topic.required' => 'Please pick a topic',
                'message.required' => 'Please enter your message',
                'response_type.required' => 'Please select a preferred response method',
                'acknowledge_tos.required' => 'Please acknowledge the terms of communication',
            ],);

        Mail::to('prhoa@mailmt.com')->send(new HoaContactForm(request()->all()));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
