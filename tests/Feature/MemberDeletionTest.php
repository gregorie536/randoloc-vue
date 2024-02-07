<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Member;

class MemberDeletionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_delete_a_member()
    {
        $this->withoutExceptionHandling();

        // Assurez-vous d'avoir une méthode d'authentification ou ignorez cette partie si votre route n'exige pas d'authentification
        $user = User::factory()->create();
        $this->actingAs($user);

        // Création d'un membre à supprimer
        $member = Member::factory()->create();

        // Envoi de la requête DELETE pour supprimer le membre
        $response = $this->delete(route('organization.members.destroy', $member->id));

        // Vérifications
        $response->assertRedirect('organization/members/manage');
        $this->assertDatabaseMissing('members', ['id' => $member->id]);
    }
}
