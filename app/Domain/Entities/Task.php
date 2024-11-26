<?php

namespace App\Domain\Entities;

use App\Domain\Entities\RecordTime;

class Task
{
    private int $id;
    private string $name;
    private ?string $description;
    /**
     * @var RecordTime[]
     */
    private array $recordtimes = [];

    public function __construct(int $id, string $name, ?string $description = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    // Getters and Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Obtiene todos los registros de tiempo asociados a la tarea.
     *
     * @return RecordTime[]
     */
    public function getRecordTimes(): array
    {
        return $this->recordtimes;
    }

    /**
     * Añade un registro de tiempo a la tarea.
     *
     * @param RecordTime $recordTime El registro de tiempo a añadir.
     */
    public function addRecordTime(RecordTime $recordTime): void
    {
        $this->recordtimes[] = $recordTime;
    }
}