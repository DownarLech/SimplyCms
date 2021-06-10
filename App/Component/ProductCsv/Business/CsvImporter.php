<?php declare(strict_types=1);

namespace App\Component\ProductCsv\Business;

use App\Component\ProductCsv\Persistence\Mapper\CsvMapper;
use App\Component\ProductCsv\Persistence\Mapper\CsvMapperInterface;
use App\Shared\Dto\CsvDataTransferObject;
use App\System\DI\Container;
use League\Csv\Reader;
use League\Csv\Statement;

class CsvImporter
{
    private array $header;
    private CsvMapperInterface $csvMapper;

    public function __construct(Container $container)
    {
        $this->csvMapper = $container->get(CsvMapper::class);
    }

    public function loadCsvData(string $path)
    {
        $readerCsv = Reader::createFromPath($path);
        $readerCsv->setHeaderOffset(0); // setHeaderOffset, the found record will be combined to each CSV record to return an associated array whose keys are composed of the header values.

        $this->header = $readerCsv->getHeader();
        $products = $readerCsv->getRecords(); // ?\Iterator

       // return Statement::create()->process($readerCsv);
        return $products;
    }

    public function saveAsCsvDto(\Iterator $records): array
    {
        $csvDtoList = [];

        //loadCsvData($path) private??
        foreach ($records as $record) {
            $csvDtoList[] = $this->csvMapper->mapFromIteratorToCsvDto($record);
        }
        return $csvDtoList;
    }


    public function getHeader(): array
    {
        return $this->header;
    }


}