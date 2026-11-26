<?php

namespace Tests\Feature\Api;

use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberApiTest extends TestCase
{
    use RefreshDatabase;   // ← trait: reset DB tiap test

    /** @test */
    public function it_returns_list_of_members()
    {
        // Arrange
        Member::factory()->count(3)->create();

        // Act
        $response = $this->getJson('/api/v1/members');

        // Assert
        $response->assertOk()
                 ->assertJsonCount(3, 'data')
                 ->assertJsonStructure([
                     'data' => [
                         ['id', 'slug', 'stage_name', 'real_name',
                          'positions', 'image_url', 'sort_order'],
                     ],
                 ]);
    }

    /** @test */
    public function it_returns_member_by_slug()
    {
        $member = Member::factory()->create([
            'slug'       => 'nayeon',
            'stage_name' => 'Nayeon',
        ]);

        $response = $this->getJson('/api/v1/members/nayeon');

        $response->assertOk()
                 ->assertJsonPath('data.slug', 'nayeon')
                 ->assertJsonPath('data.stage_name', 'Nayeon')
                 ->assertJsonPath('data.id', $member->id);
    }

    /** @test */
    public function it_returns_404_for_unknown_member()
    {
        $this->getJson('/api/v1/members/does-not-exist')
             ->assertNotFound();
    }

    /** @test */
    public function it_filters_members_by_sub_unit()
    {
        Member::factory()->create(['sub_unit' => 'MISAMO']);
        Member::factory()->count(2)->create(['sub_unit' => null]);

        $response = $this->getJson('/api/v1/members?sub_unit=MISAMO');

        $response->assertOk()
                 ->assertJsonCount(1, 'data');
    }
}