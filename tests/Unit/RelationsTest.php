<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Infrastructure\Persistence\Eloquent\Task;
use App\Infrastructure\Persistence\Eloquent\RecordTime;
use App\Infrastructure\Persistence\Eloquent\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class RelationsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function task_create_relations() : void
    {
        // Crear un usuario
        $user = User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        // Crear una tarea
        $task = Task::create([
            'name' => 'Tarea de Prueba',
            'description' => 'Descripción de la tarea de prueba.',
        ]);

        // Crear dos registros de tiempo asociados a la tarea
        $recordTime1 = RecordTime::create([
            'task_id' => $task->id,
            'start_time' => new DateTime('2024-01-01 10:00:00'),
            'end_time' => new DateTime('2024-01-01 12:00:00'),
        ]);

        $recordTime2 = RecordTime::create([
            'task_id' => $task->id,
            'start_time' => new DateTime('2024-01-02 09:30:00'),
            'end_time' => new DateTime('2024-01-02 11:45:00'),
        ]);

        // Verificar que la tarea tiene 2 registros de tiempo
        $this->assertCount(2, $task->recordTimes);
        $this->assertTrue($task->recordTimes->contains($recordTime1));
        $this->assertTrue($task->recordTimes->contains($recordTime2));
    }

   
}