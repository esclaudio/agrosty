<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    // use RefreshDatabase;

    public function testForms()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
