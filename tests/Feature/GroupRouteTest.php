<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_group_route()
    {
        $this->get('/admin/users')
            ->assertSeeText('/admin/users')
        ;
    }

    public function test_sum()
    {
        $this->get('/math/first/1/second/3')
            ->assertSeeText('4')
        ;

        $this->get('/math/first/a/second/3')
            ->assertDontSeeText('3a')
        ;
    }
}
