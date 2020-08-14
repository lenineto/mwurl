<?php

namespace Tests\Feature;


use App\User;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class protectedRoutes extends TestCase
{
    /**
     * Test if an anonymous user have access to the dashboard. Should redirect to /login
     * @return void
     */
    public function test_admin_routes_cannot_be_accessed_by_anonymous_users()
    {
        $this->backToLogin('dashboard');
        $this->backToLogin('url.index');
        $this->backToLogin('url.search.private');

        $this->get(route('login'))
            ->assertOk()
            ->assertViewIs('auth.login');
    }

    /**
     * Creates a user and try to access the dashboard as authenticated
     * Should get the dashboard and see the welcome message
     * @return void
     */
    public function test_admin_routes_can_be_accessed_by_authenticated_users()
    {
        $user = factory(User::class)->create();
        var_dump($user->name);
        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertStatus(200)
            ->assertSee('Welcome back, ' . $user->name);

    }

    /**
     * @param string $route
     * @return TestResponse
     */
    protected function backToLogin(string $route): TestResponse
    {
        return $this->get(route($route))
            ->assertRedirect(route('login'));
    }
}
