<?php

namespace Tests\Feature\Views;

use Tests\TestCase;

class StoplightTest extends TestCase
{
    public function test_stoplight_view_renders_correctly(): void
    {
        $response = $this->get(route('stoplight'));

        $response->assertStatus(200);

        $response->assertViewIs('stoplight');

        # TODO: test the HTML content and structure
    }
}
