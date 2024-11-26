<?php

namespace App\Domain\Entities;

use DateTime;

class RecordTime
{
    private int $id;
    private Task $task;
    private DateTime $startTime;
    private ?DateTime $endTime;

    /**
     * Constructor para inicializar un RecordTime.
     *
     * @param int        $id         Identificador único del registro de tiempo.
     * @param Task       $task       La tarea asociada a este registro de tiempo.
     * @param DateTime   $startTime  Marca de tiempo de inicio.
     * @param DateTime|null $endTime    Marca de tiempo de finalización (puede ser nula).
     */
    public function __construct(int $id, Task $task, DateTime $startTime, ?DateTime $endTime = null)
    {
        $this->id = $id;
        $this->task = $task;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    // Getters y Setters

    /**
     * Obtiene el ID del registro de tiempo.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Asigna el ID del registro de tiempo.
     *
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Obtiene la tarea asociada al registro de tiempo.
     *
     * @return Task
     */
    public function getTask(): Task
    {
        return $this->task;
    }

    /**
     * Asigna la tarea asociada al registro de tiempo.
     *
     * @param Task $task
     */
    public function setTask(Task $task): void
    {
        $this->task = $task;
    }

    /**
     * Obtiene la marca de tiempo de inicio.
     *
     * @return DateTime
     */
    public function getStartTime(): DateTime
    {
        return $this->startTime;
    }

    /**
     * Asigna la marca de tiempo de inicio.
     *
     * @param DateTime $startTime
     */
    public function setStartTime(DateTime $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * Obtiene la marca de tiempo de finalización.
     *
     * @return DateTime|null
     */
    public function getEndTime(): ?DateTime
    {
        return $this->endTime;
    }

    /**
     * Asigna la marca de tiempo de finalización.
     *
     * @param DateTime|null $endTime
     */
    public function setEndTime(?DateTime $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * Finaliza el registro de tiempo estableciendo la marca de tiempo de finalización.
     *
     * @return void
     */
    public function stop(): void
    {
        $this->endTime = new DateTime();
    }

    /**
     * Calcula la duración en segundos del registro de tiempo.
     *
     * @return int|null
     */
    public function getDurationInSeconds(): ?int
    {
        if ($this->endTime === null) {
            return null;
        }

        return $this->endTime->getTimestamp() - $this->startTime->getTimestamp();
    }
}