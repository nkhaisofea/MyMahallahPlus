<?php

use App\Enums\Role;
use App\Models\Mahallah;
use App\Models\User;

test('new users are students by default', function () {
    $user = User::factory()->create();

    expect($user->fresh()->role)->toBe(Role::Student);
});

test('mahallah-bound roles belong to a mahallah', function (Role $role) {
    $mahallah = Mahallah::factory()->create();

    $user = User::factory()->role($role, $mahallah)->create();

    expect($user->mahallah->is($mahallah))->toBeTrue();
})->with([Role::Student, Role::Staff]);

test('cross-mahallah roles have no mahallah', function (Role $role) {
    $user = User::factory()->role($role)->create();

    expect($user->mahallah_id)->toBeNull()
        ->and($role->seesAllMahallahs())->toBeTrue();
})->with([Role::Officer, Role::SuperAdmin]);

test('role cannot be set through mass assignment', function () {
    $user = new User(['name' => 'X', 'email' => 'x@example.com', 'password' => 'secret', 'role' => 'super_admin']);

    expect($user->role)->toBeNull();
});
