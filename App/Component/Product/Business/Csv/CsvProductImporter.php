<?php declare(strict_types=1);

namespace App\Component\Product\Business\Csv;

use App\Component\Product\Business\Csv\Mapper\CsvMapper;
use App\Component\Product\Business\Csv\Mapper\CsvMapperInterface;
use App\Shared\Csv\CsvImporter;
use App\Shared\Dto\CsvDataTransferObject;
use App\System\DI\Container;

class CsvProductImporter
{
    private CsvImporter $csvImporter;
    private CsvMapperInterface $csvMapper;

    public function __construct(Container $container)
    {
        $this->csvImporter = $container->get(CsvImporter::class);
        $this->csvMapper = $container->get(CsvMapper::class);
    }

    /**
     * @param string path to file.csv
     * @return CsvDataTransferObject[]
     * @throws \League\Csv\Exception
     */
    public function loadDataAsCsvDto(string $path): array
    {
        $csvDtoList = [];
        $products = $this->csvImporter->loadCsvData($path);

        foreach ($products as $product) {
            $csvDtoList[] = $this->csvMapper->mapFromIteratorToCsvDto($product);
        }
        return $csvDtoList;
    }

}