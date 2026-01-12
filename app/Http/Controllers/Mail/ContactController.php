<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\HoaContactForm;

class ContactController extends Controller
{
    public function showContactForm()
    {
        $user = Auth::user();
        return view('contact', compact('user'));
    }

    public function send(Request $request)
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

        try {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new HoaContactForm(request()->all()));
            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            Log::error('Mail send failed: ' . $e->getMessage());
            return back()->with('error', "Failed to send message: {$e->getMessage()}");
        }

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
