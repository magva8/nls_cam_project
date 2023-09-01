<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Camera;

class CameraTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a camera.
     *
     * @return void
     */
    public function test_create_camera()
    {
        $data = [
            'name' => 'Camera 1',
            'description' => 'Description for Camera 1',
            // Add other fields as needed
        ];

        $response = $this->postJson('/api/cameras', $data);

        $response->assertStatus(201); // Check for successful creation status

        // Additional assertions to check the response data, database records, etc.
    }

    /**
     * Test viewing a camera.
     *
     * @return void
     */
    public function test_view_camera()
    {
        $camera = Camera::factory()->create();

        $response = $this->getJson('/api/cameras/' . $camera->id);

        $response->assertStatus(200); // Check for successful retrieval status

        // Additional assertions to check the response data, returned camera, etc.
    }

    /**
     * Test updating a camera.
     *
     * @return void
     */
    public function test_update_camera()
    {
        $camera = Camera::factory()->create();

        $data = [
            'name' => 'Updated Camera Name',
            // Update other fields as needed
        ];

        $response = $this->putJson('/api/cameras/' . $camera->id, $data);

        $response->assertStatus(200); // Check for successful update status

        // Additional assertions to check the response data, updated camera, etc.
    }

    /**
     * Test deleting a camera.
     *
     * @return void
     */
    public function test_delete_camera()
    {
        $camera = Camera::factory()->create();

        $response = $this->deleteJson('/api/cameras/' . $camera->id);

        $response->assertStatus(204); // Check for successful delete status

        // Additional assertions to check the database records, etc.
    }

    // You can also add methods to test listing all cameras, handling validation, etc.
}
