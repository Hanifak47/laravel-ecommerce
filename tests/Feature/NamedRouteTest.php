<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NamedRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_named()
    {
        $this->get('/named')
            ->assertSeeText('/about-us')
        ;
    }

    public function test_named_param()
    {
        $this->get('/product_param')
            ->assertSeeText('id/product/3')
        ;
    }

    public function test_redirect()
    {
        $this->get('/current-user')
            ->assertRedirect('/users/profile')
            // ->assertSeeText('Hanif Aulia Kusuma')
        ;

        $this->get('/users/profile')
            ->assertSeeText('Hanif Aulia Kusuma');
    }
}
