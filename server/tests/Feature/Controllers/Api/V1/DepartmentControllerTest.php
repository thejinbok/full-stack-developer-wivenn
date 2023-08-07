<?php

namespace Tests\Feature\Controllers\Api\V1;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_departments_index_endpoint_works(): void
    {
        Department::factory()->count(5)->create();

        $response = $this->getJson('/api/v1/departments');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ],
            'links' => [
                'first',
                'last',
                'prev',
                'next',
            ],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active',
                    ],
                ],
                'path',
                'per_page',
                'to',
                'total',
            ],
        ]);

        $response->assertJsonCount(5, 'data');
    }

    public function test_departments_store_endpoint_works(): void
    {
        $response = $this->postJson('/api/v1/departments', ['name' => 'Whatever']);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'created_at',
                'updated_at',
            ],
        ]);

        $response->assertJson([
            'data' => [
                'name' => 'Whatever',
            ],
        ]);

        $this->assertDatabaseHas(Department::class, $response->json()['data']);
    }

    public function test_departments_show_endpoint_works(): void
    {
        $department = Department::factory()->create();

        $response = $this->getJson('/api/v1/departments/' . $department->id);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'created_at',
                'updated_at',
                'deleted_at',
            ],
        ]);
    }

    public function test_departments_update_endpoint_works(): void
    {
        $department = Department::factory()->create();

        $response = $this->putJson('/api/v1/departments/' . $department->id, ['name' => 'Whatever']);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'created_at',
                'updated_at',
                'deleted_at',
            ],
        ]);

        $response->assertJson([
            'data' => [
                'name' => 'Whatever',
            ],
        ]);

        $this->assertDatabaseHas(Department::class, $response->json()['data']);

        $response = $this->patchJson('/api/v1/departments/' . $department->id, ['name' => 'revetahW']);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'created_at',
                'updated_at',
                'deleted_at',
            ],
        ]);

        $response->assertJson([
            'data' => [
                'name' => 'revetahW',
            ],
        ]);

        $this->assertDatabaseHas(Department::class, $response->json()['data']);
    }

    public function test_departments_destroy_endpoint_works(): void
    {
        $department = Department::factory()->create();

        $response = $this->deleteJson('/api/v1/departments/' . $department->id);

        $response->assertStatus(204);

        $this->assertModelExists($department);
    }
}
