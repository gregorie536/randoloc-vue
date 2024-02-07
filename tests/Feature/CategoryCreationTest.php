<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CategoryCreationTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_category()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $categoryData = [
            'name' => 'New Category',
        ];

        $response = $this->post('/categories', $categoryData);

        $response->assertRedirect('/categories/manage');
        $this->assertDatabaseHas('categories', ['name' => 'New Category']);
        
    }
}
