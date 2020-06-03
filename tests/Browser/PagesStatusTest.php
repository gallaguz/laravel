<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PagesStatusTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }
    public function testMainPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assert
                ->assertSee('Здравствуйте');
        });

        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testNewsPage()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function testCategoriesPage()
    {
        $response = $this->get('/news/categories');
        $response->assertStatus(200);
    }

    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
}
