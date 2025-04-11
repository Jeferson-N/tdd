<?php

use App\Models\User;

beforeEach(fn() => $this->route = '/api/users');

it('create a user via API', function () {
    $response = $this->postJson($this->route, [
        'name' => 'jefin',
        'email' => 'jeferson@example.com',
        'password' => 'password',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['id', 'name', 'email']);

    $this->assertDatabaseHas('users', [
        'email' => 'jeferson@example.com',
    ]);

    expect($response->json('name'))->toBe('jefin');
});

it('name should be required', function () {

    $this->post($this->route, [])->assertSessionHasErrors([
        'name' => __('validation.required', ['attribute' => 'name']),
    ]);
});

it('name should have a max of 200 characters', function () {

    $this->post($this->route, [
        'name' => str_repeat('a', 201),
    ])->assertSessionHasErrors([
        'name' => __('validation.max.string', ['attribute' => 'name', 'max' => 200]),
    ]);
});

it('email should unique', function () {

    User::factory()->create([
        'name' => 'jefin',
        'email' => 'jeferson@example.com',
        'password' => 'password',
    ]);

    $this->post($this->route, [
        'name' => 'jefin',
        'email' => 'jeferson@example.com',
        'password' => 'password',
    ])->assertSessionHasErrors([
        'email' => __('validation.unique', ['attribute' => 'email'])
    ]);
});
