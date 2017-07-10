<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WebTest extends DuskTestCase
{
    public function testHomepageDisplayed()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertSee("Send any link to your inbox in just one click!");
        });
    }
}
