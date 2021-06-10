<?php declare(strict_types=1);

namespace App\Component\ProductCsv\Persistence\Mapper;

use App\Shared\Dto\CsvDataTransferObject;

class CsvMapper implements CsvMapperInterface
{
    public function mapFromIteratorToCsvDto(array $record): CsvDataTransferObject
    {
        $csvDataTransferObject = new CsvDataTransferObject();
        $csvDataTransferObject->setId((int)$record['id']);
        $csvDataTransferObject->setName($record['name']);
        $csvDataTransferObject->setDescription($record['description']);

        return $csvDataTransferObject;
    }

}