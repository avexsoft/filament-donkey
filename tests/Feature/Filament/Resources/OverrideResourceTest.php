<?php

namespace Tests\Feature\Filament\Resources;

use Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource;
use Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource\Pages\ListOverrides;
use Avexsoft\FilamentDonkey\Tests\TestbenchTestCase;
use Filament\Facades\Filament;
use Livewire\Livewire;

// use function Pest\Livewire\livewire;

class OverrideResourceTest extends TestbenchTestCase
{
    use \Illuminate\Foundation\Testing\LazilyRefreshDatabase;
    use \Illuminate\Foundation\Testing\WithoutMiddleware;

    // protected $owner = null;

    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     // $this->owner = User::factory()->create();

    //     Filament::setCurrentPanel(Filament::getPanel('account'));
    // }

    public function test_owner_can_render_invitation_list_page()
    {

        Livewire::test(ListOverrides::class)
            ->assertOk();
        // $this
        // // ->actingAs($this->owner)
        //     ->get(OverrideResource::getUrl('index'))
        //     ->assertSuccessful();
    }
}
