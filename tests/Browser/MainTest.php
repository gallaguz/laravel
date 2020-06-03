<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MainTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }
    public function testMainPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Здравствуйте');
        });
    }
}
