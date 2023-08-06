<?php

namespace Tests\Feature\Models;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_departments_can_be_instantiated(): void
    {
        $department = Department::factory()->create();

        $this->assertInstanceOf(Department::class, $department);

        $this->assertModelExists($department);

        $this->assertNotEmpty($department->name);
        $this->assertIsString($department->name);
        $this->assertTrue(50 <= Str::length($department->name));
    }
}
