<?php

namespace Tests\Feature;

use Tests\TestCase;

class StoreMovieTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->setName('api store movie status code 200 without auth');

        $this->json('GET', 'api/movies', [], [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->assertOk();
    }
}
