<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Csv;

use App\Component\ProductCsv\Persistence\Mapper\CsvMapper;
use App\Component\ProductCsv\Persistence\Mapper\CsvMapperInterface;
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
    public function saveAsCsvDto(string $path): array
    {
        $csvDtoList = [];
        $products = $this->csvImporter->loadCsvData($path);

        foreach ($products as $product) {
            $csvProductDtoList[] = $this->csvMapper->mapFromIteratorToCsvDto($product);
        }
        return $csvDtoList;
    }

}