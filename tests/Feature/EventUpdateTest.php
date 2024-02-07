<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;

class EventUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_update_an_event()
    {

        // Suppression de la gestion des exceptions pour voir plus clairement les erreurs pendant le développement
        $this->withoutExceptionHandling();

        // Création d'un utilisateur et authentification (si nécessaire)
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        // Création d'un événement à mettre à jour
        $event = Event::factory()->create([
            'name' => 'Old Title',
            'description' => 'Old description',
            'day' => 1,
            'image' => 'path/to/event/image.jpg',
            'location' => 'Old location',
            'date' => '2022-01-01',
            'number_km' => 10,
            'category_id' => $category->id,
            'user_id' => $user,
            'active' => true,
            'supervisor' => 'Old supervisor',

        ]);

        // Nouvelles données pour l'événement
        $updatedData = [
            'name' => 'New Title',
            'description' => 'New description',
            'day' => 2,
            'image' => 'path/to/new/image.jpg',
            'location' => 'New location',
            'date' => '2022-01-02',
            'number_km' => 20,
            'category_id' => $category->id,
            'user_id' => $user->id,
            'active' => false,
            'supervisor' => 'New supervisor',
        ];


        // Envoi de la requête PUT pour mettre à jour l'événement
        $response = $this->put(route('events.update', $event->id), $updatedData);

        // Vérifications
        $response->assertRedirect('/events/manage');
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'name' => 'New Title',
            'description' => 'New description',
            // Vérifiez la présence d'autres champs mis à jour
        ]);
    }
}
