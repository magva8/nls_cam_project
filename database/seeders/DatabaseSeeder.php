<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camera;
use Database\Factories\CameraFactory; // Убедитесь, что путь к фабрике верный

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Вызываем фабрику для создания записей
        Camera::factory()->count(10)->create(); // Создаст 10 записей с помощью фабрики

        // Другие вызовы фабрик и сидеров могут быть добавлены здесь
    }
}
