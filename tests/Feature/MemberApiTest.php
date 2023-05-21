<?php

namespace Tests\Feature;

use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MemberApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup method for the test case.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Migrate the database
        Artisan::call('migrate');
        // Artisan::call('db:seed');
    }

    // protected function tearDown(): void
    // {
    //     Artisan::call('migrate:reset');
    // }

    /**
     * Test creating a member.
     */
    public function testCreateMember()
    {
        $data = [
            'first_name' => 'Mark',
            'last_name' => 'Black',
            'email' => 'markblack@example.com',
            'birthdate' => '1994-05-10',
        ];

        $response = $this->postJson('/api/members', $data);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Member created successfully.',
            ]);
    }

    /**
     * Test retrieving a member.
     */
    public function testRetrieveMember()
    {
        $member = Member::factory()->create();

        $response = $this->getJson('/api/members/' . $member->id);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'first_name' => $member->first_name,
                    'last_name' => $member->last_name,
                    'email' => $member->email,
                    'birthdate' => $member->birthdate,
                ],
            ]);
    }

    /**
     * Test updating a member.
     */
    public function testUpdateMember()
    {
        $member = Member::factory()->create();

        $data = [
            'first_name' => 'Updated First Name',
            'last_name' => 'Updated Last Name',
            'email' => 'updatedemail@example.com',
            'birthdate' => '1995-02-15',
        ];

        $response = $this->putJson('/api/members/' . $member->id, $data);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Member updated successfully.',
            ]);
    }

    /**
     * Test deleting a member.
     */
    public function testDeleteMember()
    {
        $member = Member::factory()->create();

        $response = $this->deleteJson('/api/members/' . $member->id);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Member deleted successfully.',
            ]);
    }
}
