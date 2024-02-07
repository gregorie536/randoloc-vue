<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    /** @test */
    public function it_creates_and_retrieves_a_category()
    {
        // Création d'une nouvelle catégorie
        $category = Category::factory()->create(['name' => 'Sports']);

        // Récupération de la catégorie par son ID et vérification du nom
        $retrievedCategory = Category::find($category->id);

        $this->assertEquals('Sports', $retrievedCategory->name);
    }
}
