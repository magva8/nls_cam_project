<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\EventType;

class EventTypeController extends Controller
{
    // Возвращает список всех типов событий
    public function index()
    {
        $eventTypes = EventType::all();
        return Response::json($eventTypes);
    }

    // Создание нового типа события
    public function store(Request $request)
    {
        $data = $request->all();
        $eventType = EventType::create($data);
        return Response::json($eventType, 201);
    }

    // Просмотр информации о конкретном типе события
    public function show(EventType $eventType)
    {
        return Response::json($eventType);
    }

    // Обновление информации о типе события
    public function update(Request $request, EventType $eventType)
    {
        $data = $request->all();
        $eventType->update($data);
        return Response::json($eventType);
    }

    // Удаление типа события
    public function destroy(EventType $eventType)
    {
        $eventType->delete();
        return Response::json(null, 204);
    }
}
