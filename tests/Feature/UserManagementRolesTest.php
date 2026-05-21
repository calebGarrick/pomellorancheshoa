<?php

use App\Models\User;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutMiddleware(ValidateCsrfToken::class);
});

function validUserUpdateData(User $user, array $overrides = []): array
{
    return array_merge([
        'name' => $user->name,
        'email' => $user->email,
        'phone' => $user->phone,
        'mail_address' => $user->mail_address,
        'bill_address' => $user->bill_address,
        'lot' => $user->lot,
        'emergency_name' => $user->emergency_name,
        'emergency_phone' => $user->emergency_phone,
        'ecommunication' => $user->ecommunication,
    ], $overrides);
}

it('allows admins to view another user but not edit them', function () {
    $admin = User::factory()->admin()->create();
    $targetUser = User::factory()->create();

    $this->actingAs($admin)
        ->get(route('user.edit', $targetUser))
        ->assertSuccessful();

    $this->actingAs($admin)
        ->put(route('user.update', $targetUser), validUserUpdateData($targetUser, [
            'name' => 'Changed By Admin',
        ]))
        ->assertForbidden();

    expect($targetUser->fresh()->name)->toBe($targetUser->name);
});

it('allows admins to edit their own profile', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->put(route('user.update', $admin), validUserUpdateData($admin, [
            'name' => 'Admin Self Update',
        ]))
        ->assertRedirect();

    expect($admin->fresh()->name)->toBe('Admin Self Update');
});

it('allows superadmins to edit other users', function () {
    $superadmin = User::factory()->superadmin()->create();
    $targetUser = User::factory()->create();

    $this->actingAs($superadmin)
        ->put(route('user.update', $targetUser), validUserUpdateData($targetUser, [
            'name' => 'Changed By Superadmin',
        ]))
        ->assertRedirect();

    expect($targetUser->fresh()->name)->toBe('Changed By Superadmin');
});

it('allows superadmins to admin and un-admin users', function () {
    $superadmin = User::factory()->superadmin()->create();
    $targetUser = User::factory()->create();

    $this->actingAs($superadmin)
        ->patch(route('user.toggle-admin', $targetUser))
        ->assertRedirect();

    expect($targetUser->fresh()->role)->toBe('admin');

    $this->actingAs($superadmin)
        ->patch(route('user.toggle-admin', $targetUser))
        ->assertRedirect();

    expect($targetUser->fresh()->role)->toBe('user');
});

it('prevents admins from toggling admin access', function () {
    $admin = User::factory()->admin()->create();
    $targetUser = User::factory()->create();

    $this->actingAs($admin)
        ->patch(route('user.toggle-admin', $targetUser))
        ->assertForbidden();

    expect($targetUser->fresh()->role)->toBe('user');
});
