<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParamRegexTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_param_regex()
    {
        $this->get('/user/Hanif')
            ->assertDontSeeText('lower case')
        ;

        $this->get('/user/hanif')
            ->assertSeeText('lower case')
        ;
    }

    public function test_dobel_param()
    {
        $this->get('/lang/en/product/1239')
            ->assertSeeText('memenuhi')
        ;

        $this->get('/lang/ena/product/1239')
            ->assertDontSeeText('memenuhi')
        ;

        $this->get('/lang/ena/product/139')
            ->assertDontSeeText('memenuhi')
        ;
    }

    public function test_special_param()
    {
        $this->get('/search/1/27')
        ->assertDontSeeText('1/27')
        ;

        $this->get('/cari/1/27')
        ->assertSeeText('1/27')
        ;
    }
}
