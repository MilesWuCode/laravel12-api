
<?php

use App\Models\User;

it('fetch me', function (): void {
    $this->getJson('/api/user')->assertStatus(401);

    $user = User::factory()->create();

    $this
        ->actingAs($user, 'sanctum')
        ->getJson('/api/user')
        ->assertOk();
});

it('login / logout', function (): void {
    $this
        ->postJson('/api/login', [
            'email' => 'wrong@email.com',
            'password' => 'wrong-password',
            'device_name' => 'web',
        ])
        ->assertStatus(422);

    $this
        ->deleteJson('/api/logout')
        ->assertStatus(401);

    $user = User::factory()->create();

    $this
        ->actingAs($user, 'sanctum')
        ->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'web',
        ])
        ->assertOk()
        ->assertJsonStructure(['token']);

    $this
        ->delete('/api/logout')
        ->assertStatus(204);
});
