<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating an event.
     *
     * @return void
     */
    public function test_create_event()
    {
        $data = [
            'name' => 'Event 1',
            'description' => 'Description for Event 1',
            // Add other fields as needed
        ];

        $response = $this->postJson('/api/events', $data);

        $response->assertStatus(201); // Check for successful creation status

        // Additional assertions to check the response data, database records, etc.
    }

    /**
     * Test viewing an event.
     *
     * @return void
     */
    public function test_view_event()
    {
        $event = Event::factory()->create();

        $response = $this->getJson('/api/events/' . $event->id);

        $response->assertStatus(200); // Check for successful retrieval status

        // Additional assertions to check the response data, returned event, etc.
    }

    /**
     * Test updating an event.
     *
     * @return void
     */
    public function test_update_event()
    {
        $event = Event::factory()->create();

        $data = [
            'name' => 'Updated Event Name',
            // Update other fields as needed
        ];

        $response = $this->putJson('/api/events/' . $event->id, $data);

        $response->assertStatus(200); // Check for successful update status

        // Additional assertions to check the response data, updated event, etc.
    }

    /**
     * Test deleting an event.
     *
     * @return void
     */
    public function test_delete_event()
    {
        $event = Event::factory()->create();

        $response = $this->deleteJson('/api/events/' . $event->id);

        $response->assertStatus(204); // Check for successful delete status

        // Additional assertions to check the database records, etc.
    }

    // You can also add methods to test listing all events, handling validation, etc.
}
