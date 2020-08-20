<?php

namespace Tests\Feature;


use App\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class protectedRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if an anonymous user have access to the dashboard. Should redirect to /login
     * @return void
     */
    public function test_admin_routes_cannot_be_accessed_by_anonymous_users()
    {
        /** Test if anonymous users are kicked to login page */
        $this->backToLogin('dashboard');
        $this->backToLogin('url.index');
        $this->backToLogin('url.search.private');

        /** Test if the login page is rendering the login view */
        $this->get(route('login'))
            ->assertOk()
            ->assertViewIs('auth.login');
    }

    /**
     * Creates a user and try to access the dashboard as authenticated
     * Should get the dashboard and see the welcome message
     * @return void
     * @throws Exception
     * @noinspection PhpPossiblePolymorphicInvocationInspection
     */
    public function test_admin_routes_can_be_accessed_by_authenticated_users()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Welcome back, ' . $user->name);

        /** Clean it up */
       // $user->delete();

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
