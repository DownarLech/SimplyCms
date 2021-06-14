<?php declare(strict_types=1);

namespace App\Shared\Dto;

class CategoryDataTransferObject
{
    private int $id;
    private string $name;

    /**
     * CategoryDataTransferObject constructor.
     */
    public function __construct()
    {
        $this->id = 0;
        $this->name = '';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}