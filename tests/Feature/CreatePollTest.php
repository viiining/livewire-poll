<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Livewire\CreatePoll;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class CreatePollTest extends TestCase
{

    public function test_valid_title_and_options()
    {
        Livewire::test(CreatePoll::class)
            ->set('title', 'Valid Title')
            ->set('options', ['Option 1'])
            ->call('createPoll');

        $this->assertDatabaseHas('polls', [
            'title' => 'Valid Title',
        ]);

        $this->assertDatabaseHas('options', [
            'name' => 'Option 1',
        ]);
    }

    public function test_dynamic_options()
    {
        Livewire::test(CreatePoll::class)
            ->set('title', 'Valid Title')
            ->set('options', ['Option 1', 'Option 2'])
            ->call('addOption')
            ->call('removeOption', 1)
            ->call('createPoll');

        $this->assertDatabaseHas('polls', [
            'title' => 'Valid Title',
        ]);

        $this->assertDatabaseHas('options', [
            'name' => 'Option 1',
        ]);

        $this->assertDatabaseMissing('options', [
            'name' => 'Option 2',
        ]);
    }
}
