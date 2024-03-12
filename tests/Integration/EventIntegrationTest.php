<?php

namespace Tests\Feature\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class EventIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_event_and_be_redirected()
    {
        // Suppression de la gestion des exceptions
        $this->withoutExceptionHandling();

        // Crée un utilisateur de test
        $user = User::factory()->create();
        $this->actingAs($user);

        // Création d'une catégorie
        $category = Category::factory()->create();

        // Données de l'événement
        $eventData = [
            'name' => 'New Event',
            'description' => 'Description of the new event',
            'location' => 'Some location',
            'date' => '2024-02-10',
            'number_km' => 10,
            'supervisor' => 'New supervisor',
            'active' => '1',
            'category_id' => $category->id,
            'user_id' => $user->id,
            'image' => 'New image.jpg',
            'day' => 10,
        ];

        // Envoi de la requête POST
        $response = $this->post(route('events.store'), $eventData);

        // Vérifie que la réponse à la requête une redirection vers la page de gestion
        $response->assertRedirect(route('events.manage'));

        // Vérification que l'utilisateur voit l'événement sur la page
        $response = $this->get(route('events.manage'));
        $response->assertSee('New Event');
    }
}


