<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateFormTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('clear:all');
    }

    public function testCreateForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                ->type('title', '12345')
                ->type('text', 'test123')
                ->press('Добавить')
                ->assertSee('Новость успешно создана!')
                ->assertPathIs('/admin');
        });
    }
}
