<?php declare(strict_types=1);

namespace App\Component\Product\Business\Csv\Mapper;

use App\Shared\Dto\CsvDataTransferObject;

interface CsvMapperInterface
{

    public function mapFromIteratorToCsvDto(array $record): CsvDataTransferObject;

}