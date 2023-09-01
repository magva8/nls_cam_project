<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response; // Правильный импорт для response
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'camera_id' => 'required|exists:cameras,id',
            'event_type_id' => 'required|exists:event_types,id',
            'url' => 'required|url',
        ]);

        $event = Event::create($data);
        return response()->json($event, 201);
    }

    public function show(Event $event)
    {
        return response()->json($event);
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'camera_id' => 'exists:cameras,id',
            'event_type_id' => 'exists:event_types,id',
            'url' => 'url',
        ]);

        $event->update($data);
        return response()->json($event);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(null, 204);
    }
}
