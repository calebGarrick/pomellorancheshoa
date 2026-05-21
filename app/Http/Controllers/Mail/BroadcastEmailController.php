<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendBroadcastEmailRequest;
use App\Mail\HoaBroadcast;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BroadcastEmailController extends Controller
{
    public function create()
    {
        $this->authorize('viewAny', User::class);

        $recipientCount = User::query()
            ->whereNotNull('email')
            ->count();

        return view('mail.broadcast', [
            'recipientCount' => $recipientCount,
        ]);
    }

    public function send(SendBroadcastEmailRequest $request)
    {
        $recipients = User::query()
            ->whereNotNull('email')
            ->select(['name', 'email'])
            ->get();

        if ($recipients->isEmpty()) {
            return redirect()
                ->back()
                ->with('error', 'No users with valid email addresses were found.');
        }

        $validated = $request->validated();

        try {
            foreach ($recipients as $recipient) {
                Mail::to($recipient->email)->send(new HoaBroadcast(
                    subjectLine: $validated['subject'],
                    bodyText: $validated['message'],
                    senderName: $request->user()->name,
                    recipientName: $recipient->name,
                ));
            }
        } catch (\Throwable $exception) {
            Log::error('Broadcast email send failed.', [
                'error' => $exception->getMessage(),
                'sender_id' => $request->user()->id,
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Broadcast send failed. Please check mail settings and try again.');
        }

        return redirect()
            ->back()
            ->with('success', "Broadcast email sent to {$recipients->count()} users.");
    }
}
