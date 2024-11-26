<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    /**
     * Obtiene los registros de tiempo asociados a la tarea.
     *
     */
    public function recordTimes(): HasMany
    {
        return $this->hasMany(RecordTime::class, 'task_id');
    }

    /**
     * Obtiene el usuario que posee la tarea.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}