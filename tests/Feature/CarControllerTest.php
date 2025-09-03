<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_controllernya()
    {
        $this->get('/car')
            ->assertSeeText('ini adalah kontroller index')
        ;

        $this->get(uri: '/my-car')
            ->assertSeeText('mobilku')
        ;
    }

    public function test_controllernyaa()
    {
        $this->get('/car')
            ->assertSeeText('ini adalah kontroller index')
        ;

        $this->get(uri: '/my-car')
            ->assertSeeText('mobilku')
        ;
    }

    public function test_invoke_car()
    {
        $this->get('/show-car')
            ->assertSeeText('invokable')
        ;
    }
}
