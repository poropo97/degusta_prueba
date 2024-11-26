<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Infrastructure\Persistence\Eloquent\Task;
use App\Infrastructure\Persistence\Eloquent\User;

class RecordTime extends Model
{
    use HasFactory;
    
    protected $table = 'records_times';

    protected $fillable = [
        'task_id',
        'start_time',
        'end_time',
    ];

    /**
     * Obtiene la tarea asociada al registro de tiempo.
     *
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    /**
     * Obtiene el usuario a través de la tarea asociada.
     *
     */
    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            Task::class,
            'id', // Foreign key on tasks table...
            'id', // Foreign key on users table...
            'task_id', // Local key on records_times table...
            'user_id' // Local key on tasks table...
        );
    }
}