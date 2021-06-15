<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Csv\Mapper;

use App\Shared\Dto\CsvDataTransferObject;

class CsvMapper implements CsvMapperInterface
{
    public function mapFromIteratorToCsvDto(array $record): CsvDataTransferObject
    {
        $csvDataTransferObject = new CsvDataTransferObject();
        $csvDataTransferObject->setId((int)$record['abstract_sku']);
        $csvDataTransferObject->setName($record['name.en_US']);
        $csvDataTransferObject->setDescription($record['description.en_US']);
        $csvDataTransferObject->setCategoryName($record['category_key']);

        return $csvDataTransferObject;
    }

}