<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\EventType;

class EventTypeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating an event type.
     *
     * @return void
     */
    public function test_create_event_type()
    {
        $data = [
            'name' => 'Event Type 1',
            'description' => 'Description for Event Type 1',
            // Add other fields as needed
        ];

        $response = $this->postJson('/api/event-types', $data);

        $response->assertStatus(201); // Check for successful creation status

        // Additional assertions to check the response data, database records, etc.
    }

    /**
     * Test viewing an event type.
     *
     * @return void
     */
    public function test_view_event_type()
    {
        $eventType = EventType::factory()->create();

        $response = $this->getJson('/api/event-types/' . $eventType->id);

        $response->assertStatus(200); // Check for successful retrieval status

        // Additional assertions to check the response data, returned event type, etc.
    }

    /**
     * Test updating an event type.
     *
     * @return void
     */
    public function test_update_event_type()
    {
        $eventType = EventType::factory()->create();

        $data = [
            'name' => 'Updated Event Type Name',
            // Update other fields as needed
        ];

        $response = $this->putJson('/api/event-types/' . $eventType->id, $data);

        $response->assertStatus(200); // Check for successful update status

        // Additional assertions to check the response data, updated event type, etc.
    }

    /**
     * Test deleting an event type.
     *
     * @return void
     */
    public function test_delete_event_type()
    {
        $eventType = EventType::factory()->create();

        $response = $this->deleteJson('/api/event-types/' . $eventType->id);

        $response->assertStatus(204); // Check for successful delete status

        // Additional assertions to check the database records, etc.
    }

    // You can also add methods to test listing all event types, handling validation, etc.
}
