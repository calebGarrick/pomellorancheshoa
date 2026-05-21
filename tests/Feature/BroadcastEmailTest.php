<?php

use App\Mail\HoaBroadcast;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutMiddleware(ValidateCsrfToken::class);
});

it('allows admins to open the broadcast email page', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('mail.broadcast.create'))
        ->assertSuccessful()
        ->assertSee('Send Broadcast Email');
});

it('forbids regular users from opening the broadcast email page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('mail.broadcast.create'))
        ->assertForbidden();
});

it('sends broadcast email to all users', function () {
    Mail::fake();

    $admin = User::factory()->admin()->create([
        'name' => 'Admin Sender',
    ]);
    $userOne = User::factory()->create();
    $userTwo = User::factory()->create();

    $this->actingAs($admin)
        ->post(route('mail.broadcast.send'), [
            'subject' => 'Community Update',
            'message' => 'This is a test broadcast message.',
        ])
        ->assertSessionHas('success');

    Mail::assertSent(HoaBroadcast::class, 3);

    $emails = [$admin->email, $userOne->email, $userTwo->email];

    foreach ($emails as $email) {
        Mail::assertSent(HoaBroadcast::class, function (HoaBroadcast $mail) use ($email) {
            return $mail->hasTo($email)
                && $mail->subjectLine === 'Community Update'
                && $mail->bodyText === 'This is a test broadcast message.';
        });
    }
});

it('validates broadcast subject and message', function () {
    Mail::fake();

    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->post(route('mail.broadcast.send'), [
            'subject' => '',
            'message' => '',
        ])
        ->assertSessionHasErrors(['subject', 'message']);

    Mail::assertNothingSent();
});
