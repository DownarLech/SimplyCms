<?php declare(strict_types=1);

namespace App\Shared\Dto;

class ProductDataTransferObject
{
    private int $id;
    private string $name;
    private string $description;
    private ?CategoryDataTransferObject $category;

    /**
     * ProductDataTransferObject constructor.
     */
    public function __construct()
    {
        $this->id = 0;
        $this->name = ' ';
        $this->description = ' ';
        $this->category = null;
    }

    /**
     * @return CategoryDataTransferObject|null
     */
    public function getCategory(): ?CategoryDataTransferObject
    {
        return $this->category;
    }

    /**
     * @param CategoryDataTransferObject|null $category
     */
    public function setCategory(?CategoryDataTransferObject $category): void
    {
        $this->category = $category;
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

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
