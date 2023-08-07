<?php

namespace Tests\Feature\Models;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    private $department;

    protected function setUp(): void
    {
        parent::setUp();

        $this->department = Department::factory()->create();
    }

    public function test_departments_can_be_instantiated(): void
    {
        $this->assertInstanceOf(Department::class, $this->department);

        $this->assertModelExists($this->department);

        $this->assertNotEmpty($this->department->name);
        $this->assertIsString($this->department->name);
        $this->assertTrue(50 <= Str::length($this->department->name));
    }

    public function test_departments_can_be_soft_deleted(): void
    {
        $this->department->delete();

        $this->assertModelExists($this->department);
    }
}
