<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\HomepageFeature;

class FeatureTest extends TestCase
{
    /** @test */
    public function it_creates_homepage_feature_correctly()
    {
        $feature = HomepageFeature::factory()->create([
            'title' => 'New Feature',
            'image' => 'feature.jpg',
            'description' => 'A detailed description.',
            'location' => 'bottom',
            'feature_date' => '2022-01-01',
        ]);

        $this->assertDatabaseHas('homepage_features', [
            'image' => 'feature.jpg',
            'description' => 'A detailed description.',
            'location' => 'bottom',
            'feature_date' => '2022-01-01',
        ]);
    }
}
