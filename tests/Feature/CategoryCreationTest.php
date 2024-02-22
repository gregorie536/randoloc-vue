<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class CategoryCreationTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_category()
    {
        // Suppression de la gestion des exceptions
        $this->withoutExceptionHandling();

        // Crée un utilisateur de test
        $user = User::factory()->create();
        $this->actingAs($user);

        // Prépare les données de la nouvelle catégorie
        $categoryData = [
            'name' => 'New category test',
        ];

        // Envoie une requête POST
        $response = $this->post('/categories', $categoryData);

        // Vérifie que la réponse à la requête est une redirection vers la page de gestion
        $response->assertRedirect('/categories/manage');

        // Confirme que la nouvelle catégorie existe dans la base de données,
        $this->assertDatabaseHas('categories', ['name' => 'New Category']);
    }
}
