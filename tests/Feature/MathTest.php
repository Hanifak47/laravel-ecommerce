<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MathTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_math()
    {
        $this->get('/sum/2/2')
            ->assertSeeText('4')
        ;

        $this->get('/sum/a/2')
            ->assertDontSeeText('2')
            ->assertSeeText('Halaman tidak tersedia')
        ;

        $this->get('/substract/4/2')
            ->assertSeeText('2')
        ;

        $this->get('/substract/2/4')
            ->assertSeeText('first number should be higher than second one')
        ;

        $this->get('/substract/a/2')
            ->assertDontSeeText('2')
            ->assertSeeText('Halaman tidak tersedia')
        ;
    }
}
