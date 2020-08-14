<?php

namespace Tests\Feature;

use App\Url;
use App\User;
use Exception;
use Illuminate\Support\Str;
use Tests\TestCase;

class urlOperations extends TestCase
{
    /**
     * Test if an authenticated user can create URLs
     * @return void
     * @throws Exception
     */
    public function test_user_can_create_url_with_token()
    {
        $user = factory(User::class)->create();

        $token = Str::slug(Str::random(9), '');

        $this->createUrl($user, $token);

        $this->assertDatabaseHas('urls', [
            'token' => $token
        ]);

        /** Clean it up */
        Url::firstOrFail()->where('token', $token)->delete();
        $user->delete();
    }

    public function test_url_can_only_be_delete_by_owner()
    {
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $token1 = $token = Str::slug(Str::random(9), '');
        $token2 = $token = Str::slug(Str::random(9), '');

        var_dump($token1);
        var_dump($token2);

        $this->createUrl($user1, $token1);
        $this->createUrl($user2, $token2);

        $url1 = Url::firstOrFail()->where('token', $token1)->first();
        $url2 = Url::firstOrFail()->where('token', $token2)->first();

        /** user1 cannot delete url that belongs to user2 */
        $this->deleteUrl($user1, $url2)
            ->assertStatus(401);
        $this->assertDatabaseHas('urls', [
            'token' => $token2
        ]);

        /** user2 cannot delete url that belongs to user1 */
        $this->deleteUrl($user2, $url1)
            ->assertStatus(401);
        $this->assertDatabaseHas('urls', [
            'token' => $token1
        ]);

        /** user1 can delete his own url */
        $this->deleteUrl($user1, $url1)
            ->assertRedirect(route('url.index'))
            ->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('urls', [
            'token' => $token1
        ]);


        /** user2 can delete his own url */
        $this->deleteUrl($user2, $url2)
            ->assertRedirect(route('url.index'))
            ->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('urls', [
            'token' => $token2
        ]);

        /** Clean it up */
        $user1->delete();
        $user2->delete();
    }

    /**
     * @param User $user
     * @param string $token
     */
    protected function createUrl(User $user, string $token): void
    {
        $this->actingAs($user)
            ->get(route('url.create'))
            ->assertOk()
            ->assertViewIs('dashboard.url.create');

        $this->actingAs($user)
            ->post(route('url.store'),
                [
                    '_token' => csrf_token(),
                    'urltoken' => $token,
                    'original_url' => 'https://lenineto.com/'.$token,
                    'enabled' => 'checked',

                ])
            ->assertRedirect(route('url.index'))
            ->assertSessionHasNoErrors();
    }

    /**
     * @param User $user
     * @param Url $url
     */
    protected function deleteUrl(User $user, Url $url)
    {
        return $this->actingAs($user)
            ->post(route('url.destroy', $url),
                [
                    '_method' => 'DELETE'
                ]);
    }
}
