<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Board;
use App\Models\Member;

class BoardTest extends TestCase
{
    /** @test */
    public function a_board_is_correctly_associated_with_a_member()
    {
        // Création d'un membre
        $member = Member::factory()->create();

        // Création d'un conseil d'administration associé à ce membre
        $board = Board::factory()->create([
            'member_id' => $member->id,
            'role' => 'Président',
        ]);

        // Vérification que 'member_id' du conseil correspond à l'ID du membre créé
        $this->assertEquals($member->id, $board->member_id);

        // Vérification que le membre associé au conseil est bien le membre créé
        $this->assertEquals($member->id, $board->member->id);
    }
}
